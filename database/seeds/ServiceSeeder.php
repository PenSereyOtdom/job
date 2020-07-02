<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([

            [                        
                'title'=> 'Trial Plan',
                'type'=> 'Normal',
                'price' => '10$',
                'number_of_post' => '3',
                'valid_days' => '15'
            ],[
                'type'=> 'Normal',
                'title'=> 'Basic Plan',
                'price' => '20$',
                'number_of_post' => '6',
                'valid_days' => '30'
            ],[
                'type'=> 'Urgent',
                'title'=> 'Urgent Plan',
                'price' => '30$',
                'number_of_post' => '9',
                'valid_days' => '30'
            ],[
                
                'type'=> 'Normal',
                'title'=> 'Premium Plan',
                'price' => '60$',
                'number_of_post' => '3',
                'valid_days' => '40'
            ]
        ]);
    }
}
