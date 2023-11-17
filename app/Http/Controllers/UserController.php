<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard_index(){
        return view('Dashboard.user',[
            'users'=> User::where('is_admin',false)->paginate(10)
        ]);
    }
}
