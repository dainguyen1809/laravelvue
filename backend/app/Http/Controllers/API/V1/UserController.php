<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::join('departments', 'users.department_id', 'departments.id')
            ->join('user_statuses', 'user_statuses.id', 'users.status_id')
            ->select(
                'users.*',
                'departments.name AS department',
                'user_statuses.name AS status',
            )->get();


        return response()->json($users);
    }

    // public function show($id)
    // {
    //     return User::findOrFail($id);
    // }
}
