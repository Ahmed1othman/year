<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class ModelHelper
{
    public static function getAllModelClasses(): array
    {
        $modelsPath = app_path('Models');

        $modelFiles = File::allFiles($modelsPath);
        $modelClasses = [];

        foreach ($modelFiles as $file) {
            $namespace = 'App\\Models\\';
            $class = $namespace . pathinfo($file->getFilename(), PATHINFO_FILENAME);
            if (class_exists($class) && is_subclass_of($class, 'Illuminate\Database\Eloquent\Model')) {
                $modelClasses[] = $class;
            }
        }
        return $modelClasses;
    }
}
