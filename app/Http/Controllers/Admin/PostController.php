<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\{StorePostRequest,UpdatePostRequest};
use Illuminate\Support\Facades\Auth;

use App\Entity\{Post, Category, Image};
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::join('categories', 'posts.category_id', 'categories.id')
        //             ->join('images', 'posts.id', 'images.post_id')
        //             ->where('images.status', '0')
        //             ->join('users', 'posts.user_id', 'users.id')
        //             ->select('posts.id', 'posts.title', 'categories.title as category', 'images.image', 'users.name', 'posts.status', 'posts.view')
        //             ->get();
        // return $post;
        return view('admin.post.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getList(){
        $post = Post::join('categories', 'posts.category_id', 'categories.id')
                    ->join('images', 'posts.id', 'images.post_id')
                    ->where('images.status', '0')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->select('posts.id', 'posts.title', 'categories.title', 'images.image', 'users.name', 'posts.status', 'posts.view');
        
        return Datatables::of($post)->addColumn('action', function($post){
            $string =  '<a href="">View</a>';
            $string .=   '<a href="'.route('post.edit', $post->id).'">&emsp;Edit </a>';
            $string .=  '<a href="'.route('post.delete', $post->id).'">&emsp;Delete</a>';
            
            return $string;
        })->make(true);
        
        
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //get image form content
        $html = $request->content;
        
        $dom = new \DOMDocument();
        $dom->loadHTML($html);

        $anchors = $dom -> getElementsByTagName('img');

        foreach ($anchors as $element){  // upload all file image
            $base64 = $element -> getAttribute('src');
            $fileName = $element->getAttribute('data-filename');
            $this->base64_to_jpeg($base64, public_path('upload/image/post/').$fileName);
            $element->setAttribute('src', "/upload/image/post/$fileName");
        }

        //get content post
        $html=$dom->saveHTML();
        $content = explode("<body>", $html);
        $content = explode("</body>", $content[1]);

        //create new post
        $post = [
            'title' => $request->title,
            'category_id' => $request->category,
            'content' => $content[0],
            'user_id' => Auth::user()->id,
            'status' => $request->status,
            'view' => 0
        ];

        $savePost = new Post($post);
        $savePost->save();

        //upload image
        $previewIamge = $this->uploadFile($request, 'previewImage', '/upload/image/post');
        $backgroundImage = $this->uploadFile($request, 'backgroundImage', '/upload/image/post');
        
        Image::insert([
            'image' => $previewIamge,
            'post_id' => $savePost->id,
            'status' => 0,
        ]);
        Image::insert([
            'image' => $backgroundImage,
            'post_id' => $savePost->id,
            'status' => 1,
        ]);

        return redirect()->back()->with('status', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $post = Post::join('users', 'posts.user_id', 'users.id')
                    ->where('posts.id', $id)
                    ->select('posts.*', 'users.name')
                    ->get()->first();
        // return $post;
        return view('admin.post.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::with('images')->findOrFail($id);
        return $post;
        if(!$request->hasFile){
            return 'ndqk';
        }
        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteImages = Image::where('post_id', $id)->get();
        Image::where('post_id', $id)->delete();
        foreach($deleteImages as $deleteImage){
            $path = public_path().'/upload/image/post/'.$deleteImage->image;
            $this->deleteFIle($path);
        }
        
        $deletePost = Post::findOrFail($id);
        $deletePost->delete();   
        return redirect()->back()->with('status', 'Xóa bài viết thành công');
    }

    public function preview(Request $request){
        $respone = view('admin.post.preview')->render();
        return $respone;
        //return view('admin.post.preview');
    }

    private function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, 'wb' ); 
        $data = explode( ',', $base64_string );
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
        fclose( $ifp ); 
        return $output_file; 
    }

    private function uploadFile($request, $nameInputFile, $output_folder){
        if($request->hasFile($nameInputFile)){
            $file = $request[$nameInputFile];
            $fileName = $file->getClientOriginalName();
            if(!file_exists($fileName))
                $file->move(public_path($output_folder), $fileName);
            return $fileName;
        }
        return '';
    }

    private function deleteFIle($path){
        if(file_exists($path)){
            unlink($path);
        }
    }
}
