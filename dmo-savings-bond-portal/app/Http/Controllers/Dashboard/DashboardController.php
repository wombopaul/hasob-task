<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Hasob\FoundationCore\Models\User;
use Hasob\FoundationCore\Models\Department;
use Hasob\FoundationCore\Models\Organization;

use Hasob\FoundationCore\Controllers\BaseController;

class DashboardController extends BaseController
{


    public function index(Organization $org, Request $request){

        $current_user = Auth()->user();
        $assignments = [];

        return view('dashboard.index')
                    ->with('organization', $org)
                    ->with('assignments', $assignments)
                    ->with('current_user', $current_user);
    }


}
