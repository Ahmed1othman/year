<?php

namespace App\Services;

use App\Repositories\AcademicGenderRepository;

class AcademicGenderService
{
    protected AcademicGenderRepository $academicGenderRepository;
    public function __construct(AcademicGenderRepository $academicGenderRepository)
    {
        $this->academicGenderRepository = $academicGenderRepository;
    }
    public function get($id){
        return $this->academicGenderRepository->find($id);
    }
    public function getAll(){
        return $this->academicGenderRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicGenders', $filename);
            $data['logo'] = $path;
        }
        return $this->academicGenderRepository->create($data);
    }

    public function update($data,$academicGender){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicGenders', $filename);
            $data['logo'] = $path;
        }
        return $this->academicGenderRepository->update($data,$academicGender);
    }
}


