<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([

            [                        
                'type_of_payment'=> 'Cash',
                'address' => 'ex',
                'map' => 'map',
                'acc_name' => '',
                'acc_number' => '',
                'contact' => '012345679',
                'transaction' => ''
        
            ],[
             
                'type_of_payment'=> 'ABA',
                'address' => '',
                'map' => '',
                'acc_name' => 'acc name',
                'acc_number' => 'acc number',
                'contact' => '012345679',
                'transaction' => ''

        
            ],[
                        
                'type_of_payment'=> 'Wing',
                'address' => '',
                'map' => '',
                'acc_name' => 'acc name',
                'acc_number' => 'acc number',
                'contact' => '012345679',
                'transaction' => ''
        
            ]
        ]);
    }
}
