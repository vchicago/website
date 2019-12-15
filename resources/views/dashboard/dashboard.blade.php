@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Controller Dashboard</h1>
    </div>
	@if($announcement->body != null)
<div class="container">
				<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
						{!! $announcement->body !!}
                      <div class="text-xs text-primary mb-1">Last updated by {{ $announcement->staff_name }} on {{ $announcement->update_time }}</div>
                    </div>
                  </div>
                </div>
              </div>
			  @endif

<div class="container">
<hr>
    <center><h5 class="text-primary"><i class="fa fa-broadcast-tower rotate-n-15"></i> Online Controllers</h5></center>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-light">
                <th scope="col"><center>Position</center></th>
                <th scope="col"><center>Frequency</center></th>
                <th scope="col"><center>Controller</center></th>
                <th scope="col"><center>Rating</center></th>
                <th scope="col"><center>Logon Time</center></th>
                <th scope="col"><center>Time Online</center></th>
            </thead>
            <tbody>
                @if($controllers->count() > 0)
                    @foreach($controllers as $c)
                        <tr>
                            <td class="table-light"><center>{{ $c->position }}</center></td>
                            <td class="table-light"><center>{{ $c->freq }}</center></td>
                            <td class="table-light"><center>{{ $c->name }}</center></td>
                            @if(App\User::find($c->cid) != null)
                                <td class="table-light"><center>{{ App\User::find($c->cid)->rating_long }}</center></td>
                            @else
                                <td class="table-light"><center><i>Rating Not Available</i></center></td>
                            @endif
                            <td class="table-light"><center>{{ $c->logon_time }}</center></td>
                            <td class="table-light"><center>{{ $c->time_online }}</center></td>
                        </tr>
                    @endforeach
                @else
                    <tr class="table-light">
                        <td colspan="6"><center><i>No Controllers Online</i></center></td>
                    </tr class="table-light">
                @endif
                <tr>
                    <td colspan="6" class="table-light"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $controllers_update }}Z</div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
		              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold text-primary"><i class="fas fa-newspaper"></i> News</h5>
                </div>
                <div class="card-body">
            @if(count($calendar) > 0)
                @foreach($calendar as $c)
                    <p>{{ $c->date }} - <b>{{ $c->title }}</b> <a href="/dashboard/controllers/calendar/view/{{ $c->id }}">(View)</a></p>
                @endforeach
            @else
                <center><i><p>No news to show.</p></i></center>
            @endif
			</div>
              </div>
			 </div>
        <div class="col-md-6">
				 <div class="card mb-4">
                <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><a href="/dashboard/controllers/events" style="color:inherit;text-decoration:none"><i class="fas fa-plane rotate-n-15"></i> Events</a></h5>
            </div>
			<div class="card-body px-2">
			@if($events->count() > 0)
                @foreach($events as $e)
                    <a href="/dashboard/controllers/events/view/{{ $e->id }}"><img src="{{ $e->banner_path }}" width="100%" alt="{{ $e->name }}"></a>
                @endforeach
            @else
                <center><i><p>No events to show.</p></i></center>
            @endif
        </div>
    </div>
	</div>
	</div>
    <hr>
    <center><h5 class="text-primary">Flights Currently Within ZAU Airspace</h5></center>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="thead-light">
                <th scope="col"><center>Callsign</center></th>
                <th scope="col"><center>Pilot Name</center></th>
                <th scope="col"><center>Aircraft Type</center></th>
                <th scope="col"><center>Departure</center></th>
                <th scope="col"><center>Arrival</center></th>
                <th scope="col"><center>Route</center></th>
            </thead>
            <tbody>
                @if($flights->count() > 0)
                    @foreach($flights as $c)
                        <tr>
                            <td class="table-light"><center>{{ $c->callsign }}</center></td>
                            <td class="table-light"><center>{{ $c->pilot_name }}</center></td>
                            <td class="table-light"><center>{{ $c->type }}</center></td>
                            <td class="table-light"><center>{{ $c->dep }}</center></td>
                            <td class="table-light"><center>{{ $c->arr }}</center></td>
                            <td class="table-light"><center>{{ str_limit($c->route, 60) }}</center></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="table-light"><center><i>No Pilots in {{ Config::get('facility.name_short') }} Airspace</i></center></td>
                    </tr>
                @endif
                <tr>
                    <td colspan="6" class="table-light"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $flights_update }}Z</div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <center><h2><i class="fa fa-microphone" style="color:#C9AE5D"></i> Bronze Mic Award <i class="fa fa-microphone" style="color:#C9AE5D"></i></h2></center>
	<div class="row">
		<div class="col-sm-6">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
					<br>
        			<center><h4>Winner for {{ $pmonth_words }}</h4></center>
        			<div class="card card-body" style="border-color:#C9AE5D">
        				@if($pwinner != null)
        					<center><h4><b>{{ $pwinner->name }}</b></h4></center>
        					<center><h5>With {{ $pwinner->month_hours }} hours!</h5></center>
        				@else
        					<center><h4>No Winner Was Chosen</h4></center>
        					<center><h5>Check back for updates!</h5></center>
        				@endif
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
			</div>
		</div>
		<div class="col-sm-6">
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8">
        			<center><h4>Most Recent Winner ({{ $month_words }})</h4></center>
        			<div class="card card-body" style="border-color:#C9AE5D">
        				@if($winner != null)
        					<center><h4><b>{{ $winner->name }}</b></h4></center>
        					<center><h5>With {{ $winner->month_hours }} hours!</h5></center>
        				@else
        					<center><h4>No Winner Has Been Chosen</h4></center>
        					<center><h5>Check back for updates!</h5></center>
        				@endif
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
			</div>
		</div>
    </div>
    <hr>
    <center><h2><i class="fa fa-microphone" style="color:#FFDF00"></i> Pyrite Mic Award for 20{{ $lyear }} <i class="fa fa-microphone" style="color:#FFDF00"></i></h2></center>
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="card card-body" style="border-color:#FFDF00">
                @if($pyrite != null)
                    <center><h4><b>{{ $pyrite->name }}</b></h4></center>
                    <center><h5>With {{ $pyrite->year_hours }} hours!</h5></center>
                @else
                    <center><h4>No Winner Was Chosen</h4></center>
                    <center><h5>Check back for updates!</h5></center>
                @endif
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
	<br>

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
	</div>
@endsection
