@extends('layouts.app')
@section('content')
@if(count($errors)>0)
  <div class="alert alert-danger">
    Upload Validation Error<br/>
      <ul>
        @foreach ($errors->all as $e)
            <li>{{ $e }}</li>
        @endforeach
      </ul>
  </div>
@endif
@if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <strong>{{ $message }}<strong>
  </div>
@endif
<form method="post" enctype="mulitpart/form-data" action="{{ url('/import/excel') }}">
{{ csrf_field() }}
<span>Upload your Excel file here:</span>
  <div style="position:relative;">
    <a class='btn btn-primary' href='javascript:;'>
      Choose File...
    <input type="file" class='mybtn' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
    </a>
    &nbsp;
    <span class='label label-info' id="upload-file-info"></span>
  </div>
  <button style="margin-top:20px" type="submit" name="upload" class="btn btn-success" >Upload</button>
</form>

{{-- represent the excel data from the db --}}
<div style="margin-top:50px">
<h3>Event Table</h3>
  <table class="table table-dark">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Guest Number</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $d)
    <tr>
      <td>{{ $d->id }}</td>
      <td>{{ $d->event_name }}</td>
      <td>{{ $d->event_location }}</td>
      <td>{{ $d->guest_number }}</td>
      <td>{{ $d->event_date }}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection