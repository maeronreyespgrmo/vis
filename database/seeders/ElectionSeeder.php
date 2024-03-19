<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elections = array(
            array('title' => 'Board of Directors'),
            array('title' => 'Audit & Inventory Committee'),
            array('title' => 'Election Committee')
        );

        Election::insert($elections);
    }
}
