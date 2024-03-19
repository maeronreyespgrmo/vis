@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card card-derel">
  <div class="card-header">
    <i class="fa fa-edit"></i><b> CHANGE PASSWORD</b>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form class="form-horizontal" action="/auth/update-password" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group row">
            <label for="current_password" class="col-sm-2 col-form-label">Current *</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="new_password" class="col-sm-2 col-form-label">New *</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="confirm_password" class="col-sm-2 col-form-label">Re-type *</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="confirm_password" placeholder="Re-type New Password" required>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary btn-sm"> UPDATE</button>
          <a href="/" class="btn btn-danger btn-sm"> CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection