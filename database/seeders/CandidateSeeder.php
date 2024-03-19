<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $query = array(
            array(
                'name' => 'Bacanto, Joiphylen C.',
                'election_id' => 1,
            ),
            array(
                'name' => 'Bautista, Edwin S.',
                'election_id' => 1,
            ),
            array(
                'name' => 'Macalos, Carina F.',
                'election_id' => 1,
            ),
            array(
                'name' => 'Moreto, Luisito A. Jr.',
                'election_id' => 1,
            ),
            array(
                'name' => 'Vibal, Reynante B.',
                'election_id' => 1,
            ),
            //Election Committee
            array(
                'name' => 'Abio, Juan P.',
                'election_id' => 2,
            ),
            array(
                'name' => 'Bautista, Nelson S.',
                'election_id' => 2,
            ),
            array(
                'name' => 'David, Emil C.',
                'election_id' => 2,
            ),
            array(
                'name' => 'Ladub, Benedict L.',
                'election_id' => 2,
            ),
            array(
                'name' => 'Minalabag, Ronald R.',
                'election_id' => 2,
            ),
            array(
                'name' => 'Carillaga, Rizza D.',
                'election_id' => 3,
            ),
            array(
                'name' => 'Ebarvia, Glenda A.',
                'election_id' => 3,
            ),
            array(
                'name' => 'Legasto, Ma. Cecillia C.',
                'election_id' => 3,
            ),
        );
        DB::table('tbl_candidates')->insert($query);
    }
}
