<?php

namespace App\Repositories;

use App\Models\AcademicGender;
use \Illuminate\Database\Eloquent\Collection;

class AcademicGenderRepository
{
    public function find($id)
    {
        return AcademicGender::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicGender::all();
    }

     public function create($data){
        return AcademicGender::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
