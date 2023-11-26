<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoFillStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:auto-fill-stock-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

  

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dd('ha ha jpy boy');
    }
}
