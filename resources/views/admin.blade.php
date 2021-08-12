@extends('backend_layouts.layout')
@section('content')
@section('title')
INDEX | Dashboard
@endsection

<div class="container-fluid">
    <div class="row">
        @include('backend_includes.sidebar_admin')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <h2>Section title</h2>

        </main>

    </div>
</div>
@endsection
