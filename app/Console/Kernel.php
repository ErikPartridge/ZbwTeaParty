<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\DataUpdate',
		'App\Console\Commands\PrefileCommand'
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('vatsim:update')
				 ->cron('*/2 * * * *');
		//$schedule->exec('find /var/www/storage/app/data/ -type f -mtime + -delete')->hourly();
		$schedule->command('prefile:send')->everyFiveMinutes();
	}

}
