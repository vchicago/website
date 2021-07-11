@extends('layouts.dashboard')

@section('title')
Roster
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Roster</h1>
    </div>
	<br>

<div class="container">
    @if(Auth::user()->isAbleTo('roster'))
        <a href="/dashboard/admin/roster/visit/requests" class="btn btn-warning">Visit Requests</a>
        <a href="/dashboard/admin/roster/purge-assistant" class="btn btn-danger">Roster Purge Assistant</a>
        <br><br>
    @endif
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#home" role="tab" data-toggle="tab" style="color:black">Home Controllers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#visit" role="tab" data-toggle="tab" style="color:black">Visiting Controllers</a>
        </li>
		@if(count($loacontrollers) > 0)
		<li class="nav-item">
            <a class="nav-link" href="#loa" role="tab" data-toggle="tab" style="color:black">LOA Controllers</a>
        </li>
		@endif
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
		<div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name and Initials</th>
                        <th scope="col"><center>Rating</center></th>
                        <th scope="col"><center>Delivery</center></th>
                        <th scope="col"><center>Ground</center></th>
                        <th scope="col"><center>Tower</center></th>
                        <th scope="col"><center>Approach</center></th>
                        <th scope="col"><center>Center</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hcontrollers as $c)
                        <tr>
                            @if(Auth::user()->isAbleTo('roster') || Auth::user()->isAbleTo('train'))
                                <td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">
                                    @if($c->hasRole('atm'))
                                        <span class="badge badge-danger">ATM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('datm'))
                                        <span class="badge badge-danger">DATM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ta'))
                                        <span class="badge badge-danger">TA</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('wm'))
                                        <span class="badge badge-primary">WM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('awm'))
                                        <span class="badge badge-primary">AWM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ec'))
                                        <span class="badge badge-primary">EC</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('aec'))
                                        <span class="badge badge-primary">AEC</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('fe'))
                                        <span class="badge badge-primary">FE</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('afe'))
                                        <span class="badge badge-primary">AFE</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ins'))
                                        <span class="badge badge-info">INS</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('mtr'))
                                        <span class="badge badge-info">MTR</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @else
											{{ $c->backwards_name }} - {{ $c->initials }}
                                    @endif
                                </a></td>
                            @else
                                <td>
                                    @if($c->hasRole('atm'))
                                        <span class="badge badge-danger">ATM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('datm'))
                                        <span class="badge badge-danger">DATM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ta'))
                                        <span class="badge badge-danger">TA</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('wm'))
                                        <span class="badge badge-primary">WM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('awm'))
                                        <span class="badge badge-primary">AWM</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ec'))
                                        <span class="badge badge-primary">EC</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('aec'))
                                        <span class="badge badge-primary">AEC</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('fe'))
                                        <span class="badge badge-primary">FE</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('afe'))
                                        <span class="badge badge-primary">AFE</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('ins'))
                                        <span class="badge badge-info">INS</span> {{ $c->backwards_name }} - {{ $c->initials }}
                                    @elseif($c->hasRole('mtr'))
                                        <span class="badge badge-info">MTR</span> {{ $c->backwards_name }} - {{ $c->initials }}
									@else
											{{ $c->backwards_name }} - {{ $c->initials }}
                                    @endif
                                </td>
                            @endif
                            <td><center>{{ $c->rating_short }}</center></td>
                            @if($c->del == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->del == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->del == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->del == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->gnd == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->gnd == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->gnd == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->gnd == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->twr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->twr == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->twr == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->twr == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>	
                            @endif
                            @if($c->app == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->app == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->app == 2)
                                <td><center><span class="badge badge-primary">C90</span></center></td>
							@elseif($c->app == 3)
                            <td><center><span class="badge badge-warning">Minor Solo</span></center></td>
							@elseif($c->app == 4)
                            <td><center><span class="badge badge-warning">C90 Solo</span></center></td>
                            @endif
                            @if($c->ctr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->ctr == 1)
                                <td><center><span class="badge badge-primary">Certified</span></center></td>
							@elseif($c->ctr == 2)
                            <td><center><span class="badge badge-danger">Solo</span></center></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
			</div>
        </div>
        <div role="tabpanel" class="tab-pane" id="visit">
			<div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name and Initials</th>
                        <th scope="col"><center>Rating</center></th>
                        <th scope="col"><center>Delivery</center></th>
                        <th scope="col"><center>Ground</center></th>
                        <th scope="col"><center>Tower</center></th>
                        <th scope="col"><center>Approach</center></th>
                        <th scope="col"><center>Center</center></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($vcontrollers as $c)
                        <tr>
                            @if(Auth::user()->isAbleTo('roster') || Auth::user()->isAbleTo('train'))
								@if($c->visitor == 1)
                                <td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">{{ $c->backwards_name }} - {{ $c->visitor_from }} Visitor</a></td>
								@else
								<td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">{{ $c->backwards_name }}</a></td>
								@endif
                            @else
								@if($c->visitor == 1)
                                <td>{{ $c->backwards_name }} - {{ $c->visitor_from }} Visitor</td>
								@else
								<td>{{ $c->backwards_name }}</td>
								@endif
                            @endif
                            <td><center>{{ $c->rating_short }}</center></td>
                            @if($c->del == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->del == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->del == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->del == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->gnd == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->gnd == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->gnd == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->gnd == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->twr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->twr == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->twr == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->twr == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>	
                            @endif
                            @if($c->app == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->app == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->app == 2)
                                <td><center><span class="badge badge-primary">C90</span></center></td>
							@elseif($c->app == 3)
                            <td><center><span class="badge badge-warning">Minor Solo</span></center></td>
							@elseif($c->app == 4)
                            <td><center><span class="badge badge-warning">C90 Solo</span></center></td>
                            @endif
                            @if($c->ctr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->ctr == 1)
                                <td><center><span class="badge badge-primary">Certified</span></center></td>
							@elseif($c->ctr == 2)
                            <td><center><span class="badge badge-danger">Solo</span></center></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
        </div>
		        <div role="tabpanel" class="tab-pane" id="loa">
			<div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name and Initials</th>
                        <th scope="col"><center>Rating</center></th>
                        <th scope="col"><center>Delivery</center></th>
                        <th scope="col"><center>Ground</center></th>
                        <th scope="col"><center>Tower</center></th>
                        <th scope="col"><center>Approach</center></th>
                        <th scope="col"><center>Center</center></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($loacontrollers as $c)
                        <tr>
                            @if(Auth::user()->isAbleTo('roster') || Auth::user()->isAbleTo('train'))
                                <td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">{{ $c->backwards_name }} - {{ $c->initials }}</a></td>
                            @else
                                <td>{{ $c->backwards_name }} - {{ $c->initials }}</td>
                            @endif
                            <td><center>{{ $c->rating_short }}</center></td>
                            @if($c->del == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->del == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->del == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->del == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->gnd == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->gnd == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->gnd == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->gnd == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>
                            @endif
                            @if($c->twr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->twr == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->twr == 2)
                                <td><center><span class="badge badge-primary">ORD</span></center></td>
							@elseif($c->twr == 3)
                            <td><center><span class="badge badge-warning">ORD Solo</span></center></td>	
                            @endif
                            @if($c->app == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->app == 1)
                                <td><center><span class="badge badge-secondary">Minor</span></center></td>
                            @elseif($c->app == 2)
                                <td><center><span class="badge badge-primary">C90</span></center></td>
							@elseif($c->app == 3)
                            <td><center><span class="badge badge-warning">Minor Solo</span></center></td>
							@elseif($c->app == 4)
                            <td><center><span class="badge badge-warning">C90 Solo</span></center></td>
                            @endif
                            @if($c->ctr == 0)
                                <td><center><i class="fas fa-times" style="color:red"></i></center></td>
                            @elseif($c->ctr == 1)
                                <td><center><span class="badge badge-primary">Certified</span></center></td>
							@elseif($c->ctr == 2)
                            <td><center><span class="badge badge-danger">Solo</span></center></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
        </div>
    </div>
	    <div class="modal fade" id="allowVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Allow Rejected Visitor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action' => 'AdminDash@allowVisitReq']) !!}
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <div class="row">
                                {!! Form::label('cid', 'Controller CID') !!}
                                {!! Form::text('cid', null, ['placeholder' => 'Controller CID', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button action="submit" class="btn btn-success">Allow Visitor</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
