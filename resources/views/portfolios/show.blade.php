@extends('backend_layouts.layout')
@section('title')
Show | Portfolio
@endsection
@section('content')
{{$portfolio->id}}
<br>
{{$portfolio->name}}
<br>
{{$portfolio->description}}
<br>
{{$portfolio->status}}
@endsection
