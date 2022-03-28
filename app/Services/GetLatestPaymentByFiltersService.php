<?php

namespace App\Services;

use App\Http\Resources\ClientLatestPaymentCollection;
use App\Models\Client;

class GetLatestPaymentByFiltersService
{
    public function get($startDate, $endDate): ClientLatestPaymentCollection
    {
        $clients = Client::with(['latestPayment' => function($q) use ($startDate, $endDate) {
            $q->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'DESC');
        }])->get();

        return (new ClientLatestPaymentCollection($clients));
    }
}
