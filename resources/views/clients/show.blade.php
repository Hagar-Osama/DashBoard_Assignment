@extends('backend_layouts.layout')
@section('title')
Show | Client
@endsection
@section('content')
{{$client->id}}
<br>
{{$client->name}}
@endsection
