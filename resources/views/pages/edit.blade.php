@extends('backend_layouts.layout')
@section('title')
Edit | Pages
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>Page Edit</h2>
            <div>
                <form action="{{route('pages.update',['page'=>$Page->id])}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="page name" name="name" value="{{$Page->name}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="page link" name="link" value="{{$Page->link}}">
                    </div>
                    @error('link')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Order:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="page order" name="order" value="{{$Page->order}}">
                    </div>
                    @error('order')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="on" @if($Page->status=='on') selected @else "" @endif>On</option>
                            <option value="off" @if($Page->status=='off') selected @else ""@endif>Off</option>
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
