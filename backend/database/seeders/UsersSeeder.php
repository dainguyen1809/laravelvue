<?php

namespace Database\Seeders;

use App\Enums\DepartmentType;
use App\Enums\StatusType;
use App\Models\Department;
use App\Models\User;
use App\Models\UserStatus;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'ADMIN',
                'name' => 'Nguyễn Hữu Đại',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'),
                'department_id' => '1',
                'status_id' => '1',
            ],
            [
                'username' => 'TEST',
                'name' => 'Test',
                'email' => 'hehe@test.com',
                'password' => Hash::make('password'),
                'department_id' => '2',
                'status_id' => '1',
            ],

        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

        // $arr = [];
        // $faker = \Faker\Factory::create();
        // $departments = Department::query()->pluck('id')->toArray();
        // $user_statuses = UserStatus::query()->pluck('id')->toArray();
        // for ($i = 1; $i <= 1000; $i++) {
        //     $arr[] = [
        //         'name' => $faker->firstName . ' ' . $faker->lastName,
        //         'avatar' => $faker->imageUrl,
        //         'email' => $faker->email,
        //         'password' => $faker->md5,
        //         'username' => $faker->boolean ? 'ADMIN' : null,
        //         'department_id' => $faker->randomElement(DepartmentType::getValues()),
        //         'status_id' => $faker->randomElement(StatusType::getValues()),
        //     ];
        //     if ($i % 100 === 0) {
        //         User::insert($arr);
        //         $arr = [];
        //     }
        // }

    }
}
