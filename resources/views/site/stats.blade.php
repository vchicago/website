@extends('layouts.landing')

@section('title')
Stats
@endsection

@section('content')




<?php
$mname = date("F", mktime(0, 0, 0, $month, 1, $year));
if ($month == 1) { $pm = 12; $pyr = $year - 1; } else { $pm = $month -1; $pyr = $year; }
if ($month == 12) { $nm = 1; $nyr = $year + 1; } else { $nm = $month + 1; $nyr = $year; }
?>
<br>
<br>
	<div class="card shadow-lg mb-3 bg-light">
		<div class="row no-gutters">
		<div class="col-md-8">
		<img src="/photos/skyline2.png" class="card-img px-0 py-0" alt="...">
		</div>
		<div class="col-md-4">
			<div class="card-body text-center">
				<h2 class="h2 mb-4 mt-4">vZAU Controller Statistics</h2>
			<hr>
            <center>
                <h3>Total Hours This Month</h3>
            </center>
                <center><button type="button" class="btn btn-primary btn-lg my-2">{{ number_format($all_stats['month'], 2) }}</button></center>
            <center>
                <h3>20<?=$year?> Total Hours</h3>
            </center>
                <center><button type="button" class="btn btn-primary btn-lg my-2">{{ number_format($all_stats['year'], 2) }}</button></center>
            <center>
                <h3>Hours All Time</h3>
            </center>
                <center><button type="button" class="btn btn-primary btn-lg my-2">{{ number_format($all_stats['total'], 2) }}</button></center>
            </div>
        </div>
    </div>
	</div>


    <hr>
	<div class="card o-hidden shadow-lg bg-light">
	<div class="card-body p-0 bg-light mx-2 my-2">
    <div class="row">
        <div class="col-sm-2">
            <a class="btn btn-primary" href="/controllers/stats/<?=$pyr?>/<?=$pm?>"><i class="fa fa-arrow-left"></i> Previous Month</a></li>
        </div>
        <div class="col-sm-8">
            <center><h4>Showing Stats for <?=$mname?> 20<?=$year?></h4></center>
        </div>
        <div class="col-sm-2" align="right">
            <a class="btn btn-primary" href="/controllers/stats/<?=$nyr?>/<?=$nm?>">Next Month <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

    <br>
    <ul class="nav nav-tabs nav-justified bg-light" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#home" role="tab" data-toggle="tab" style="color:black">Home Controllers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#visit" role="tab" data-toggle="tab" style="color:black">Visiting Controllers</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <table class="table table-bordered table-striped table-sm table-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Local</th>
                        <th scope="col">TRACON</th>
                        <th scope="col">Center</th>
                        <th scope="col">Total This Month</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($home as $h)
                        <tr>
                            <td>{{ $h->full_name }}</td>
                            <td>{{ $h->rating_short }}</td>
                            <td>{{ $stats[$h->id]->local_hrs }}</td>
                            <td>{{ $stats[$h->id]->approach_hrs }}</td>
                            <td>{{ $stats[$h->id]->enroute_hrs }}</td>
                            @if($stats[$h->id]->total_hrs >= \Config::get('facility.h_hours'))
                                <td bgcolor="#A9DFBF" class="black"><b>{{ $stats[$h->id]->total_hrs }}</b></td>
                            @else
                                <td bgcolor="#E6B0AA" class="black"><b>{{ $stats[$h->id]->total_hrs }}</b></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="visit">
            <table class="table table-bordered table-striped table-sm table-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Local</th>
                        <th scope="col">TRACON</th>
                        <th scope="col">Center</th>
                        <th scope="col">Total This Month</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visit as $h)
                        <tr>
                            <td>{{ $h->full_name }}</td>
                            <td>{{ $h->rating_short }}</td>
                            <td>{{ $stats[$h->id]->local_hrs }}</td>
                            <td>{{ $stats[$h->id]->approach_hrs }}</td>
                            <td>{{ $stats[$h->id]->enroute_hrs }}</td>
                            @if($stats[$h->id]->total_hrs >= \Config::get('facility.v_hours'))
                                <td bgcolor="#A9DFBF" class="black"><b>{{ $stats[$h->id]->total_hrs }}</b></td>
                            @else
                                <td bgcolor="#E6B0AA" class="black"><b>{{ $stats[$h->id]->total_hrs }}</b></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
	</div>
	</div>

@endsection
