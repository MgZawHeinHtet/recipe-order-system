<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard_index(){
        $requests = request(['type_input','last-day','7-days','last-month','last-year']);
        return view('Dashboard.user',[
            'users'=> User::where('is_admin',false)->filter($requests)->paginate(10)
        ]);
    }
}
