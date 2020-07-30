<?php

namespace App\Console\Commands;

use App\Console\CommandsClass\GetTransaction;
use App\CustomerTransaction;
use Illuminate\Console\Command;

class CustomerTransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers-transactions:get  {--transaction=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stampa di tutte le Transazioni presenti nel Database o di una Transazione speficia tramite --transaction={id}';

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
        $transactionId = $this->option('transaction') ?? null;

        $this->line(GetTransaction::main($transactionId));

        return 0;
    }
}
