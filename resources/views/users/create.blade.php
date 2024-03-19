@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i><b> CREATE NEW USER</b>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form class="form-horizontal" action="/users/store" method="POST">
        @csrf
        <div class="card-body">
          <span class="badge bg-blue" style="margin-bottom: 10px;"><i class="fas fa-user"></i> PERSONAL DATA</span>
          <div class="form-group row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
              </div>
            </div>
          </div>
          <span class="badge bg-blue" style="margin-bottom: 10px;"><i class="fas fa-key"></i> ACCOUNT DETAILS</span>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="username">Email *</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
            </div>
            <div class="col-sm-6">
              <label for="user_type">User Type *</label>
                <select class="form-control select2" name="user_type" style="width: 100%;" required>
                  <option selected></option>
                  <option value="1">Overall Administrator</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="password">Password *</label>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="col-sm-6">
              <label for="password_confirmation">Confirm Password *</label>
              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary btn-sm btn-submit"> SUBMIT</button>
          <a href="/users" class="btn btn-danger btn-sm"> CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection