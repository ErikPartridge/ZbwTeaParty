<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Pokerer;

class DataUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vatsim:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the VATSIM data feed';

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
     * @return mixed
     */
    public function handle()
    {
        Pokerer::fetchData();
    }
}
