<?php

namespace App\Console\Commands;

use App\ATC;
use App\ControllerLog;
use App\ControllerLogUpdate;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class OnlineControllerUpdate extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'OnlineControllers:GetControllers';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Retrieves all the online controllers and records them in the database.';

	protected $statusUrl = "http://status.vatsim.net/status.txt";

	protected $facilities = [
		'ZAU', 'ORD', 'CHI', 'SBN', 'RFD', 'PIA', 'MSN', 'MKG', 'MLI', 'MKE', 'GRR', 'FWA', 'CMI', 'CID', 'AZO', 'ALO', 'EKM', 'MDW', 'LAF', 'BTL', 'OSH'
	];

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
		$data = file_get_contents("https://api.vzau.cloud/v1/live/controllers/ZAU");
		$json = json_decode($data, true);

		foreach ($json as $controller) {
			$time_logon = strtotime($controller['logon_time']);
			$time_now = strtotime(Carbon::now());
			$duration = $time_now - $time_logon;

			$MostRecentLog = ControllerLog::where('cid', $controller['cid'])->orderBy('time_logon', 'DESC')->first();

			if (!$MostRecentLog || $MostRecentLog->time_logon != $time_logon) {
				ControllerLog::create([
					'cid' => $controller['cid'],
					'name' => $controller['name'],
					'position' => $controller['callsign'],
					'duration' => $duration,
					'date' => date('n/j/y'),
					'time_logon' => $time_logon,
					'streamupdate' => $time_now,
				]);
			} else {
				$MostRecentLog->duration = $duration;
				$MostRecentLog->streamupdate = $time_now;
				$MostRecentLog->save();
			}
		}
	}
}
