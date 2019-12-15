<nav class="navbar navbar-expand-lg navbar-light bg-light py-1">
		<div class="container">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item my-1">
                    <a class="btn btn-primary" role="button" href="/">Home</a>
                </li>
					<li class="nav-item">
                    <div class="dropdown ml-2 my-1">
					<span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="Coming Soon!">
					<button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Pilot Resources</button>
					</span>
                    </div>
					</li>
                <li class="nav-item ml-2 my-1">
                    <div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Controllers
                    </button>
					<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/controllers/roster">Roster</a>
                        <a class="dropdown-item" href="/controllers/staff">Staff</a>
                        <a class="dropdown-item" href="/controllers/files">Files</a>
                        <a class="dropdown-item" href="/controllers/stats">Controller Stats</a>
						@if(Auth::guest())
						<a class="dropdown-item" href="/visit">Visit ZAU</a>
						@endif
                    </div>
					</div>
               </li>
                @if(Auth::guest())
					<li class="nav-item ml-2 my-1">
						<a class="btn btn-primary" role="button" href="/feedback/new">Feedback</a>
					</li>
					<li class="nav-item ml-2 my-1">
						<a class="btn btn-primary" role="button" href="/pilots/request-staffing">Request Staffing</a>
					</li>
                @endif
				</ul>
				<ul class="navbar-nav ml-auto">
                @if(Auth::check())
					<li class="nav-item ml-2 my-1">
                    <div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->full_name }} - {{ Auth::user()->rating_short }}
                    </button>
                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/dashboard/controllers/profile"><i class="fas fa-user"></i> My Profile</a>
                            <a class="dropdown-item" href="/dashboard"><i class="fas fa-tachometer-alt"></i> Controller Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
					</li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-primary" href="/login" role="button">Controller Login</a>
                    </li>
                @endif
            </ul>
        </div>
		</div>
    </nav>
