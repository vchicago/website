<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light">
        @if(Carbon\Carbon::now()->month == 12)
            <a class="navbar-brand" href="/dashboard"><img width="100" src="/photos/xmas_logo.png"></a>
        @else
            <a class="navbar-brand" href="/dashboard"><img width="100" src="/photos/logo.png"></a>
        @endif
            <ul class="navbar-nav">
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Controllers
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/dashboard/controllers/roster">Roster</a>
		<a class="dropdown-item" href="/dashboard/controllers/staff">Staff
        <a class="dropdown-item" href="/dashboard/controllers/events">Events</a>
		<a class="dropdown-item" href="/dashboard/controllers/files">Files</a>
		<a class="dropdown-item" href="/dashboard/controllers/stats">Statistics</a>
		<a class="dropdown-item" href="/dashboard/controllers/discord">Discord</a>
		<a class="dropdown-item" href="/dashboard/controllers/incident/report">Incident Report</a>
      </div>
	  
    </li>
	 @if(Auth::user()->isAbleToTrain == 1 || Auth::user()->isAbleTo('train'))
		 <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Training </a>
			<div class="dropdown-menu">
        <script id="setmore_script" type="text/javascript" src="https://my.setmore.com/webapp/js/src/others/setmore_iframe.js"></script><a id="Setmore_button_iframe"  class="dropdown-item" href="https://my.setmore.com/bookingpage/{{ \Config::get('facility.setmore') }}">Schedule Training</a>
        <a class="dropdown-item" href="/dashboard/training/atcast">ATCast Videos</a>
		@if(Auth::user()->isAbleTo('train'))
		<a class="dropdown-item" href="/dashboard/training/info">Training Information</a>
		<a class="dropdown-item" href="/dashboard/training/tickets">Training Tickets</a>
		<a class="dropdown-item" href="https://my.setmore.com/" target="_blank">Schedule Management</a>
		                    @if(Auth::user()->hasRole('ins') || Auth::user()->isAbleTo('snrStaff'))
                        <a class="dropdown-item" href="/dashboard/training/ots-center">OTS Center</a>
                    @endif
                @endif
      </div>
	  @endif
		</li>	
		@if(Auth::user()->isAbleTo('staff') || Auth::user()->isAbleTo('email') || Auth::user()->isAbleTo('scenery') || Auth::user()->isAbleTo('files') || Auth::user()->isAbleTo('events'))
			<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Admin
      </a>
      <div class="dropdown-menu">
	@if(Auth::user()->isAbleTo('staff'))
        <a class="dropdown-item" href="/dashboard/admin/calendar">Calendar/News</a>
        <a class="dropdown-item" href="/dashboard/admin/airports">Airport Management</a>
	@endif
	@if(Auth::user()->isAbleTo('scenery'))	
		<a class="dropdown-item" href="/dashboard/admin/scenery">Scenery Management</a>
	@endif
    @if(Auth::user()->isAbleTo('snrStaff'))
		<a class="dropdown-item" href="/dashboard/admin/feedback">Feedback Management</a>
		<a class="dropdown-item" href="/dashboard/admin/incident">Incident Reports Management</a>
	@endif
    @if(Auth::user()->isAbleTo('email'))
		<a class="dropdown-item" href="/dashboard/admin/email/send">Send New Email</a>
	@endif
    @if(Auth::user()->isAbleTo('snrStaff'))
        <a class="dropdown-item" href="/dashboard/admin/audits">Website Activity</a>
    @endif
      </div>
	  @endif
	  
    </li>
		</ul>
            <ul class="navbar-nav ml-auto">
			<a class="nav-link {{ Nav::isRoute('controller_dash_home') }}" href="/dashboard">Dashboard Home</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dashboard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->full_name }} - {{ Auth::user()->rating_short }}</a>
                        <div class="dropdown-menu" aria-labelledby="dashboard">
                            <a class="dropdown-item" href="/dashboard/controllers/profile"><i class="fas fa-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </li>
            </ul>
			
    </nav>
</div>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 26px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: gray;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: lightgreen;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(20px);
  -ms-transform: translateX(20px);
  transform: translateX(20px);
}


/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
