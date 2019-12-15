@extends('layouts.dashboard')

@section('title')
Profile
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    </div>

<div class="container">
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <h4>My Information</h4>
            <br>
            <p><b>CID:</b> {{ Auth::id() }}</p>
            <p><b>Name:</b> {{ Auth::user()->full_name }}</p>
            <p><b>Rating:</b> {{ Auth::user()->rating_long }}</p>
            <p><b>Email:</b> {{ Auth::user()->email }} <a style="color:inherit" href="https://cert.vatsim.net/vatsimnet/newmail.php" target="_blank" data-toggle="tooltip" title="Click Here to Update (It may take up to an hour for changes to be reflected)"><i class="fas fa-info-circle"></i></a></p>
			Receive Broadcast Emails?
                &nbsp;
                @if(Auth::user()->opt == 1)
                    <span data-toggle="modal" data-target="#unOpt">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </span>
                @else
                    <span data-toggle="modal" data-target="#Opt">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </span>
                @endif
	   
	   <div class="modal fade" id="Opt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Opt Into Broadcast Emails?</h5>
            </div>
            <br>
            <div class="container">
                <p>Opting into emails will only affect the recieving of mass emails. If you elect to opt into emails, you agree to recieve mass emails sent to groups of members of the vZAU ARTCC. This selection will not affect the reception of personalized emails (both automated and issued by staff) for example, training ticket emails. If you have any questions, please contact the ATM at <a href="mailto:atm@vzauartcc.org">atm@vzauartcc.org</a>.</p>
                <p>You may opt out at any time by using the slider shown here on your controller profile.</p>
                <br>
                <i>Please check the following check boxes if you would like to continue.</i>
                <hr>
                {!! Form::open(['action' => 'ControllerDash@optIn']) !!}
                    <div class="form-group">
                        {!! Form::checkbox('opt', '1', false) !!}
                        {!! Form::label('opt', 'I agree to recieve mass emails from the v'.\Config::get('facility.name_short').' ARTCC.', ['class' => 'form-label']) !!}
                        <br>
                        {!! Form::checkbox('privacy', '1', false) !!}
                        {!! Form::label('privacy', 'I have read and agree to the v'.\Config::get('facility.name_short').' ARTCC Privacy Policy.', ['class' => 'form-label']) !!}
                    </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url()->current() }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-success">Confirm Selection</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
	</div>
	</div>

        <div class="col-sm-6">
            <center>
                <h4>My Recent Activity:</h4>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        @if($personal_stats->total_hrs < 3)
                            <li class="list-group-item bg-danger">
                                <h5 class="text-light">Hours this Month:</h5>
                                <p class="text-light"><b>{{ $personal_stats->total_hrs }}</b></p>
                            </li>
                        @else
                            <li class="list-group-item bg-success">
                                <h5>Hours this Month:</h5>
                                <p class="text-light"><b>{{ $personal_stats->total_hrs }}</b></p>
                            </li>
                        @endif
                        <li class="list-group-item bg-primary">
                            <h5 class="text-light">Last Training Session Received:</h5>
                            <p class="text-light"><b>
                                @if($last_training != null)
                                    {{ $last_training->last_training }}
                                @else
                                    <i class="text-light">No Recent Training</i>
                                @endif
                            </b></p>
                        </li>
                        @if(Auth::user()->can('train'))
                            <li class="list-group-item bg-primary">
                                <h5 class="text-light">Last Training Session Given:</h5>
                                <p class="text-light"><b>
                                    @if(isset($last_training_given))
                                        {{ $last_training_given->last_training }}
                                    @else
                                        <i class="text-light">No Recent Training</i>
                                    @endif
                                </b></p>
                            </li>
                        @endif
                    </ul>
                </div>
            </center>
        </div>
		<br>
    </div>
	<hr>
	    <div class="row">
        <div class="col-sm-6">
            <center><h4>My Feedback:</h4></center>
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"><center>Position</center></th>
                            <th scope="col"><center>Result</center></th>
                            <th scope="col"><center>Comments</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($feedback->count() > 0)
                            @foreach($feedback as $f)
                                <tr>
                                    <td><center><a data-toggle="tooltip" title="View Details" href="/dashboard/controllers/profile/feedback-details/{{ $f->id }}">{{ $f->position }}</a></center></td>
                                    <td><center>{{ $f->service_level_text }}</center></td>
                                    <td><center>{{ str_limit($f->comments, 50, '...') }}</center></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
                        @else
                    </tbody>
                </table>
                            <p>No feedback found.</p>
                        @endif
            </div>
        </div>
        <div class="col-sm-6">
            <center><h4>My Training Tickets:</h4></center>
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"><center>Date</center></th>
                            <th scope="col"><center>Trainer</center></th>
                            <th scope="col"><center>Position</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tickets))
                            @foreach($tickets as $t)
                                <tr>
                                    <td><center><a href="/dashboard/controllers/ticket/{{ $t->id }}">{{ $t->date }}</a></center></td>
                                    <td><center>{{ $t->trainer_name }}</center></td>
                                    <td><center>{{ $t->position_name }}</center></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if(!isset($tickets))
                    <p>No training tickets found.</p>
                @endif
            </div>
            @if(isset($tickets))
                {!! $tickets->links() !!}
            @endif
        </div>
    </div>
</div>
<br>
@endsection
