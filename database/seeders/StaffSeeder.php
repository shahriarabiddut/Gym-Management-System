<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $staff = [
            [
                'department_id' => '1',
                'name' => 'Staff 1',
                'email' => 'shahriarabiddut@gmail.com',
                'password' => bcrypt('Password')
            ], [
                'department_id' => '1',
                'name' => 'Staff 2',
                'email' => 'shahriarhmed@gmail.com',
                'password' => bcrypt('Password')
            ]

        ];
        Staff::insert($staff);
    }
}
