@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i><b> UPDATE NEW USER</b>
  </div>
  <form action="/votes/{{$vote[0]->ballot_id}}/update" method="POST">
@csrf
<div class="container">
<div class="row">
<div class="col-md-6">
<h5>Official Ballot: <input type="text" name="ballot_id" value="{{$vote[0]->ballot_id}}" disabled></h5>
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
        <td><input type="checkbox" name="board_directors[]" value="{{$board_directors_item->id}}"
        @foreach ($vote as $vote_item)
        @if($vote_item->candidate_id == $board_directors_item->id)
          checked
        @endif
        @endforeach
        >{{ $board_directors_item->name }} </td>
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
          <td><input type="checkbox" name="election_committee[]" value="{{$election_committee_item->id}}"
          @foreach ($vote as $vote_item)
          @if($vote_item->candidate_id == $election_committee_item->id)
          checked
          @endif
          @endforeach
          >{{ $election_committee_item->name }} </td>
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
          <td><input type="checkbox" name="audit_committee[]" value="{{$audit_committee_item->id}}"
          @foreach ($vote as $vote_item)
          @if($vote_item->candidate_id == $audit_committee_item->id)
          checked
          @endif
          @endforeach
          >{{ $audit_committee_item->name }} </td>
          </tr>
        @endforeach
        </tbody>
      </table>
   
    </div>
  </div>
  <button class="btn btn-primary btn-lg btn-block">Submit Vote</button>
  </div>

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

@endsection