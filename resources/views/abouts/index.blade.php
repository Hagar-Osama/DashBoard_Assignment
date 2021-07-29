@extends('backend_layouts.layout')
@section('title')
Dashboard | About
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1>Dashboard<h1>
            </div>
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('abouts.create')}}" class="btn btn-primary">Create New About</a>
            </div>
            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>image</th>
                            <th>Year</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($abouts)
                        @if($abouts->count() > 0)
                        @foreach($abouts as $about)
                        <tr>
                            <td>{{$about->id}}</td>
                            <td>{{$about->title}}</td>
                            <td>{{$about->description}}</td>
                            <td>{{$about->image}}</td>
                            <td>{{$about->year}}</td>

                            <td><a href="{{route('abouts.show',['about'=>$about->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('abouts.edit',['about'=>$about->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('abouts.destroy', ['about'=>$about->id])}}" method="POST">
                                    @csrf
                                    {{{method_field('DELETE')}}}
                                    <input type="submit" name="delete" value= "Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
