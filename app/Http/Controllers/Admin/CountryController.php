<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CountryController extends Controller
{

    protected $model_plural;

    protected $model = Country::class;

    protected $data = [
        'category_name' => 'locations',
        'page_name' => 'country',
    ];

    protected $breadcrumb;

    public function __construct()
    {
        $this->model_plural = Str::plural(strtolower(class_basename($this->model)));
    }

    public function index()
    {
        return view("pages.{$this->model_plural}.index", ['model_plural' => $this->model_plural, 'model' => class_basename($this->model)])->with($this->data);
    }


    public function create()
    {
        return view("pages.{$this->model_plural}.create")->with($this->data);
    }


    public function edit(Country $country)
    {
        return view("pages.{$this->model_plural}.edit", compact('country'))->with($this->data);
    }

    public function datatable()
    {
        return DataTables::of(
            $this->model::select(['id', 'name->en as name_en', 'name->ar as name_ar', 'currency->en as currency_en', 'currency->ar as currency_ar', 'status', 'tax'])
        )
            ->addColumn('action', function ($object) {

                return '
                
                <div class="btn-group">
                    <a class="btn btn-sm btn-info mx-1" href="' . route($this->model_plural . '.show', $object) . '" >' . trans('common.show') . '</a>
                    <a class="btn btn-sm btn-primary mx-1" href="' . route($this->model_plural . '.edit', $object) . '">' . trans('common.edit') . '</a>
                    <button class="btn btn-sm btn-danger mx-1" data-id="' . $object->id . '">' . trans('common.delete') . '</button>
                  </div>';
            })
            ->addColumn('image', function ($object) {
                return  "<img src='{$object->image()}'>";
            })
            ->addColumn('status', function ($object) {
                return $object->status;
            })
            ->rawColumns(['image', 'action'])
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
        $country->delete();

        return response()->json(['message' => trans('common.deleted')]);
    }
}
