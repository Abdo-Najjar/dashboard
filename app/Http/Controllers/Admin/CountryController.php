<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'locations',
            'page_name' => 'country',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('pages.countries.index')->with($data);
    }
}
