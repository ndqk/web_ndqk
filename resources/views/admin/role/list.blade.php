@extends('admin.layout.master')

@section('titleHeader', 'List Role')
@section('nameRoute', 'List Role')

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>                  
          <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Id</th>
            <th style="width: 40px">Action</th>
          </tr>
        </thead>
        <tbody>
            @if (sizeof($roles))
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->id}}</td>
                        <td>
                            <button type="button" class="btn btn-default" data-id={{$role->id}} data-toggle="modal" data-target="#modal-lg" onclick="showRole(this)">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div> --}}
  </div>
  <!-- /.card -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <form class="modal-content">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="model-content-body">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </form>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@push('script')
<script type="text/javascript">
    function showRole(e){
        var role_id = $(e).data('id');
        $.ajax({
            url : '{{route('show.role')}}',
            method : 'GET',
            data : {
                role_id : role_id
            },
            success: function (data){
                alert(data);
                $('#model-content-body').html(data);
            },
            error:function(error){

            }
        });
    } 
</script>   
@endpush