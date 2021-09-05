@extends('backend_layouts.layout')
@section('title')
Show | Contact
@endsection
@section('content')
{{$contact->id}}
<br>
{{$contact->name}}
<br>
{{$contact->email}}
<br>
{{$contact->phone}}
@endsection
