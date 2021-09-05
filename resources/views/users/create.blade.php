@extends('backend_layouts.layout')
@section('title')
Create | User
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <a href="{{route('admin.index')}}">Dashboard</a>
            </div>
            <h2>User Create</h2>
            <div>
                <form action="{{route('users.store')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name:</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="user name" name="name" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name ="password">
                    </div>
                    @error('password')
                    <div class = "alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    @error('role')
                    <div class="alert alert-danger">
                        <span class="alert-danger">{{$message}}</span>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </main>
    </div>
</div>

@endsection
