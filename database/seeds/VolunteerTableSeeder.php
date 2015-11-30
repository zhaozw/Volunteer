<?php

use Illuminate\Database\Seeder;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteers')->insert([
            'name' => '蔡乾',
            'phone' => '18671616161',
            'email' => 'cai.q@foxmail.com',
            'unit_id' => 1,
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('volunteers')->insert([
            'name' => '许守明',
            'phone' => '12345678912',
            'email' => '123443@qq.com',
            'unit_id' => 2,
            'created_at' =>\Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
