<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientLatestPaymentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'clients' => $this->collection->map(function ($resource) {
                    return [
                        'id'      => $resource->id,
                        'name'    => $resource->name,
                        'surname' => $resource->surname,
                        'amount'  => !is_null($resource->latestPayment) ? $resource->latestPayment->amount : null,
                        'date'    => !is_null($resource->latestPayment) ? $resource->latestPayment->updated_at->format('Y-m-d H:i:s') : null,
                    ];
                })
            ]
        ];
    }
}
