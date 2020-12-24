<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'locations',
            'page_name' => 'country',
        ];

        return view('pages.countries.index')->with($data);
    }


    public function create()
    {
        $data = [
            'category_name' => 'locations',
            'page_name' => 'country',
        ];

        return view('pages.countries.create')->with($data);
    }


    public function edit(Country $country)
    {
        $data = [
            'category_name' => 'locations',
            'page_name' => 'country',
        ];

        return view('pages.countries.edit', compact('country'))->with($data);
    }

    public function datatable()
    {
        return DataTables::of(
            Country::select(['id', 'name->en as name_en', 'name->ar as name_ar', 'currency->en as currency_en', 'currency->ar as currency_ar', 'status', 'tax'])
        )
            ->addColumn('action', function ($object) {

                return '
                <div class="btn-group">
                    <a href="' . route('countries.show', $object) . '" class="btn btn-sm">Open</a>
                    <button type="button" class="btn  btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5" style="will-change: transform;">
                      <a class="dropdown-item " href="' . route('countries.edit', $object) . '">Edit</a>
                      <a class="dropdown-item" href="#">Delete</a>
                    </div>
                  </div>';
            })
            ->addColumn('image', function ($object) {
                return  "<img src='{$object->image()}'>";
            })
            ->addColumn('status', function ($object) {
                return $object->status;
            })
            ->rawColumns(['image','action'])
            ->filter(function ($query) {

                if (request()->name) {
                    $query->where('name->en', 'LIKE', '%' . request()->name . '%')
                        ->orWhere('name->ar', 'LIKE', '%' . request()->name . '%');
                }

                if (request()->status || request()->status == '0') {
                    $query->where('status', request()->status);
                }
            })
            ->toJson();
    }

    public function destroy(Country $country)
    {
    }
}
