<?php

namespace App\Console\Commands;

use App\CustomerTransaction;
use Illuminate\Console\Command;

class CustomerTransactionIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers-transactions:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stampa di tutte le Transazioni presenti nel Database';

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
        $this->line("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutte le Transazioni ++++++++++++++++++++++++++++++++++++++++");
        $this->line(CustomerTransaction::all());
        $this->line("+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

        return 0;
    }
}
