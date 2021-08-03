@extends('backend_layouts.layout')
@section('title')
Dashboard | User
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
                <a href="{{route('users.create')}}" class="btn btn-primary">Create New User</a>
            </div>
            <h2>Section title</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Name</th>
                            <th>Role</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($users)
                        @if($users->count() > 0)
                        @endif
                        @endisset
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{! empty($user->profile) ? $user->profile->name : ''}}</td>
                            <td>{{! empty($user->role) ? $user->role->role : ''}}</td>
                            <td><a href="{{route('users.show',['user'=>$user->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('users.destroy', ['user'=>$user->id])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
