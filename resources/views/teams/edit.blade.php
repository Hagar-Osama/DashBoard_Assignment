@extends('backend_layouts.layout')
@section('title')
Edit | Team
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>Team Edit</h2>
            <div>
            <form action = "{{route('teams.update',['team'=>$team->id])}}" method = "POST">
            @csrf
            {{method_field('PUT')}}
  <div class="form-group">
    <label for="exampleFormControlInput1">Name:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="team name" name ="name" value = "{{$team->name}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Link:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="team link" name ="link" value = "{{$team->link}}">
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">Job:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="team job" name ="job" value = "{{$team->job}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "description">{{$team->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Status:</label>
    <select class="form-control" id="exampleFormControlSelect1" name = "status">
      <option value="on"@if($team->status=='on') selected @else "" @endif>On</option>
      <option value="off"@if($team->status=='off') selected @else ""@endif>Off</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>

</form>
            </div>
        </main>
    </div>
</div>

@endsection
