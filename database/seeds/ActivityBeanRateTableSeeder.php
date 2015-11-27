<?php

use Illuminate\Database\Seeder;

class ActivityBeanRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [1, '千院科教', 'invite_doctor', 50]);

        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [2, '黄埔学堂', 'invite_doctor', 60]);

        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [2, '黄埔学堂', 'require_class', 100]);

        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [3, '医师助手', 'invite_doctor', 50]);

        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [3, '医师助手', 'require_class', 80]);

        DB::insert('insert into activity_bean_rates (activity_id, activity_name, action, rate) values (?, ?, ?, ?)'
            , [4, '空中课堂', 'invite_doctor', 30]);

    }
}
