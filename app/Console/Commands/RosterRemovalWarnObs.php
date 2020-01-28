<?php

namespace App\Console\Commands;

use App\ControllerLog;
use App\User;
use App\TrainingTicket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RosterRemovalWarn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RosterRemoval:Warning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warns controllers 30 days prior to being removed from the roster due to training inactivity.';

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
        $last_month = Carbon::now()->subMonth();
        $year = $last_month->year;
        $month = $last_month->month;
        $stats = ControllerLog::aggregateAllControllersByPosAndMonth($year, $month);
        $obs = User::where('rating_id', 1)->where('canTrain', 1)->where('status', 1)->where('visitor', 0)->get();

        foreach($obs as $s) {
            $tickets_sort = TrainingTicket::where('controller_id', $s->id)->get()->sortByDesc(function($t) {
                return strtotime($t->date.' '.$t->start_time);
            })->pluck('id');
            if($tickets_sort->count() != 0) {
                $tickets_order = implode(',',array_fill(0, count($tickets_sort), '?'));
                $last_training = TrainingTicket::whereIn('id', $tickets_sort)->orderByRaw("field(id,{$tickets_order})", $tickets_sort)->first();
            } else {
                $last_training = null;
            }
            if($last_training == null || strtotime($t->date.' '.$t->start_time) < strtotime($last_month)) {
                Mail::send('emails.inactive.obs', ['s' => $s], function($message) use ($s){
                    $message->from('auto@chicagoartcc.email', 'vZAU Activity Department')->subject('You have not met the activity requirement in the last 30 days');
                    $message->to($s->email);
                });
            }
        }
    }
}
