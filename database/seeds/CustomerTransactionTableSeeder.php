<?php

use Illuminate\Database\Seeder;

class CustomerTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CustomerTransaction::class, 5)->create();
    }
}
