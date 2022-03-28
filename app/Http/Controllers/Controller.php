<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetLatestByFiltersRequest;
use App\Models\Client;
use App\Services\GetLatestPaymentByFiltersService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const EXCEPTION_TYPE = 'Spotawheel_Controller';

    public function __construct(private GetLatestPaymentByFiltersService $getLatestPaymentByFiltersService){}

    public function index()
    {
        try {
            $clients = Client::with('latestPayment')->get();
            return view('welcome', ['clients' => $clients]);
        } catch (\Exception $e) {
            abort(404);
        }

    }

    /**
     * @throws \Exception
     */
    public function getLatestByFilters(GetLatestByFiltersRequest $request)
    {
        try {
            $clients = $this->getLatestPaymentByFiltersService->get($request->startDate, $request->endDate);
            return response()->json($clients);
        } catch (\Exception $e) {
            Log::error($e, self::EXCEPTION_TYPE);
            throw $e;
        }
    }
}
