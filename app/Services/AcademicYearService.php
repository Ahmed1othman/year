<?php

namespace App\Services;

use App\Repositories\AcademicYearRepository;

class AcademicYearService
{
    protected AcademicYearRepository $academicYearRepository;
    public function __construct(AcademicYearRepository $academicYearRepository)
    {
        $this->academicYearRepository = $academicYearRepository;
    }
    public function get($id){
        return $this->academicYearRepository->find($id);
    }
    public function getAll(){
        return $this->academicYearRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicYears', $filename);
            $data['logo'] = $path;
        }
        return $this->academicYearRepository->create($data);
    }

    public function update($data,$academicYear){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicYears', $filename);
            $data['logo'] = $path;
        }
        return $this->academicYearRepository->update($data,$academicYear);
    }
}


