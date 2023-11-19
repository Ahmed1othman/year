<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicDegreeRequest;
use App\Http\Requests\UpdateAcademicDegreeRequest;
use App\Models\AcademicDegree;
use App\Services\AcademicDegreeService;

class AcademicDegreeController extends Controller
{
    protected AcademicDegreeService $academicDegreeService;
    public function __construct(AcademicDegreeService $academicDegreeService)
    {
        $this->academicDegreeService = $academicDegreeService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicDegreeService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicDegreeService->get($id));
    }

    public function store(StoreAcademicDegreeRequest $request)
    {
        $data = $request->only(
            'academicDegree_code',
            'academicDegree_name',
            'academicDegree_name_latin',
            'academicDegree_description',
            'academicDegree_description_latin',
            'academicDegree_hub_id',
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
        return response()->apiSuccess($this->academicDegreeService->store($data));
    }

    public function update(UpdateAcademicDegreeRequest $request, AcademicDegree $academicDegree)
    {
        $data = $request->only(
            'academicDegree_code',
            'academicDegree_name',
            'academicDegree_name_latin',
            'academicDegree_description',
            'academicDegree_description_latin',
            'academicDegree_hub_id',
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
        return response()->apiSuccess($this->academicDegreeService->update($data,$academicDegree));
    }

}
