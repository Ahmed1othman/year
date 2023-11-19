<?php

namespace App\Services;

use App\Http\Requests\StoreGenderRequest;
use App\Repositories\GenderRepository;
use App\Repositories\OrganizationRepository;

class GenderService
{
    protected GenderRepository $genderRepository;
    public function __construct(GenderRepository $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }
    public function get($id){
        return $this->genderRepository->find($id);
    }
    public function getAll(){
        return $this->genderRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->genderRepository->create($data);
    }

    public function update($data,$gender){
        $data['updated_by']= app('auth_id');
        return $this->genderRepository->update($data,$gender);
    }
}
