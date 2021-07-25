@extends('layouts.app')
@section('about')
<section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            @isset($abouts)
            @if($abouts->count() > 0)
            @foreach($abouts as $about)
            <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="images/about/{{$about->image}}" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>{{$about->year}}</h4>
                        <h4 class="subheading">{{$about->title}}</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">{{$about->description}}</p>
                    </div>
                </div>
            </li>
            @endforeach
            @endif
            @endisset
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
