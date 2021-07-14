<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getServices()
    {
        return view('services');
    }
    public function getPortfolio()
    {
        return view('portfolio');
    }
    public function getTeam()
    {
        return view('team');
    }
    public function getAbout()
    {
        return view('about');
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
