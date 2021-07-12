@extends('backend_layouts.layout')
@section('title')
Show | Team
@endsection
@section('content')
{{$team->id}}
<br>
{{$team->name}}
<br>
{{$team->link}}
<br>
{{$team->description}}
<br>
{{$team->job}}
<br>
{{$team->status}}
@endsection
