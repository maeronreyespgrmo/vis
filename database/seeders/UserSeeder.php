<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array(
                'name'  => 'Overall Administrator',
                'email' => 'miso@laguna.gov.ph',
                'password' => bcrypt('123'),
            )
        );

        User::insert($users);
    }
}
