<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['organization_count']=Organization::all()->count();
        $data['user_count']=User::all()->count();

        return view('admin.dashboard.index',$data);
    }
}
