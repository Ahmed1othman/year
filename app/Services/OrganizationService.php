<?php

namespace App\Services;

use App\Repositories\OrganizationRepository;
use App\Services\general\StorageService;

class OrganizationService
{
    protected OrganizationRepository $organizationRepository;
    private StorageService $storageService;

    public function __construct(OrganizationRepository $organizationRepository,StorageService $storageService)
    {
        $this->organizationRepository = $organizationRepository;
        $this->storageService = $storageService;
    }
    public function get($id){
        return $this->organizationRepository->find($id);
    }
    public function getAll(){
        return $this->organizationRepository->getAll();
    }

    public function store($data){
        if (isset($data['logo']))
            $data['logo'] = $this->storageService->storeFile($data['logo'],'organizations');

        $data['created_by']= app('auth_id');
        return $this->organizationRepository->create($data);
    }

    public function update($data,$organization){
        if (isset($data['logo'])) {
            $filename = 'organizations_'.time() . '.' .$data['logo']->getClientOriginalExtension();

            $path = upload($data['logo'], 's3',  config('service_setting.service_name'). '/organizations', $filename);

            $data['logo'] = $path;
        }
        $data['updated_by']= app('auth_id');
        return $this->organizationRepository->update($data,$organization);
    }
}
