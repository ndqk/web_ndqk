@extends('admin.layout.master')

@section('titleHeader', 'Edit Customer')
@section('nameRoute', 'Edit Customer')

@section('content')
@include('partials.alert')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Chỉnh sửa tài khoản thành viên</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('customer.edit', $user->id) }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="InputName">Tên chủ sở hữu *</label>
            <input type="text" name="name" class="form-control" id="InputName" placeholder="Name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
          <label for="InputEmail1">Email *</label>
          <input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Email" value="{{$user->email}}" required>
        </div>
        <div class="form-group">
          <label for="InputPassword1">Mật khẩu *</label>
          <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" value="{{$user->password}}" required>
        </div>
        <div class="form-group">
            <label for="InputAddress">Địa chỉ *</label>
            <input type="text" name="address" class="form-control" id="InputAddress" placeholder="Address" value="{{$user->address}}" required>
        </div>
        <div class="form-group">
            <label for="InputPhone">Số điện thoại *</label>
            <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Phone" value="{{$user->phone}}" required>
        </div>
        <div class="form-group">
            <label for="InputRole">Chức vụ</label>
            <select name="role" id="InputRole" class="custom-select">
                @foreach ($roles as $role)
                  <option value="{{$role}}" {{($user->hasRole($role)? 'selected' : '')}}>
                    {{$role}}
                  </option>
                @endforeach
            </select>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection

