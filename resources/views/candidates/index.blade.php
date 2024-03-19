@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card card-derel">
  <div class="card-header">
    <a href="/candidates/create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> NEW CANDIDATE</a>
  </div>
  <div class="card-body">
    <table id="tbl-candidates" width="100%" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Position</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($candidates as $candidate)
        <tr>
          <td>{{ $candidate->name }}</td>
          <td>{{ $candidate->election_id }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer"></div>
</div>

@endsection