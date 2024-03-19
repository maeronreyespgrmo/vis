@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card card-derel">
  <div class="card-header">
    <a href="/users/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> NEW USER</a>
  </div>
  <div class="card-body">
    <table id="tbl-users" width="100%" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td><a class="btn btn-primary" href="/users/{{$user->id}}/edit">Edit</a> <a class="btn btn-danger" href="/users/{{$user->id}}/destroy">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer"></div>
</div>

@endsection