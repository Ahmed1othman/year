<?php

namespace App\Services;

use App\Repositories\PhoneRepository;

class PhoneService
{
    protected PhoneRepository $phoneRepository;
    public function __construct(PhoneRepository $phoneRepository)
    {
        $this->phone = $phoneRepository;
    }
    public function get($id){
        return $this->phone->find($id);
    }
    public function getAll(){
        return $this->phone->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->phone->create($data);
    }

    public function update($data,$phone){
        $data['updated_by']= app('auth_id');
        return $this->phone->update($data,$phone);
    }
}
