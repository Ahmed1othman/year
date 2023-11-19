<?php

namespace App\Repositories;

use App\Models\AcademicDegree;
use \Illuminate\Database\Eloquent\Collection;

class AcademicDegreeRepository
{
    public function find($id)
    {
        return AcademicDegree::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicDegree::all();
    }

     public function create($data){
        return AcademicDegree::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
