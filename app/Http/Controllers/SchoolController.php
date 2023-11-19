<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use App\Services\SchoolService;

class SchoolController extends Controller
{
    protected SchoolService $schoolService;
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        return response()->apiSuccess($this->schoolService->getAll());
    }

    public function show($id){
        return response()->apiSuccess($this->schoolService->get($id));
    }

    public function store(StoreSchoolRequest $request)
    {
        $data = $request->only(
            'school_code',
            'school_name',
            'school_name_latin',
            'school_description',
            'school_description_latin',
            'school_hub_id',
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
        return response()->apiSuccess($this->schoolService->store($data));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        $data = $request->only(
            'school_code',
            'school_name',
            'school_name_latin',
            'school_description',
            'school_description_latin',
            'school_hub_id',
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
        return response()->apiSuccess($this->schoolService->update($data,$school));
    }

}
