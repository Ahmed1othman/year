<?php

namespace App\Repositories;

use App\Models\AcademicYear;
use \Illuminate\Database\Eloquent\Collection;

class AcademicYearRepository
{
    public function find($id)
    {
        return AcademicYear::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicYear::all();
    }

     public function create($data){
        return AcademicYear::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
