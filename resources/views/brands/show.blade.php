@extends('backend_layouts.layout')
@section('title')
Show | Brands
@endsection
@section('content')
{{$brand->id}}
<br>
{{$brand->image}}
@endsection
