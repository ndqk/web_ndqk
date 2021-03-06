@extends('admin.layout.master')

@section('titleHeader', 'List Role')
@section('nameRoute', 'List Role')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">List role</h3>
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
                            <button type="button"  class="btn btn-primary edit-role-btn" data-link="{{route('role.show', $role->id)}}" data-toggle="modal" data-target="#modal-lg">
                                Detail
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
        <form class="modal-content" method="post" action="" id="form-edit">
            @method('PUT')
            @csrf
            
            <div class="modal-header">
                <h4 class="modal-title">DETAIL</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="alert-edit-role">

            </div>
            <div class="modal-body" id="modal-content-body">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save-change">Save changes</button>
            </div>
        <!-- /.modal-content -->
        </form>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@push('script')
<script type="text/javascript">
  $(function(){
    $('.edit-role-btn').click(function(){
      let url = $(this).data('link');
      $.ajax({
        type : 'GET',
        url : url,
        success : function(respone){
          $('#modal-content-body').html(respone);
          $('#form-edit').attr('action', url);

        },
        error : function(error){

        }
      });
    });

    $('#save-change').click(function(){
      let url = $('#form-edit').attr('action');
      let data = $('#form-edit').serialize()
      
      $.ajax({
        type : 'PUT',
        url : url,
        data : data,
        success : function (respone){
          $('#alert-edit-role').html(respone);
        },
        error : function(error){

        }
      })
      return false;

    });
  });
</script>   
@endpush