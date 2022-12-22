<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * get login view
     */
    public function index(Request $request)
    {
        if (session()->has('login_session')){
            return redirect('/admin/dashboard');
        }
        return view('admin.pages.login');
    }

    /**
     * login
     */
    public function login(Request $request)
    {
        $user = User::ofUsername($request)
            ->ofPassword($request)
            ->where('role', 1)
            ->get();
        // logined
        if ($user->isNotEmpty()) {
            Session::put('login_session', $user);
            return redirect('/admin/dashboard');
        }
    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        session()->forget('login_session');
        $request->session()->flush();
        return response()->json(['message' => 'Logout!', 'status' => '201']);
    }
}
