@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card card-derel">
  <div class="card-header">
    <a href="/votes/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>ADD VOTE</a>
  </div>
  <div class="card-body">
    <table id="tbl-candidates" width="100%" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Ballot ID</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
         @foreach($distinctBallotIds as $item)
        <tr>
          <td>{{ $item }}</td>
          <td><a class="btn btn-primary" href="/votes/{{$item}}/edit">Edit</a> <a class="btn btn-danger" href="/votes/{{$item}}/destroy">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer"></div>
</div>

@endsection