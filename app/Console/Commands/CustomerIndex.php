<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomerIndex extends Command
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
    protected $description = 'Output di tutti i customer presenti nel Database';

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
        return route('customers.index');
    }
}
