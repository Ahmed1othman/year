<?php

namespace App\Services;

use App\Repositories\AcademicClassRepository;

class AcademicClassService
{
    protected AcademicClassRepository $academicClassRepository;
    public function __construct(AcademicClassRepository $academicClassRepository)
    {
        $this->academicClassRepository = $academicClassRepository;
    }
    public function get($id){
        return $this->academicClassRepository->find($id);
    }
    public function getAll(){
        return $this->academicClassRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicClasss', $filename);
            $data['logo'] = $path;
        }
        return $this->academicClassRepository->create($data);
    }

    public function update($data,$academicClass){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicClasss', $filename);
            $data['logo'] = $path;
        }
        return $this->academicClassRepository->update($data,$academicClass);
    }
}


