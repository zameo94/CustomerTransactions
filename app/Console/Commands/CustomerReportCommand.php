<?php

namespace App\Console\Commands;

use App\Console\CommandsClass\CurrencyConverter;
use Illuminate\Console\Command;

class CustomerReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:report {customer-id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stampa di tutte le Transazioni appartenenti ad un Customers indicato come primo argomento';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $customerId = $this->argument('customer-id') ?? null;

        $this->line(CurrencyConverter::main($customerId));

        return 0;
    }
}
