<?php

namespace App\Repositories;

use App\Models\AcademicClass;
use \Illuminate\Database\Eloquent\Collection;

class AcademicClassRepository
{
    public function find($id)
    {
        return AcademicClass::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicClass::all();
    }

     public function create($data){
        return AcademicClass::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
