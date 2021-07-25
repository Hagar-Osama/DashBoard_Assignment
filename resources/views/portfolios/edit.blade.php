@extends('backend_layouts.layout')
@section('title')
Edit | Portfolios
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>Portfolio Edit</h2>
            <div>
                <form action="{{route('portfolios.update',['portfolio'=>$portfolio->id])}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="portfolio name" name="name" value="{{$portfolio->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$portfolio->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="on" @if($portfolio->status=='on') selected @else "" @endif>On</option>
                            <option value="off" @if($portfolio->status=='off') selected @else "" @endif>Off</option>
                        </select>
                    </div>
                    @if(! empty($portfolio->image))
                    <div class="form-group">
                        <img src="{{asset('images/portfolio').'/'.$portfolio->image}}" height="300px" width="300px">
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Image:</label>
                        <input type="file" name="image" value="{{$portfolio->image}}">
                    </div>
                    @error('image')
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
