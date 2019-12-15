@if(
    Auth::user()->hasRole('ins') && App\Ots::where('status', 0)->get()->count() > 0 || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0 ||
    App\Ots::where('status', 1)->where('ins_id', Auth::id())->get()->count() > 0 ||
    App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null ||
    count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->can('snrStaff')
    )
		@if(Auth::user()->hasRole('ins') && App\Ots::where('status', 0)->get()->count() > 0 || Auth::user()->hasRole('atm') && App\Ots::where('status', 0)->get()->count() > 0)
		                <a class="dropdown-item d-flex align-items-center" href="/dashboard/training/ots-center">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="	fas fa-school text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">There is a new OTS recommendation that is waiting to be accepted. View the OTS Center to view more information.</span>
                  </div>
                </a>
		@endif

		@if(App\Ots::where('status', 1)->where('ins_id', Auth::id())->get()->count() > 0)
				                <a class="dropdown-item d-flex align-items-center" href="/dashboard/training/ots-center">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-school text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">You have either been assigned to an OTS or you have accepted an OTS that is waiting to take place. View the OTS Center to view more information.</span>
                  </div>
                </a>
		@endif

		@if(App\TrainingTicket::where('created_at', '>=', Carbon\Carbon::now()->subHours(24))->where('controller_id', Auth::id())->first() != null)
					                <a class="dropdown-item d-flex align-items-center" href="/dashboard/controllers/profile">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-exclamation text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">You have a new training ticket. Visit your profile to view more information.</span>
                  </div>
                </a>
				<a class="dropdown-item text-center small text-gray-500" href="#">Training ticket notifications expire within 24 hours.</a>
		@endif

		@if(count(App\Incident::where('status', 0)->get()) > 0 && Auth::user()->can('snrStaff'))
							                <a class="dropdown-item d-flex align-items-center" href="/dashboard/admin/incident">
                  <div class="mr-3">
                    <div class="icon-circle bg-danger">
                      <i class="fas fa-exclamation text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">There is a new incident report. Visit incident reports to view more information.</span>
                  </div>
                </a>
		@endif
	@else
				<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <span class="font-weight-bold">You have no notifications!</span>
                  </div>
                </a>
	
	@endif
