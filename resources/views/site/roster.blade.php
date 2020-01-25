@extends('layouts.landing')

@section('title')
Roster
@endsection

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5 mx-0">
  <img src="/photos/banner.jpg" class="card-img-top" alt="roster">
  <div class="card-body">
    <h4 class="card-title">vZAU Roster</h4>
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#home" role="tab" data-toggle="tab" style="color:black">Home Controllers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#visit" role="tab" data-toggle="tab" style="color:black">Visiting Controllers</a>
        </li>
		@if(count($loacontrollers) == 0) 
		<li class="nav-item">
            <a class="nav-link" href="#loa" role="tab" data-toggle="tab" style="color:black">LOA Controllers</a>
        </li>
		@else
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
						<th scope="col"><center>Home ARTCC</center></th>
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
                            <td>{{ $c->backwards_name }} - {{ $c->initials }}</td>
							<td><center>{{ $c->visitor_from }}</center></td>
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
                            <td>{{ $c->backwards_name }} - {{ $c->initials }}</td>
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
</div>
</div>
@endsection
