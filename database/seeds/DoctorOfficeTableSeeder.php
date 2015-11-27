<?php

use Illuminate\Database\Seeder;

class DoctorOfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('doctor_offices')->insert(
            ['name' => '内分泌科']
        );

        DB::table('doctor_offices')->insert(
            ['name' => '综合内科']
        );

        DB::table('doctor_offices')->insert(
            ['name' => '外科（甲状腺）']
        );

        DB::table('doctor_offices')->insert(
            ['name' => '核医学科']
        );

        DB::table('doctor_offices')->insert(
            ['name' => '其他科室']
        );
    }
}
