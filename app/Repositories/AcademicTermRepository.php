<?php

namespace App\Repositories;

use App\Models\AcademicTerm;
use \Illuminate\Database\Eloquent\Collection;

class AcademicTermRepository
{
    public function find($id)
    {
        return AcademicTerm::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicTerm::all();
    }

     public function create($data){
        return AcademicTerm::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
