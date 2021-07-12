@extends('backend_layouts.layout')
@section('title')
Show | Services
@endsection
@section('content')
{{$service->id}}
<br>
{{$service->name}}
<br>
{{$service->description}}
<br>
{{$service->icon}}
<br>
{{$service->created_at}}
@endsection
