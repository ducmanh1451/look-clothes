<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * get dashboard view
     */
    public function index(Request $request)
    {
        return view('admin.pages.dashboard', [
            'title' => 'Trang chủ'
        ]);
    }
}
