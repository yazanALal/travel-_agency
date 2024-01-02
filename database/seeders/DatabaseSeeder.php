<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $customers = [
        //     [
        //         'name' => 'John Doe',
        //         'email' => '2h6n@example.com',
        //         'phone' => '123213124',
        //         'gender' => 'male',
        //     ],
        //     [
        //         'name' => 'Jane Smith',
        //         'email' => 'n1e@example.com',
        //         'phone' => '1323124',
        //         'gender' => 'male',
        //     ],
        //     // Add more customers as needed
        // ];

        // $cities = [
        //     [
        //         'name' => 'Jo33hn Doe',
        //         'country' => 'syria',
               
        //     ],
        //     [
        //         'name' => 'J2ane5 Smith',
        //         'country' => 'syria',
                
        //     ],
        // ];

        // $companies = [
        //     [
        //         'name' => 'J1oh6n Doe',
        //         'phone' => '4113123',

        //     ],
        //     [
        //         'name' => 'Jane Smi7th',
        //         'phone' => '13221724113123',

        //     ],
        // ];

        // $hotels = [
        //     [
        //         'name' => 'c',
        //         'city_id' => '1',
        //         'phone' => '13267131223',
        //     ],
        //     [
        //         'name' => 'J',
        //         'city_id' => '2',
        //         'phone' => '132214542532123',
        //     ],
        // ];

        // $tickets = [
        //     [
        //         'city_id' => '1',
        //         'company_id' => '1',
        //         'date_s' => date('Y-m-d'),
        //         'date_e' => date('Y-m-d'),
        //     ],
        //     [
        //         'city_id' => '2',
        //         'company_id' => '2',
        //         'date_e' => date('Y-m-d'),
        //         'date_s' => date('Y-m-d'),
        //     ],
        // ];

        $bookings = [
            [
                'customer_id' => '1',
                'ticket_id' => '1',
                'hotel_id' => '1',
                'date'=>date('Y-m-d'),
            ],
            [

                'customer_id' => '8',
                'ticket_id' => '2',
                'hotel_id' => '2',
                'date' => date('Y-m-d'),
            ],
        ];



        // DB::table('customers')->insert($customers);
        // DB::table('cities')->insert($cities);
        // DB::table('companies')->insert($companies);
        // DB::table('hotels')->insert($hotels);
        // DB::table('tickets')->insert($tickets);
        DB::table('bookings')->insert($bookings);

    }
}
