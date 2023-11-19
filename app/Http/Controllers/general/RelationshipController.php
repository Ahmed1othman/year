<?php

namespace App\Http\Controllers;

use Aws\kendra\kendraClient;
use Illuminate\Http\JsonResponse;

class RelationshipController extends Controller
{
    public function getRelatedData($model, $id, $relation): JsonResponse
    {
        $modelClass = 'App\\Models\\' . kebabToPascal($model);

        if (class_exists($modelClass)) {
            $instance = $modelClass::find($id);

            if ($instance) {
                // Use the provided relation to load related rows
                $relation = kebabToCamel($relation);
                $relatedData = $instance->$relation;
                return response()->apiSuccess($relatedData);
            }
        }

        return response()->apiFail('Model or instance not found', 404);
    }
}
