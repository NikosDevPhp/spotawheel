<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::updateOrCreate([
            'name'       => 'Taylor',
            'surname'    => 'Otwell',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01'
        ]);
//        DB::table('clients')->insert([
//            'name' => 'Taylor',
//            'surname' => 'Otwell',
//        ]);

        Client::updateOrCreate([
            'name'       => 'Mohamed',
            'surname'    => 'Said',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01'
        ]);
        Client::updateOrCreate([
            'name'       => 'Jeffrey',
            'surname'    => 'Way',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01'
        ]);
        Client::updateOrCreate([
            'name'       => 'Phill',
            'surname'    => 'Sparks',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01'
        ]);
//        DB::table('clients')->insert([
//            'name' => 'Mohamed',
//            'surname' => 'Said',
//        ]);
//
//        DB::table('clients')->insert([
//            'name' => 'Jeffrey',
//            'surname' => 'Way',
//        ]);
//
//        DB::table('clients')->insert([
//            'name' => 'Phill',
//            'surname' => 'Sparks',
//        ]);
    }
}
