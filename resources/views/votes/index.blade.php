@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="card card-derel">
  <div class="card-header">
    <a href="/votes/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>ADD VOTE</a>
  </div>
  <div class="card-body">
    <table id="example" class="display" style="width:100%">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endsection