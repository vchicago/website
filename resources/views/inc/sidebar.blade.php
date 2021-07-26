    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3">vZAU ARTCC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Controller Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Controller Pages
      </div>
      <!-- Nav Item - Reference Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Quicklinks</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Home/Visitor Controllers</h6>
            <a class="collapse-item" href="/dashboard/controllers/roster">Roster</a>
            <a class="collapse-item" href="/dashboard/controllers/staff">Staff</a>
			<a class="collapse-item" href="/dashboard/controllers/stats">Statistics</a>
			<a class="collapse-item" href="/dashboard/controllers/events">Events</a>
			<a class="collapse-item" href="/dashboard/controllers/discord">Discord</a>
			<a class="collapse-item" href="/dashboard/controllers/files">Files</a>
			<a class="collapse-item" href="/dashboard/controllers/incident/report">Incident Report</a>
			<a class="collapse-item" href="#" data-toggle="modal" data-target="#reportBug">Report a Bug</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Training Collapse Menu -->
	  @if(Auth::user()->isAbleToTrain == 1 || Auth::user()->isAbleTo('train'))
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Training</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Student Links:</h6>
            <script id="setmore_script" type="text/javascript" src="https://my.setmore.com/webapp/js/src/others/setmore_iframe.js"></script><a id="Setmore_button_iframe"  class="collapse-item" href="https://my.setmore.com/bookingpage/{{ \Config::get('facility.setmore') }}">Schedule Training</a>
            <a class="collapse-item" href="/dashboard/training/atcast">ATCast Videos</a>
			<a class="collapse-item" href="/dashboard/training/info">Training Information</a>
            @if(Auth::user()->isAbleTo('train'))
			<div class="collapse-divider"></div>
			<h6 class="collapse-header">Mentors/Instructors:</h6>
            <a class="collapse-item" href="/dashboard/training/tickets">Training Tickets</a>
			<a class="collapse-item" href="https://my.setmore.com/" target="_blank">Schedule Management</a>
				@if(Auth::user()->hasRole('ins') || Auth::user()->isAbleTo('snrStaff'))
					<a class="collapse-item" href="/dashboard/training/ots-center">OTS Center</a>
				@endif
            @endif
		  </div>
        </div>
      </li>
	  @endif
	  @if(Auth::user()->isAbleTo('staff') || Auth::user()->isAbleTo('email') || Auth::user()->isAbleTo('scenery') || Auth::user()->isAbleTo('files') || Auth::user()->isAbleTo('events'))

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Admin Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Admin</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
      <a href="https://mail.chicagoartcc.org">WebMail</a>
			@if(Auth::user()->isAbleTo('snrStaff'))
			<a class="collapse-item" href="/dashboard/admin/announcement">Announcements</a>
			<a class="collapse-item" href="/dashboard/admin/calendar">News</a>
			<a class="collapse-item" href="/dashboard/admin/feedback">Feedback</a>
            <a class="collapse-item" href="/dashboard/admin/incident">Incident Reports</a>
			@endif
			@if(Auth::user()->isAbleTo('roster'))
			<a class="collapse-item" href="/dashboard/admin/bronze-mic">Bronze Mic</a>
			<a class="collapse-item" href="/dashboard/admin/pyrite-mic">Pyrite Mic</a>
			@endif
          </div>
        </div>
      </li>
	  @endif
      <!-- Nav Item - Charts -->
	@if(Auth::user()->isAbleTo('email'))
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/admin/email/send">
          <i class="fas fa-share-square"></i>
          <span>Send Auto Email</span></a>
      </li>
	@endif
	@if(Auth::user()->isAbleTo('snrStaff'))
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="http://mail.chicagoartcc.org">
          <i class="fas fa-mail-bulk"></i>
          <span>Staff Email</span></a>
      </li>
	 @endif
	@if(Auth::user()->isAbleTo('snrStaff'))
	      <li class="nav-item">
        <a class="nav-link" href="/dashboard/admin/audits">
          <i class="fas fa-file-alt"></i>
          <span>Admin Log</span></a>
      </li> 
	@endif
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
	    <div class="modal fade" id="reportBug" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report a Bug</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action' => 'ControllerDash@reportBug']) !!}
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::label('url', 'Intended URL') !!}
                                {!! Form::text('url', null, ['placeholder' => 'Paste the Intended URL Here', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-6">
                                {!! Form::label('error', 'Error Received (If Applicable)') !!}
                                {!! Form::text('error', null, ['placeholder' => 'Paste Error Here, If Applicable', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('desc', 'Brief Description of Bug') !!}
                        {!! Form::textArea('desc', null, ['placeholder' => 'Please be brief but specific with details regarding the bug.', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button action="submit" class="btn btn-success">Send</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- End of Sidebar -->