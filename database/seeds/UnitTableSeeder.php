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
            ['abbreviation' => 'novo_nordisk',  'full_name' => '诺和诺德' ]
        );

        DB::table('units')->insert(
            ['abbreviation' => 'merck', 'full_name' => '默克' ]);

        DB::table('units')->insert(
            ['abbreviation' => 'medscience_tech', 'full_name' => '迈德同信' ]
        );
    }
}
