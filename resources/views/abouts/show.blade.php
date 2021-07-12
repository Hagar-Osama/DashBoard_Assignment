@extends('backend_layouts.layout')
@section('title')
Show | About
@endsection
@section('content')
{{$about->id}}
<br>
{{$about->title}}
<br>
{{$about->link}}
<br>
{{$about->description}}
<br>
{{$about->status}}
@endsection
