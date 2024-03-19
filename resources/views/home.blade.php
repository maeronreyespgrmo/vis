@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $votes }}</h3>

          <p>Total No. of Votes</p>
        </div>
        <div class="icon">
          <i class="fas fa-fingerprint"></i>
        </div>
        <a href="{{ route('results') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $candidates }}</h3>

          <p>Total No. of Candidates</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="/candidates" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>

@endsection