<?php

namespace App\Repositories;

use App\Models\AcademicSemester;
use \Illuminate\Database\Eloquent\Collection;

class AcademicSemesterRepository
{
    public function find($id)
    {
        return AcademicSemester::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicSemester::all();
    }

     public function create($data){
        return AcademicSemester::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
