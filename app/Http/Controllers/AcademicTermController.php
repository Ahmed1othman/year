<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicTermRequest;
use App\Http\Requests\UpdateAcademicTermRequest;
use App\Models\AcademicTerm;
use App\Services\AcademicTermService;

class AcademicTermController extends Controller
{
    protected AcademicTermService $academicTermService;
    public function __construct(AcademicTermService $academicTermService)
    {
        $this->academicTermService = $academicTermService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicTermService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicTermService->get($id));
    }

    public function store(StoreAcademicTermRequest $request)
    {
        $data = $request->only(
            'academicTerm_code',
            'academicTerm_name',
            'academicTerm_name_latin',
            'academicTerm_description',
            'academicTerm_description_latin',
            'academicTerm_hub_id',
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
        return response()->apiSuccess($this->academicTermService->store($data));
    }

    public function update(UpdateAcademicTermRequest $request, AcademicTerm $academicTerm)
    {
        $data = $request->only(
            'academicTerm_code',
            'academicTerm_name',
            'academicTerm_name_latin',
            'academicTerm_description',
            'academicTerm_description_latin',
            'academicTerm_hub_id',
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
        return response()->apiSuccess($this->academicTermService->update($data,$academicTerm));
    }

}
