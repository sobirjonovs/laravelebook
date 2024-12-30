<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuyruqCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buyruq {qiymat?*} {--qiymatcha=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shunchaki buyruq chiqaradi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dd($this->argument('qiymat'), $this->option('qiymatcha'));
    }
}
