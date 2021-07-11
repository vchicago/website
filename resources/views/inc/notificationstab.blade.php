@if(
    Auth::user()->hasRole('ins') && App\Ots::where('status', 0)->get()->count() > 0 || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0 ||
    App\Ots::where('status', 1)->where('ins_id', Auth::id())->get()->count() > 0 ||
    App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null ||
    count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->isAbleTo('snrStaff')
    )
    @if(Auth::user()->hasRole('ins') && App\Ots::where('status', 0)->get()->count() > 0 || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0)
	<span class="badge badge-danger badge-counter">!</span>
    @endif

    @if(App\Ots::where('status', 1)->where('ins_id', Auth::id())->get()->count() > 0)
	<span class="badge badge-danger badge-counter">!</span>
    @endif

    @if(App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null)
	<span class="badge badge-danger badge-counter">!</span>
    @endif

    @if(count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->isAbleTo('snrStaff'))
	<span class="badge badge-danger badge-counter">!</span>
    @endif
@endif
