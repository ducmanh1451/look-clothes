<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * get login view
     */
    public function index(Request $request)
    {
        return view('admin.pages.login');
    }

    /**
     * login
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role' => 1])) {
            dd(1);
        } else {
            dd(2);
        }
    }

}
