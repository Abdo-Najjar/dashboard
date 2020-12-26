<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Country , Service};
use Yajra\DataTables\Facades\DataTables;

class RequiredWorkController extends Controller
{
    protected $model_plural;

    protected $model = Service::class;

    protected $data = [
        'category_name' => 'services',
        'page_name'     => 'required_work',
    ];

    protected $breadcrumb;

    public function __construct()
    {
        $this->model_plural = 'requiredWorks';
        $this->data['countries']  = Country::all();
    }

    public function index()
    {
        return view("pages.{$this->model_plural}.index", ['model_plural' => $this->model_plural, 'model' => class_basename($this->model)])->with($this->data);
    }


    public function create()
    {
        return view("pages.{$this->model_plural}.create")->with($this->data);
    }


    public function edit(Service $service)
    {
        return view("pages.{$this->model_plural}.edit", compact('service'))->with($this->data);
    }

    public function datatable()
    {
        return DataTables::of(
            $this->model::select(['id', 'name->en as name_en', 'name->ar as name_ar', 'service_id' ,'country_id', 'status'])->where('type' , Service::REQUIRED_WORK)
        )

            ->addColumn('action', function ($object) {
                return '
                <div class="btn-group">
                    <a class="btn btn-sm btn-info mx-1" href="' . route($this->model_plural . '.show', $object) . '" >' . trans('common.show') . '</a>
                    <a class="btn btn-sm btn-primary mx-1" href="' . route($this->model_plural . '.edit', $object) . '">' . trans('common.edit') . '</a>
                    <button class="btn btn-sm btn-danger mx-1" data-id="' . $object->id . '">' . trans('common.delete') . '</button>
                  </div>';
            })
            ->addColumn('country', function ($object) {
                return  optional($object->country)->name;
            })
            ->addColumn('main_service' , function($object){
                return optional($object->service->service)->name;
            })
            ->addColumn('category' , function($object){
                return optional($object->service)->name;
            })
            ->addColumn('status', function ($object) {
                return $object->status;
            })
            ->filter(function ($query) {

                if (request()->name) {
                    $query->where('name->en', 'LIKE', '%' . request()->name . '%')
                        ->orWhere('name->ar', 'LIKE', '%' . request()->name . '%');
                }

                if (request()->status || request()->status == '0') {
                    $query->where('status', request()->status);
                }

                if (request()->country_id) {
                    $query->where('country_id', request()->country_id);
                }
            })
            ->toJson();
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(['message' => trans('common.deleted')]);
    }

}
