<?php

namespace App\Http\Controllers;

//use App\Models\Meal;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        
        return view('home');
    }

    public function about(){
        return view('about');
    }

}
