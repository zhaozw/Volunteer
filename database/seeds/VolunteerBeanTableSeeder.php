<?php

use Illuminate\Database\Seeder;

class VolunteerBeanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::insert('insert into volunteer_beans (volunteer_id, bean_rate_id, valid, action_at, valid_time) values (?, ?, ?, ?, ?)'
            , [2, 1, true, \Carbon\Carbon::now(), \Carbon\Carbon::now()]);

        DB::insert('insert into volunteer_beans (volunteer_id, bean_rate_id, valid, action_at, valid_time) values (?, ?, ?, ?, ?)'
            , [2, 2, true, \Carbon\Carbon::now(), \Carbon\Carbon::now()]);

        DB::insert('insert into volunteer_beans (volunteer_id, bean_rate_id, valid, action_at, valid_time) values (?, ?, ?, ?, ?)'
            , [2, 3, true, \Carbon\Carbon::now(), \Carbon\Carbon::now()]);

        DB::insert('insert into volunteer_beans (volunteer_id, bean_rate_id, valid, action_at, valid_time) values (?, ?, ?, ?, ?)'
            , [2, 4, true, \Carbon\Carbon::now(), \Carbon\Carbon::now()]);

        DB::insert('insert into volunteer_beans (volunteer_id, bean_rate_id, valid, action_at, valid_time) values (?, ?, ?, ?, ?)'
            , [2, 5, true, \Carbon\Carbon::now(), \Carbon\Carbon::now()]);


    }
}
