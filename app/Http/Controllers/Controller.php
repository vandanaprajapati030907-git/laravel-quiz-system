<?php

namespace App\Http\Controllers;

abstract class Controller
{
     public function Login()
    {
        return view('Admin-Login');
    }
  
}
