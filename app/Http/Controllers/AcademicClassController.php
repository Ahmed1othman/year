<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicClassRequest;
use App\Http\Requests\UpdateAcademicClassRequest;
use App\Models\AcademicClass;
use App\Services\AcademicClassService;

class AcademicClassController extends Controller
{
    protected AcademicClassService $academicClassService;
    public function __construct(AcademicClassService $academicClassService)
    {
        $this->academicClassService = $academicClassService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicClassService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicClassService->get($id));
    }

    public function store(StoreAcademicClassRequest $request)
    {
        $data = $request->only(
            'academicClass_code',
            'academicClass_name',
            'academicClass_name_latin',
            'academicClass_description',
            'academicClass_description_latin',
            'academicClass_hub_id',
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
        return response()->apiSuccess($this->academicClassService->store($data));
    }

    public function update(UpdateAcademicClassRequest $request, AcademicClass $academicClass)
    {
        $data = $request->only(
            'academicClass_code',
            'academicClass_name',
            'academicClass_name_latin',
            'academicClass_description',
            'academicClass_description_latin',
            'academicClass_hub_id',
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
        return response()->apiSuccess($this->academicClassService->update($data,$academicClass));
    }

}
