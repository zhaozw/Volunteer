<?php

use Illuminate\Database\Seeder;

class HPXTClassScaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('hpxt_class_scales')->insert([
            'scale' => '0-10人'
        ]);

        DB::table('hpxt_class_scales')->insert([
            'scale' => '10-30人'
        ]);

        DB::table('hpxt_class_scales')->insert([
            'scale' => '30-80人'
        ]);

        DB::table('hpxt_class_scales')->insert([
            'scale' => '30-200人'
        ]);

        DB::table('hpxt_class_scales')->insert([
            'scale' => '大于200人'
        ]);

    }
}
