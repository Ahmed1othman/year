<?php

namespace App\Services;

use App\Repositories\SchoolRepository;

class AcademicYearService
{
    protected SchoolRepository $schoolRepository;
    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }
    public function get($id){
        return $this->schoolRepository->find($id);
    }
    public function getAll(){
        return $this->schoolRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/schools', $filename);
            $data['logo'] = $path;
        }
        return $this->schoolRepository->create($data);
    }

    public function update($data,$school){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/schools', $filename);
            $data['logo'] = $path;
        }
        return $this->schoolRepository->update($data,$school);
    }
}


