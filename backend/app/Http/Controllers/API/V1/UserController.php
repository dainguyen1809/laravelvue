<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Department;
use App\Models\User;
use App\Models\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('users.id', '!=', '1')
            ->join('departments', 'users.department_id', 'departments.id')
            ->join('user_statuses', 'user_statuses.id', 'users.status_id')
            ->select(
                'users.*',
                'departments.name AS department',
                'user_statuses.name AS status',
            )->get();



        return response()->json($users);
    }
    public function create()
    {
        $user_status = UserStatus::select(
            'id as value',
            'name as label',
        )->get();


        $department = Department::select(
            'id as value',
            'name as label',
        )->get();

        return response()->json([
            'user_status' => $user_status,
            'department' => $department,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        // User::create([
        //     'status_id' => $request['status_id'],
        //     'username' => $request['username'],
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'department_id' => $request['department_id'],
        //     'password' => $request['password'],
        // ]);


        $user = $request->except('password_confirmation');
        User::create($user);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $user_status = UserStatus::select(
            'id as value',
            'name as label',
        )->get();


        $department = Department::select(
            'id as value',
            'name as label',
        )->get();

        return response()->json([
            'user' => $user,
            'user_status' => $user_status,
            'department' => $department,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255,' . $id,
            'department_id' => 'required',
            'status_id' => 'required',
        ], [
            'username.required' => ':attribute cannot be empty !',
            'username.max' => ':attribute only contain 255 characters !',

            'name.required' => ':attribute cannot be empty !',
            'name.max' => ':attribute only contain 255 characters !',

            'email.email' => ':attribute invalid. Please enter again !',
            'email.required' => ':attribute cannot be empty !',
            'email.max' => ':attribute only contain 255 characters !',
            'email.unique' => ':attribute already used !',

            'department_id.required' => ':attribute cannot be empty !',
            'status_id.required' => ':attribute cannot be empty !',
        ], [
            'username' => 'Username',
            'name' => 'Fullname',
            'email' => 'Email',
            'password' => 'Password',
            'department_id' => 'Department',
            'status_id' => 'Status',
        ]);

        User::find($id)->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'status_id' => $request['status_id'],
            'department_id' => $request['department_id'],
        ]);

        if ($request['change_password'] == true) {
            $validate = $request->validate([
                'password' => 'required|confirmed|max:255',

            ], [
                'password.required' => ':attribute cannot be empty !',
                'password.confirmed' => 'Password Confirm invalid !',
                'password.max' => ':attribute only contain 255 characters !',
            ], [
                'password' => 'Password',
            ]);

            User::find($id)->update([
                'password' => $request['password'],
                'change_password_at' => now(),
            ]);
        }

    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}
