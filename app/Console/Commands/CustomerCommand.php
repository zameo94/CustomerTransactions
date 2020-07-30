<?php

namespace App\Console\Commands;

use App\Console\CommandsClass\GetCustomer;
use App\Console\CommandsClass\GetTransaction;
use App\Customer;
use Illuminate\Console\Command;

class CustomerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers:get {--customer=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stampa di tutti i Customers presenti nel Database';

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
        $customerId = $this->option('customer')  ?? null;

        $this->line(GetCustomer::main($customerId));

        return 0;
    }
}
