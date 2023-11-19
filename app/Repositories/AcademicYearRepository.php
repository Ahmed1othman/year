<?php

namespace App\Repositories;

use App\Models\School;
use \Illuminate\Database\Eloquent\Collection;

class SchoolRepository
{
    public function find($id)
    {
        return School::findOrFail($id);
    }
    public function getAll(): Collection
    {
        return School::all();
    }

     public function create($data){
        return School::create($data);
     }

    public function update($data,$school){
        return $school->update($data);
    }
}
