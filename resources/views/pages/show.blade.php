@extends('backend_layouts.layout')
@section('title')
Show | Services
@endsection
@section('content')
{{$page->id}}
<br>
{{$page->name}}
<br>
{{$page->link}}
<br>
{{$page->order}}
<br>
{{$page->status}}
@endsection
