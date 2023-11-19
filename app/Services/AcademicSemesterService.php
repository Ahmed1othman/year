<?php

namespace App\Services;

use App\Repositories\AcademicSemesterRepository;

class AcademicSemesterService
{
    protected AcademicSemesterRepository $academicSemesterRepository;
    public function __construct(AcademicSemesterRepository $academicSemesterRepository)
    {
        $this->academicSemesterRepository = $academicSemesterRepository;
    }
    public function get($id){
        return $this->academicSemesterRepository->find($id);
    }
    public function getAll(){
        return $this->academicSemesterRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicSemesters', $filename);
            $data['logo'] = $path;
        }
        return $this->academicSemesterRepository->create($data);
    }

    public function update($data,$academicSemester){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicSemesters', $filename);
            $data['logo'] = $path;
        }
        return $this->academicSemesterRepository->update($data,$academicSemester);
    }
}


