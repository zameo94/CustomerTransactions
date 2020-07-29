<?php

namespace App\Console\Commands;

use App\Customer;
use Illuminate\Console\Command;

class CustomerIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers:get';

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
        $this->line("++++++++++++++++++++++++++++++++++++++++++++++++ Stampa Di Tutti i Customers ++++++++++++++++++++++++++++++++++++++++");
        $this->line(Customer::all());
        $this->line("++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++");

        return 0;
    }
}
