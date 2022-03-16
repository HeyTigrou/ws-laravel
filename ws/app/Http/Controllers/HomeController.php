<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $message="Hello there!";
        return view('home.index',['message' => $message]);
    }
}
