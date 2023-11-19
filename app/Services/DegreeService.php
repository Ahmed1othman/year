<?php

namespace App\Services;

use App\Repositories\DegreeRepository;

class DegreeService
{
    protected DegreeRepository $degreeRepository;
    public function __construct(DegreeRepository $degreeRepository)
    {
        $this->degreeRepository = $degreeRepository;
    }
    public function get($id){
        return $this->degreeRepository->find($id);
    }
    public function getAll(){
        return $this->degreeRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->degreeRepository->create($data);
    }

    public function update($data,$degree){
        $data['updated_by']= app('auth_id');
        return $this->degreeRepository->update($data,$degree);
    }
}
