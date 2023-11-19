<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicGenderRequest;
use App\Http\Requests\UpdateAcademicGenderRequest;
use App\Models\AcademicGender;
use App\Services\AcademicGenderService;

class AcademicGenderController extends Controller
{
    protected AcademicGenderService $academicGenderService;
    public function __construct(AcademicGenderService $academicGenderService)
    {
        $this->academicGenderService = $academicGenderService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicGenderService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicGenderService->get($id));
    }

    public function store(StoreAcademicGenderRequest $request)
    {
        $data = $request->only(
            'academicGender_code',
            'academicGender_name',
            'academicGender_name_latin',
            'academicGender_description',
            'academicGender_description_latin',
            'academicGender_hub_id',
            'org_id',
            'city',
            'postal_code',
            'address_line_1',
            'address_line_2',
            'active'
        );
        if ($request->hasFile('logo')){
            $data['logo'] = $request->file('logo');
        }
        return response()->apiSuccess($this->academicGenderService->store($data));
    }

    public function update(UpdateAcademicGenderRequest $request, AcademicGender $academicGender)
    {
        $data = $request->only(
            'academicGender_code',
            'academicGender_name',
            'academicGender_name_latin',
            'academicGender_description',
            'academicGender_description_latin',
            'academicGender_hub_id',
            'org_id',
            'city',
            'postal_code',
            'address_line_1',
            'address_line_2',
            'active'
        );
        if ($request->hasFile('logo')){
            $data['logo'] = $request->file('logo');
        }
        return response()->apiSuccess($this->academicGenderService->update($data,$academicGender));
    }

}
