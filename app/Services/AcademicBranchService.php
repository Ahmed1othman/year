<?php

namespace App\Services;

use App\Repositories\AcademicBranchRepository;

class AcademicBranchService
{
    protected AcademicBranchRepository $academicBranchRepository;
    public function __construct(AcademicBranchRepository $academicBranchRepository)
    {
        $this->academicBranchRepository = $academicBranchRepository;
    }
    public function get($id){
        return $this->academicBranchRepository->find($id);
    }
    public function getAll(){
        return $this->academicBranchRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicBranchs', $filename);
            $data['logo'] = $path;
        }
        return $this->academicBranchRepository->create($data);
    }

    public function update($data,$academicBranch){
        $data['updated_by']= app('auth_id');
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/academicBranchs', $filename);
            $data['logo'] = $path;
        }
        return $this->academicBranchRepository->update($data,$academicBranch);
    }
}


