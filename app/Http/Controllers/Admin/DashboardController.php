<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('dashboard')->with($data);
    }

    public function setLang()
    {
        session()->put('diraction' , request()->diraction);

        return redirect()->back();
    }
}
