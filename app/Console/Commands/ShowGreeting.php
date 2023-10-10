<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//To make Command You Should Use php artisan make:command
class ShowGreeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Esi {name?} {--first=Hey}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Esi Boy Greeting';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info($this->option('first').", ".$this->argument('name'));
    }
}
