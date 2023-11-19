<?php

namespace App\Services;

use App\Http\Requests\StoreBranchRequest;
use App\Repositories\BranchRepository;
use App\Repositories\OrganizationRepository;

class BranchService
{
    protected BranchRepository $branchRepository;
    public function __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }
    public function get($id){
        return $this->branchRepository->find($id);
    }
    public function getAll(){
        return $this->branchRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->branchRepository->create($data);
    }

    public function update($data,$branch){
        $data['updated_by']= app('auth_id');
        return $this->branchRepository->update($data,$branch);
    }
}
