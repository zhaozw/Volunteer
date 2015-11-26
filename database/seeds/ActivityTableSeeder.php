<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activitys')->insert(
            ['title' => '千院科教', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 1]
        );

        DB::table('activitys')->insert(
            ['title' => '黄埔学堂', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 1]
        );

        DB::table('activitys')->insert(
            ['title' => '医师助手', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 1]
        );

        DB::table('activitys')->insert(
            ['title' => '空中课堂', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 1]
        );

        DB::table('activitys')->insert(
            ['title' => 'e名医', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 1]
        );

        DB::table('activitys')->insert(
            ['title' => '甲状腺书院', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 2]
        );

        DB::table('activitys')->insert(
            ['title' => '甲状腺公开课', 'abstract' => '摘要', 'details' => '详情', 'valid' => true, 'unit_id' => 2]
        );

    }

} /*class*/
