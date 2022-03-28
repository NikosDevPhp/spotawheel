<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::where(['name' => 'Taylor'])->first();
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 500,
            'created_at' => '2020-01-01 17:25:52',
            'updated_at' => '2020-03-01 17:25:52'
        ]);
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 1000,
            'created_at' => '2020-01-02 17:25:52',
            'updated_at' => '2020-03-02 17:25:52'
        ]);


        $client = Client::where(['name' => 'Mohamed'])->first();
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 1500,
            'created_at' => '2020-02-01 17:25:52',
            'updated_at' => '2020-03-01 17:25:52'
        ]);
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 2000,
            'created_at' => '2020-02-02 17:25:52',
            'updated_at' => '2020-03-02 17:25:52'
        ]);


        $client = Client::where(['name' => 'Jeffrey'])->first();
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 2500,
            'created_at' => '2020-03-01 17:25:52',
            'updated_at' => '2020-03-01 17:25:52'
        ]);
        Payment::updateOrCreate([
            'user_id'    => $client->id,
            'amount'     => 3000,
            'created_at' => '2020-03-02 17:25:52',
            'updated_at' => '2020-03-02 17:25:52'
        ]);
    }
}
