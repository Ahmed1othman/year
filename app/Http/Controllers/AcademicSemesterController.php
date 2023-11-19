<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicSemesterRequest;
use App\Http\Requests\UpdateAcademicSemesterRequest;
use App\Models\AcademicSemester;
use App\Services\AcademicSemesterService;

class AcademicSemesterController extends Controller
{
    protected AcademicSemesterService $academicSemesterService;
    public function __construct(AcademicSemesterService $academicSemesterService)
    {
        $this->academicSemesterService = $academicSemesterService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicSemesterService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicSemesterService->get($id));
    }

    public function store(StoreAcademicSemesterRequest $request)
    {
        $data = $request->only(
            'academicSemester_code',
            'academicSemester_name',
            'academicSemester_name_latin',
            'academicSemester_description',
            'academicSemester_description_latin',
            'academicSemester_hub_id',
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
        return response()->apiSuccess($this->academicSemesterService->store($data));
    }

    public function update(UpdateAcademicSemesterRequest $request, AcademicSemester $academicSemester)
    {
        $data = $request->only(
            'academicSemester_code',
            'academicSemester_name',
            'academicSemester_name_latin',
            'academicSemester_description',
            'academicSemester_description_latin',
            'academicSemester_hub_id',
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
        return response()->apiSuccess($this->academicSemesterService->update($data,$academicSemester));
    }

}
