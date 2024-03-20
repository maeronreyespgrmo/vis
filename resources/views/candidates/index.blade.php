@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')


<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
<!-- jQuery -->
<div class="card card-derel">
  <div class="card-header">
    <a href="/candidates/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> NEW CANDIDATE</a>
  </div>
  <div class="card-body">
    <table id="example" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($candidates as $candidate)
        <tr>
          <td>{{ $candidate->name }}</td>
          <td>{{ $candidate->title }}</td>
          <td><a class="btn btn-primary" href="/candidates/{{$candidate->id}}/edit">Edit</a> <a class="btn btn-danger" href="/candidates/{{$candidate->id}}/destroy">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer"></div>
</div>

<script src="/js/jquery.min.js"></script>
<!-- DataTables JavaScript -->
<script src="/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

@endsection