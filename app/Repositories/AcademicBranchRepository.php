<?php

namespace App\Repositories;

use App\Models\AcademicBranch;
use \Illuminate\Database\Eloquent\Collection;

class AcademicBranchRepository
{
    public function find($id)
    {
        return AcademicBranch::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return AcademicBranch::all();
    }

     public function create($data){
        return AcademicBranch::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
