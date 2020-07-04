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
                'address' => '#21, St. 2004, Songkat ABC, Khan Por Sen Chey, Phnom Penh, Cambodia.',
                'map' => 'map',
                'acc_name' => '',
                'acc_number' => '',
                'contact1' => '',
                'contact2' => '',
                'gmail' => '',
                'qr_aba' => '',
                'qr_wing' => '',
        
            ],[
             
                'type_of_payment'=> 'ABA',
                'address' => '',
                'map' => '',
                'acc_name' => 'JOBNOW COMPANY',
                'acc_number' => '000 211 222',
                'contact1' => '',
                'contact2' => '',
                'gmail' => '',
                'qr_aba' => '',
                'qr_wing' => '',
        
            ],[
                        
                'type_of_payment'=> 'Wing',
                'address' => '',
                'map' => '',
                'acc_name' => 'JOBNOW COMPANY',
                'acc_number' => '000 211 222',
                'contact1' => '',
                'contact2' => '',
                'gmail' => '',
                'qr_aba' => '',
                'qr_wing' => '',        
            ],[                        
                'type_of_payment'=> 'Contact',
                'address' => '',
                'map' => '',
                'acc_name' => '',
                'acc_number' => '',
                'contact1' => '012 222 222',
                'contact2' => '012 222 222',
                'gmail' => 'ex@gmail.com',
                'qr_aba' => '',
                'qr_wing' => '',        
            ]
        ]);
    }
}
