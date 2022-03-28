<?php

namespace App\Console\Commands;

use App\Services\GetLatestPaymentByFiltersService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExportLatestPaymentCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:latestPayment {startDate?} {endDate?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports the latest payment of each client in csv';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();

        // pass custom dates if any
        try {
            if (!empty($this->argument('startDate'))) {
                $startDate = Carbon::createFromFormat('Y-m-d H:i:s', (string)$this->argument('startDate'));
            }

            if (!empty($this->argument('endDate'))) {
                $endDate = Carbon::createFromFormat('Y-m-d H:i:s', (string)$this->argument('endDate'));
            }
        } catch (\Exception $e) {
            $this->info('Invalid date string passed. Ensure Y-m-d H:i:s format enclosed in double quotes');
            exit;
        }


        // store path and filename
        $path = storage_path('app/public/');
        $fileName = 'ClientsLatestPayment_' . $startDate . '_' . $endDate .'.csv';

        $file = fopen($path.$fileName, 'w');

        // write the columns
        $columns = array('Id', 'Name', 'Surname', 'Amount', 'Updated At');
        fputcsv($file, $columns);

        // get client data
        $clients = app()->make(GetLatestPaymentByFiltersService::class)->get($startDate, $endDate);
        $data = json_decode(response($clients)->getContent(), true);

        foreach ($data['data']['clients'] as $client) {
            $csv = [
                'Id' => $client['id'],
                'Name' => $client['name'],
                'Surname' => $client['surname'],
                'Amount' => $client['amount'] ?? '',
                'Updated At' => $client['date'] ?? ''
            ];
            fputcsv($file, $csv);
        }

        $this->info('CSV: ' . $fileName .  ' created in ' . $path);
        return true;
    }
}
