@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')
<link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i><b> ADD NEW VOTE</b>
  </div>
  <form action="/counter/store" method="POST">
@csrf
<div class="container">
  <br>
<div class="row">
<div class="col-md-6">
<h5>Official Ballot: <input  type="text" name="ballot_id" required></h5>
</div>
</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <table class="table  center-table">
        <thead>
          <tr>
          <th>
          Board of Directors
          </th>
          </tr>
        </thead>
        <tbody>
        @foreach ($boardOfDirectors as $board_directors_item)
        <tr>
        <td style="font-size:30px">
        <button type="submit" name="board_directors[]" value="{{$board_directors_item->id}}">{{ $board_directors_item->name }}</button>
        <!-- <input type="checkbox" name="board_directors[]" value="{{$board_directors_item->id}}"> {{ $board_directors_item->name }}  -->
      </td>
        </tr>
        <!-- Add more fields as needed -->
        @endforeach

          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <table class="table  center-table">
        <thead>
          <tr>
          <th>
          Election Committee
          </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($electionCommittees as $election_committee_item)
          <tr>
          <td style="font-size:30px">
          
        <button type="submit" name="election_committee[]" value="{{$election_committee_item->id}}">{{ $election_committee_item->name }}</button>
          <!-- <input type="checkbox" name="election_committee[]" value="{{$election_committee_item->id}}"> {{ $election_committee_item->name }}  -->
        </td>
          </tr>
          <!-- Add more fields as needed -->
          @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>

    <div class="col-md-4">
      <table class="table  center-table">
        <thead>
          <tr>
          <th>
          Audit Committee
          </th>
          </tr>
        </thead>
        <tbody>
        @foreach ($auditCommittees as $audit_committee_item)
          <tr>
          <td style="font-size:30px">
          
        <button type="submit" name="audit_committee[]" value="{{$audit_committee_item->id}}">{{ $audit_committee_item->name }}</button>
          <!-- <input type="checkbox" name="audit_committee[]" value="{{$audit_committee_item->id}}"> {{ $audit_committee_item->name }}  -->
        </td>
          </tr>
          <!-- Add more fields as needed -->
          @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
   
    </div>
  </div>
  <!-- <button class="btn btn-primary btn-lg btn-block">Submit Vote</button> -->
  </div>

</form>
</div>
<script src="/js/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@endsection