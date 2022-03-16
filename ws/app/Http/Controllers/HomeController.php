<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //Using user model
        $user = User::findOrFail(1);


        $message="Hello there!";
        return view('home.index',['user' => $user]);
    }
}
