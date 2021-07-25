@extends('backend_layouts.layout')
@section('title')
Show | Slider
@endsection
@section('content')
{{$slider->id}}
<br>
{{$slider->title}}
<br>
{{$slider->description}}
<br>
{{$slider->status}}
<br>
{{$slider->image}}

@endsection
