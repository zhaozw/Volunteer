<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(UnitTableSeeder::class);
//        $this->call(ActivityTableSeeder::class);
//        $this->call(DoctorOfficeTableSeeder::class);
//        $this->call(DoctorTitleTableSeeder::class);
//        $this->call(ActivityBeanRateTableSeeder::class);
        $this->call(VolunteerBeanTableSeeder::class);

        Model::reguard();
    }
}
