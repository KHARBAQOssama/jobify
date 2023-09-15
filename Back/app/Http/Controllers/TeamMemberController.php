<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequests\CreateTeamMemberRequest;
use App\Http\Requests\CompanyRequests\UpdateTeamMemberRequest;
use App\Models\Company;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Util\Log\TeamCity;
use Tymon\JWTAuth\Facades\JWTAuth;

class TeamMemberController extends Controller
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
    public function store(CreateTeamMemberRequest $request)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });
        $controller = new CompanyController;
        $credentials['company_id'] = $controller->getCompany()->id;
        $teamMember = TeamMember::create($credentials);
        return $teamMember;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        $data = $request->request->all();
        $data = $request->all();
        $credentials = array_filter($data, function($value) {
            return $value !== null;
        });

        $teamMember->update($credentials);
        $teamMember->save();
        return $teamMember;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        return "deleted";
    }
}
