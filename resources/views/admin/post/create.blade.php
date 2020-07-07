@extends('admin.layout.master')

@section('titleHeader', 'Create product')
@section('nameRoute', 'Product / Create')


@section('content')
@include('partials.alert')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Thêm mới tài khoản quản trị</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="create-post-form" role="form" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="InputName">Title *</label>
            <input type="text" name="title" id="InputName" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="InputCategory">Category</label>
            <select name="category" id="InputCategory" class="custom-select">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="inputPreImage">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="previewImage" type="file" class="custom-file-input" id="inputPreImage">
                <label class="custom-file-label" for="inputPreImage">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputBackgroundImage">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="backgroundImage" type="file" class="custom-file-input" id="inputBackgroundImage">
                <label class="custom-file-label" for="inputBackgroundImage">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <strong>Content</strong>
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                            <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <div class="mb-3">
                            <textarea form="create-post-form" name="content" class="textarea" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <div class="form-group">
            <label for="InputStatus">Status</label>
            <select name="status" id="InputStatus" class="custom-select">
                <option value="0">Off</option>
                <option value="1">On</option>
            </select>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary preview-post" data-toggle="modal" data-target="#modal-xl">
            Perview
        </a>
      </div>
    </form>
    
  </div>

  <div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PREVIEW</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="alert-edit-role">

            </div>
            <div class="modal-body" id="modal-content-body">
                {{-- <iframe src="{{route('post.preview')}}" frameborder="0" width="100%" height="500px"></iframe> --}}
                {{-- @include('admin.post.preview') --}}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save-change">Save changes</button>
            </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection


@push('script')
    <script type="text/javascript">
        $(function(){
            $('.preview-post').click(function(){
                let data = $('#create-post-form').serialize()
                $.ajax({
                    type: 'POST',
                    url : '{{route('post.preview')}}',
                    data : data,
                    success : function(respone){
                        $('#modal-content-body').html(respone);
                        //alert(respone);
                    }
                });
            });
        });
    </script>
@endpush