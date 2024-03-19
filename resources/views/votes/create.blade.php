<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<title>{{ config('app.name') }}</title>


<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<!-- Canonical SEO -->
<link rel="canonical" href="https://1.envato.market/vuexy_admin">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="/images/lagunaseal.png" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Page CSS -->
<link rel="stylesheet" href="/vuexy/assets/vendor/css/pages/cards-advance.css" />

<!-- Helpers -->
<script src="/vuexy/assets/vendor/js/helpers.js"></script>
<br>
<form action="/votes/store" method="POST">
@csrf
<div class="container">
<div class="row">
<div class="col-md-6">
<h5>Official Ballot: <input type="text" name="ballot_id"></h5>
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
        <td><input type="checkbox" name="board_directors[]" value="{{$board_directors_item->id}}">{{ $board_directors_item->name }} </td>
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
          <td><input type="checkbox" name="election_committee[]" value="{{$election_committee_item->id}}">{{ $election_committee_item->name }} </td>
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
          <td>{{$audit_committee_item->id}}<input type="checkbox" name="audit_committee[]" value="{{$audit_committee_item->id}}">{{ $audit_committee_item->name }} </td>
          </tr>
          <!-- Add more fields as needed -->
          @endforeach
          <!-- Add more rows as needed -->
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
<script>
function getCheckboxValues() {
alert()
}
</script>
</body>
</html>

