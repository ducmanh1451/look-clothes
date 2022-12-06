<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the home index (get all products)
     * @author manhnd
     * @created at 2022-12-06
     * @return View
     */
    public function index()
    {
        return view('user.pages.home');
    }
}
