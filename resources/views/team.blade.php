@extends('layouts.app')
@section('team')
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
            @isset($teams)
            @if($teams->count() > 0)
            @foreach($teams as $team)
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="images/team/{{$team->image}}" alt="..." />
                    <h4>{{$team->name}}</h4>
                    <p class="text-muted">{{$team->job}}</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab {{$team->twitter_icon}}"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab {{$team->facebook_icon}}"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab {{$team->linkedIn}}"></i></a>
                </div>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                    laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
@endsection
