<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function activateMany($model)
    {
        $model = "\\App\\Models\\{$model}";

        $model::whereIn('id', request()->ids)->update(['status' => true]);

        return response()->json(['message' => trans('common.updated')]);
    }


    public function deactivateMany($model)
    {
        $model = "\\App\\Models\\{$model}";

        $model::whereIn('id', request()->ids)->update(['status' => false]);

        return response()->json(['message' => trans('common.updated')]);
    }


    public function destroyMany($model)
    {
        $model = "\\App\\Models\\{$model}";
        
        $model::whereIn('id', request()->ids)->delete();

        return response()->json(['message' => trans('common.deleted')]);
    }
}
