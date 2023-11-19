<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function getLookupData($model)
    {

        // model must be like gender-type or country
        $allowedModels = [

        ];

        $modelClass = 'App\\Models\\' . kebabToPascal($model);
        if (class_exists($modelClass) && !in_array($modelClass, $allowedModels)) {
            $data = $modelClass::where('active',true)->get()
                ->makeHidden([
                    'created_at',
                    'updated_at',
                    'active',
                    'deleted_at',
                    'created_by',
                    'updated_by'
                ]);;
            return response()->apiSuccess($data);
        }
        return response()->apiFail('lookup table not found', 404);
    }


}
