@extends('layouts.app')
@section('services')
<!-- Services-->
<section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @isset ($services)
            @if ($services->count() > 0)
            @foreach ($services as $service)
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas {{$service->icon}} fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">{{$service->name}}</h4>
                <p class="text-muted">{{$service->description}}</p>
            </div>
            @endforeach
            @endif
            @endisset
            </div>
        </div>
    </section>

@endsection
