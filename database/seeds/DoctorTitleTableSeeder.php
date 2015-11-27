<?php

use Illuminate\Database\Seeder;

class DoctorTitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('doctor_titles')->insert([
            'name' => '医学实习生'
        ]);

        DB::table('doctor_titles')->insert([
            'name' => '住院医师'
        ]);

        DB::table('doctor_titles')->insert([
            'name' => '主治医师'
        ]);

        DB::table('doctor_titles')->insert([
            'name' => '副主任医师'
        ]);

        DB::table('doctor_titles')->insert([
            'name' => '主任医师'
        ]);
    }
}
