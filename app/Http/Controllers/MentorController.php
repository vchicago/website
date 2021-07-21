<?php
namespace App\Http\Controllers;

use App\MentorAvail;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class MentorController extends Controller {
    public function showAvail()
	{
		$availability = MentorAvail::where('mentor_id', '=', Auth::id())->get();
		return View('dashboard.training.mentors.mentoravail')->with('availability', $availability);
    }
	
	public function cancelSession(Request $request, $id)
	{
		$request = MentorAvail::find($id);
		$request->isAbleTocel_message = $request->get('cancel');
		$request->save();
		$request->sendCancellationEmail();
		$request->delete();

	

		return Redirect::to('dashboard.training.mentors.sessions')->with('message', 'Session canceled. Student has been notified!');
	}
	
    public function postAvail(Request $request)
	{
		$mentor_id = Auth::id();
		$slots = $request->get('slots');
		$today = new Carbon("midnight today", 'America/New_York');

		$availability = MentorAvail::where('mentor_id', '=', $mentor_id)->where('slot', '>=', $today)->get();

		if (!$slots) $slots = [];

		// Slots to be added

		$new_slots = array_diff($slots, $availability->Pluck('slot')->toArray());
		// Slots to be deleted
		$old_slots = array_diff($availability->Pluck('slot')->toArray(), $slots);

		foreach ($new_slots as $slot) {
			MentorAvail::create([
				'mentor_id' => $mentor_id,
				'slot' => $slot,
			]);
		}

		MentorAvail::where('mentor_id', '=', $mentor_id)->whereIn('slot', $old_slots)->delete();
		return Redirect::action('MentorController@showAvail')->with('success', 'Availability has been updated');
	
    }
   
    public function showRequests()
	{
		$sessions = MentorAvail::where('trainee_id', '!=', 0)->where('slot', '>', new Carbon('midnight today', 'America/New_York'))->orderBy('slot', 'ASC')->get();
		return View('dashboard.training.mentors.sessions')->with('sessions', $sessions);
	}
}