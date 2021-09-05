<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\About;
use App\Models\Team;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Brand;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::select('id', 'name', 'icon', 'description')->where('status', '=', 'on')->get();
        $about = About::select('id', 'title', 'description', 'image', 'year')->where('status', '=', 'on')->get();
        $team = Team::select('id', 'name', 'job', 'image', 'facebook_icon', 'twitter_icon', 'linkedIn')->where('status', '=', 'on')->get();
        $slider = Slider::select('id', 'title', 'description')->where('status', '=', 'on')->get();
        $clients = Client::select('id', 'name')->get();
        $brands = Brand::select('id', 'image')->where('status', '=', 'on')->get();
        $portfolios = Portfolio::select('id', 'name','description','image', 'client_id', 'service_id')->where('status', '=', 'on')->get();




        return view('welcome', ['services' => $services,
                               'abouts' => $about,
                               'teams' => $team,
                               'sliders' => $slider,
                               'clients' =>$clients,
                               'brands' =>$brands,
                               'portfolios' =>$portfolios
                            ]);

    }

    public function getServices()
    {
        $services = Service::select('id', 'name', 'icon', 'description')->where('status', '=', 'on')->get();

        return view('services', ['services' => $services] );
    }
    public function getPortfolio()
    {
        $portfolios = Portfolio::select('id', 'name','description','image', 'client_id', 'service_id')->where('status', '=', 'on')->get();

        return view('portfolio', ['portfolios' =>$portfolios]);
    }
    public function getTeam()
    {
        $teams = Team::select('id', 'name', 'job', 'image', 'facebook_icon', 'twitter_icon', 'linkedIn')->where('status', '=', 'on')->get();

        return view('team', ['teams' => $teams]);
    }
    public function getAbout()
    {
        $abouts = About::select('id', 'title', 'description', 'image', 'year')->where('status', '=', 'on')->get();

        return view('about', ['abouts' => $abouts]);
    }
    public function getContact()
    {
        return view('contact');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}
