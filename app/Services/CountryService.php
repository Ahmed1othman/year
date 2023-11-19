<?php

namespace App\Services;

use App\Http\Requests\StoreCountryRequest;
use App\Repositories\CountryRepository;
use App\Repositories\OrganizationRepository;

class CountryService
{
    protected CountryRepository $countryRepository;
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    public function get($id){
        return $this->countryRepository->find($id);
    }
    public function getAll(){
        return $this->countryRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->countryRepository->create($data);
    }

    public function update($data,$country){
        $data['updated_by']= app('auth_id');
        return $this->countryRepository->update($data,$country);
    }
}
