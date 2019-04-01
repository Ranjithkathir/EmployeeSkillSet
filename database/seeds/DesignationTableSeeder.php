<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('designations')->insert([
            'DesignationName' => 'SOFTWARE ENGINEER TRAINEE',
            'DesignationName' => 'SOFTWARE ENGINEER',
            'DesignationName' => 'SENIOR SOFTWARE ENGINEER',
            'DesignationName' => 'TEAM LEAD',
            'DesignationName' => 'ASSOCIATE PROJECT MANAGER',
            'DesignationName' => 'PROJECT MANAGER',
            'DesignationName' => 'HR',
            'DesignationName' => 'HR MANAGER',
            'DesignationName' => 'MARKETING EXECUTIVE',
            'DesignationName' => 'MARKETING HEAD',
        ]);
    }
}
