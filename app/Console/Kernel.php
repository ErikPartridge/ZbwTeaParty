<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
		$schedule->exec('find /var/www/storage/app/data/ -type f -mtime +3 -delete')->hourly();
		$schedule->exec('php composer.phar update')->daily();
		$schedule->command('prefile:send')->everyFiveMinutes();
	}

}
