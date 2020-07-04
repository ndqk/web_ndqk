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
            <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>ndqk</td>
                <td><span class="badge bg-danger">55%</span></td>
            </tr>
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
@endsection