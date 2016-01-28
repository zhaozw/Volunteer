<?php

use Illuminate\Database\Seeder;

class HPXTClassModeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hpxt_class_modes')->insert([
            'mode' => '普通'
        ]);
        DB::table('hpxt_class_modes')->insert([
            'mode' => '医院'
        ]);
        DB::table('hpxt_class_modes')->insert([
            'mode' => '城市'
        ]);

    }
}
