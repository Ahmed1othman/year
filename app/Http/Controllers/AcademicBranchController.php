<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicBranchRequest;
use App\Http\Requests\UpdateAcademicBranchRequest;
use App\Models\AcademicBranch;
use App\Services\AcademicBranchService;

class AcademicBranchController extends Controller
{
    protected AcademicBranchService $academicBranchService;
    public function __construct(AcademicBranchService $academicBranchService)
    {
        $this->academicBranchService = $academicBranchService;
    }

    public function index()
    {
        return response()->apiSuccess($this->academicBranchService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->academicBranchService->get($id));
    }

    public function store(StoreAcademicBranchRequest $request)
    {
        $data = $request->only(
            'academicBranch_code',
            'academicBranch_name',
            'academicBranch_name_latin',
            'academicBranch_description',
            'academicBranch_description_latin',
            'academicBranch_hub_id',
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
        return response()->apiSuccess($this->academicBranchService->store($data));
    }

    public function update(UpdateAcademicBranchRequest $request, AcademicBranch $academicBranch)
    {
        $data = $request->only(
            'academicBranch_code',
            'academicBranch_name',
            'academicBranch_name_latin',
            'academicBranch_description',
            'academicBranch_description_latin',
            'academicBranch_hub_id',
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
        return response()->apiSuccess($this->academicBranchService->update($data,$academicBranch));
    }

}
