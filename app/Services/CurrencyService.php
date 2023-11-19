<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class CurrencyService
{
    protected CurrencyRepository $currencyRepository;
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }
    public function get($id){
        return $this->currencyRepository->find($id);
    }
    public function getAll(){
        return $this->currencyRepository->getAll();
    }

    public function store($data){
        $data['created_by']= app('auth_id');
        return $this->currencyRepository->create($data);
    }

    public function update($data,$currency){
        $data['updated_by']= app('auth_id');
        return $this->currencyRepository->update($data,$currency);
    }
}
