<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Services\AcademicYearService;

class AcademicYearController extends Controller
{
    protected AcademicYearService $academicYearService;
    public function __construct(AcademicYearService $academicYearService)
    {
        $this->academicYearService = $academicYearService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicYearService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicYearService->get($id));
    }

    public function store(StoreAcademicYearRequest $request)
    {
        $data = $request->only(
            'academicYear_code',
            'academicYear_name',
            'academicYear_name_latin',
            'academicYear_description',
            'academicYear_description_latin',
            'academicYear_hub_id',
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
        return response()->apiSuccess($this->academicYearService->store($data));
    }

    public function update(UpdateAcademicYearRequest $request, AcademicYear $academicYear)
    {
        $data = $request->only(
            'academicYear_code',
            'academicYear_name',
            'academicYear_name_latin',
            'academicYear_description',
            'academicYear_description_latin',
            'academicYear_hub_id',
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
        return response()->apiSuccess($this->academicYearService->update($data,$academicYear));
    }

}
