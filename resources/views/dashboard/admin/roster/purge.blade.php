@extends('layouts.dashboard')

@section('title')
Roster Purge
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Roster Purge Assistant</h1>
    </div>
	<br>

<?php
$mname = date("F", mktime(0, 0, 0, $month, 1, $year));
if ($month == 1) { $pm = 12; $pyr = $year - 1; } else { $pm = $month -1; $pyr = $year; }
if ($month == 12) { $nm = 1; $nyr = $year + 1; } else { $nm = $month + 1; $nyr = $year; }
?>

<div class="container">
    <a class="btn btn-primary" href="/dashboard/controllers/roster"><i class="fa fa-arrow-left"></i> Back</a>
    <br><br>
    <div class="row">
        <div class="col-sm-2">
            <a class="btn btn-primary" href="/dashboard/admin/roster/purge-assistant/<?=$pyr?>/<?=$pm?>"><i class="fa fa-arrow-left"></i> Previous Month</a></li>
        </div>
        <div class="col-sm-8">
            <center><h4><?=$mname?> 20<?=$year?></h4></center>
        </div>
        <div class="col-sm-2" align="right">
            <a class="btn btn-primary" href="/dashboard/admin/roster/purge-assistant/<?=$nyr?>/<?=$nm?>">Next Month <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <br>
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#home" role="tab" data-toggle="tab" style="color:black">Home Controllers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#visit" role="tab" data-toggle="tab" style="color:black">Visiting Controllers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#train" role="tab" data-toggle="tab" style="color:black">Mentors/Instructors</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Hours This Month</th>
                        <th scope="col">Last Training Session</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($home as $c)
                        <tr>
                            <td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">{{ $c->backwards_name }} ({{ $c->id }})</a></td>
                            <td>{{ $c->rating_short }}</td>
                            @if($stats[$c->id]->total_hrs >= 3)
                                <td bgcolor="#A9DFBF" class="black"><b>
                                    @if($last_stats[$c->id]->total_hrs <= 1)
                                        {{ $stats[$c->id]->total_hrs }}*
                                    @else
                                        {{ $stats[$c->id]->total_hrs }}
                                    @endif
                                </b></td>
                            @else
                                <td bgcolor="#E6B0AA" class="black"><b>
                                    @if($last_stats[$c->id]->total_hrs <= 1)
                                        {{ $stats[$c->id]->total_hrs }}*
                                    @else
                                        {{ $stats[$c->id]->total_hrs }}
                                    @endif
                                </b></td>
                            @endif
                            <td>
                                @if($c->last_training)
                                    {{ $c->last_training }}
                                @else
                                    <i>No Recent Training</i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
				<caption>*Controller did not control for at least 60 minutes in the previous month.</caption>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="visit">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Hours This Month</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visit as $c)
                        <tr>
                            <td><a href="/dashboard/admin/roster/edit/{{ $c->id }}">{{ $c->backwards_name }} ({{ $c->id }})</a></td>
                            <td>{{ $c->rating_short }}</td>
                            @if($stats[$c->id]->total_hrs >= 3)
                                <td bgcolor="#A9DFBF" class="black"><b>
                                    @if($last_stats[$c->id]->total_hrs <= 1)
                                        {{ $stats[$c->id]->total_hrs }}*
                                    @else
                                        {{ $stats[$c->id]->total_hrs }}
                                    @endif
                                </b></td>
                            @else
                                <td bgcolor="#E6B0AA" class="black"><b>
                                    @if($last_stats[$c->id]->total_hrs <= 1)
                                        {{ $stats[$c->id]->total_hrs }}*
                                    @else
                                        {{ $stats[$c->id]->total_hrs }}
                                    @endif
                                </b></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
				<caption>*Controller did not control for at least 60 minutes in the previous month.</caption>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="train">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name (CID)</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Last Training Session</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainc as $c)
                        <tr>
                            <td>
                                @if($c->hasRole('mtr'))
                                    <span class="badge badge-info">MTR</span>
                                @elseif($c->hasRole('ins'))
                                    <span class="badge badge-info">INS</span>
                                @endif
                                {{ $c->backwards_name }} ({{ $c->id }})
                            </td>
                            <td>{{ $c->rating_short }}</td>
                            <td>
                                @if($c->last_training_given)
                                    <p>{{ $c->last_training_given }}</p>
                                @else
                                    <p><i>No Recent Training Given</i></p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
	<br>
</div>

@endsection
