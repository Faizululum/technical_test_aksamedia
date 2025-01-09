<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Wahid',
                'phone' => '1234567890',
                'division_id' => '9deb0c2c-403b-428c-8a7c-274f3b0ba804', // UUID divisi Fullstack
                'position' => 'Manager',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Isnain',
                'phone' => '0987654321',
                'division_id' => '9deb0c2c-403b-428c-8a7c-274f3b0ba804', // UUID divisi Fullstack
                'position' => 'Staff',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Rina',
                'phone' => '1122334455',
                'division_id' => '9deb0c2c-42ae-47e3-8878-588a7cb41e15', // UUID divisi Backend
                'position' => 'HR Officer',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Rania',
                'phone' => '2334321934',
                'division_id' => '9deb0c2c-42ae-47e3-8878-588a7cb41e15', // UUID divisi Backend
                'position' => 'Assistant',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Dika',
                'phone' => '1198334455',
                'division_id' => '9deb0c2c-43a7-4fae-b36c-0fba7d46da3e', // UUID divisi Frontend
                'position' => 'HR Officer',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Zahra',
                'phone' => '2334331934',
                'division_id' => '9deb0c2c-43a7-4fae-b36c-0fba7d46da3e', // UUID divisi Frontend
                'position' => 'Assistant',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Farhan',
                'phone' => '1198334455',
                'division_id' => '9deb0c2c-2b76-4e5d-a899-096bf98d8a17', // UUID divisi Mobile Apps
                'position' => 'Supervisor',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Syahrul',
                'phone' => '2334331934',
                'division_id' => '9deb0c2c-2b76-4e5d-a899-096bf98d8a17', // UUID divisi Mobile Apps
                'position' => 'Specialist',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Cinta',
                'phone' => '1198334455',
                'division_id' => '9deb0c2c-44f0-4a9b-9bff-f4b07a9846aa', // UUID divisi UI/UX Designer
                'position' => 'Manager',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Engie',
                'phone' => '2334331934',
                'division_id' => '9deb0c2c-44f0-4a9b-9bff-f4b07a9846aa', // UUID divisi UI/UX Designer
                'position' => 'Analyst',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Lukman',
                'phone' => '1198334455',
                'division_id' => '9deb0c2c-3ef6-4bf1-bc02-fe3f916b0597', // UUID divisi QA
                'position' => 'Manager',
            ],
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'image' => null,
                'name' => 'Rahmah',
                'phone' => '2334331934',
                'division_id' => '9deb0c2c-3ef6-4bf1-bc02-fe3f916b0597', // UUID divisi QA
                'position' => 'Analyst',
            ],

        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
