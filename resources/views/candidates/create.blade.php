@extends('layouts.master')

@section('page_title', $page['title'])

@section('content')

@include('layouts.alert')

<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i><b> CREATE CANDIDATE</b>
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form class="form-horizontal" action="/candidates/store" method="POST">
        @csrf
        <div class="card-body">
          <span class="badge bg-blue" style="margin-bottom: 10px;"><i class="fas fa-user"></i> PERSONAL DATA</span>
          <div class="form-group row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="full_name">Full Name *</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('full_name') }}" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="full_name">Election Name *</label>
                    <select class="form-control" name="election_name" id="" required>
                        <option value="1">Board of Directors</option>
                        <option value="2">Audit & Inventory Committee</option>
                        <option value="3">Election Committee</option>
                    </select>
                <!-- <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required> -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-primary btn-sm btn-submit"> SUBMIT</button>
          <a href="/users" class="btn btn-danger btn-sm"> CANCEL</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection