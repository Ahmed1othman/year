<?php

namespace App\Services;

use App\Repositories\GroupDegreeRepository;

class GroupDegreeService
{
    protected GroupDegreeRepository $groupDegreeRepository;
    public function __construct(GroupDegreeRepository $groupDegreeRepository)
    {
        $this->groupDegreeRepository = $groupDegreeRepository;
    }
    public function get($id){
        return $this->groupDegreeRepository->find($id);
    }
    public function getAll(){
        return $this->groupDegreeRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->groupDegreeRepository->create($data);
    }

    public function update($data,$groupDegree){
        $data['updated_by']= app('auth_id');
        return $this->groupDegreeRepository->update($data,$groupDegree);
    }
}
