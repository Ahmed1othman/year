<?php

namespace App\Services;

use App\Repositories\SchoolHubRepository;

class SchoolHubService
{
    protected SchoolHubRepository $schoolHubRepository;
    public function __construct(SchoolHubRepository $schoolHubRepository)
    {
        $this->schoolHubRepository = $schoolHubRepository;
    }
    public function get($id){
        return $this->schoolHubRepository->find($id);
    }
    public function getAll(){
        return $this->schoolHubRepository->getAll();
    }

    public function store($data){
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/school_hubs', $filename);
            $data['logo'] = $path;
        }
        $data['created_by']= app('auth_id');
        return $this->schoolHubRepository->create($data);
    }

    public function update($data,$schoolHub){
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();
            $path = upload($data['logo'], 's3',  config('service_setting.service_name') . '/school_hubs', $filename);
            $data['logo'] = $path;
        }
        $data['updated_by']= app('auth_id');
        return $this->schoolHubRepository->update($data,$schoolHub);
    }
}
