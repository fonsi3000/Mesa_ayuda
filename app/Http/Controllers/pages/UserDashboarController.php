<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboarController extends Controller
{
    public function index()
    {
      
      return view('content.pages.dashboard');
    }
}
