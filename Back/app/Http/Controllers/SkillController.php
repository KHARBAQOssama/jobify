<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequests\Skills\SkillsRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillsRequest $request)
    {
        $inputSkills = $request->input('skills');

        $skillIds = collect($inputSkills)->map(function ($skillName) {
            return Skill::firstOrCreate(['name' => $skillName])->id;
        });

        $employeeController = new EmployeeController;
        $employee = $employeeController->getEmployee();
        $employee->skills()->detach();

        $employee->skills()->sync($skillIds);

        return response()->json(['message' => 'Skills updated successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
