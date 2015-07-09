<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Pilot as Pilot;
use App\Flight as Flight;
use \Log;
use Carbon\Carbon as Carbon;
use Mail;

class PrefileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prefile:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends the its time email';

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
        $now = Carbon::now('UTC');
        if($now->month === 8 && $now->day === 8 && $now->year === 2015){
            $flights = Flight::all();
            foreach($flights as $flight){
                if($flight->booked){
                    $departure = Carbon::parse($flight->departure, 'UTC');
                    if($departure->lte($now)){
                        Mail::raw($departure.' '.$flight->callsign, function ($message) {
                            $message->to('erikdevelopments@gmail.com');
                        });
                    }
                }
            }
        }else{
            return 'Not yet Tea Party.';
        }
    }
}
