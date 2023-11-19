<?php

namespace App\Services;

use App\Repositories\AcademicDegreeRepository;

class AcademicDegreeService
{
    protected AcademicDegreeRepository $academicDegreeRepository;
    public function __construct(AcademicDegreeRepository $academicDegreeRepository)
    {
        $this->academicDegreeRepository = $academicDegreeRepository;
    }
    public function get($id){
        return $this->academicDegreeRepository->find($id);
    }
    public function getAll(){
        return $this->academicDegreeRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicDegrees', $filename);
            $data['logo'] = $path;
        }
        return $this->academicDegreeRepository->create($data);
    }

    public function update($data,$academicDegree){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicDegrees', $filename);
            $data['logo'] = $path;
        }
        return $this->academicDegreeRepository->update($data,$academicDegree);
    }
}


