<?php

namespace App\Services;

use App\Repositories\AcademicTermRepository;

class AcademicTermService
{
    protected AcademicTermRepository $academicTermRepository;
    public function __construct(AcademicTermRepository $academicTermRepository)
    {
        $this->academicTermRepository = $academicTermRepository;
    }
    public function get($id){
        return $this->academicTermRepository->find($id);
    }
    public function getAll(){
        return $this->academicTermRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/AcademicTerms', $filename);
            $data['logo'] = $path;
        }
        return $this->academicTermRepository->create($data);
    }

    public function update($data,$academicTerm){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/AcademicTerms', $filename);
            $data['logo'] = $path;
        }
        return $this->academicTermRepository->update($data,$academicTerm);
    }
}


