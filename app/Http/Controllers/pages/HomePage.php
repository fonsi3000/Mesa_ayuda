<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;

class HomePage extends Controller
{
    public function index()
    {
        $n_users = User::count();
        $n_categories = Categories::count();
        return view('content.pages.pages-home', ['n_users' => $n_users, 'n_categories' => $n_categories]);
    }
}
