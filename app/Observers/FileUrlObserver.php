<?php

namespace App\Observers;

use App\Services\general\StorageService;
use Illuminate\Support\Facades\Log;

class FileUrlObserver
{
    public function retrieved($model): void
    {
        if (property_exists($model, 'fileAttributes')) {
            if ($model->fileAttributes)
                foreach ($model->fileAttributes as $fileAttribute) {
                    $model->setAttribute("{$fileAttribute}_url", (new StorageService())->getFileUrl($model->{$fileAttribute}));
                }
        }
    }
}
