<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert(
            ['abbreviation' => 'novo_nordisk',  'fullname' => '诺和诺德' ]
        );

        DB::table('units')->insert(
            ['abbreviation' => 'merck', 'fullname' => '默克' ]);

        DB::table('units')->insert(
            ['abbreviation' => 'medscience_tech', 'fullname' => '迈德同信' ]
        );
    }
}
