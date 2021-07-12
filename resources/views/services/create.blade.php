@extends('backend_layouts.layout')
@section('title')
Create | Services
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>Service Create</h2>
            <div>
                <form action="{{route('services.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="service name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Icon:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="service icon" name="icon" value="{{old('icon')}}">
                    </div>
                    @error('icon')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="on">On</option>
                            <option value="off">Off</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{${message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
