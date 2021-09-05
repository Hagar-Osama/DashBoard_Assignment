@extends('backend_layouts.layout')
@section('title')
Edit | Services
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>Service Edit</h2>
            <div>
                <form action="{{route('services.update',['id'=>$service->id])}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="service name" name="name" value="{{$service->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Icon:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="service icon" name="icon" value="{{$service->icon}}">
                    </div>
                    @error('icon')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$service->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="on" @if($service->status=='on') selected @else "" @endif>On</option>
                            <option value="off" @if($service->status=='off') selected @else ""@endif>Off</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
