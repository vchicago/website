@extends('layouts.dashboard')

@section('title')
{{ $event->name }}
@endsection

@section('content')

<div class="container">
    @if($event->banner_path != null)
            <img class="img-responsive rounded" src="{{ $event->banner_path }}" width="100%" alt="{{ $event->name }}">
    @endif
	<br>
	<br>
	<br>
    <div class="row">
        <div class="col-md-5">
            <div class="card mb-2">
                <div class="card-header py-3 mb-2">
                    <h4 class="m-0 font-weight-bold text-primary">
                        {{ $event->name }}
                    </h4>
                </div>
                <div class="card-body">
                    @if($event->host != null)
                        <h4><b>Host ARTCC:</b> {{ $event->host }}</h5>
                    @endif
                    <h5><b>Date:</b> {{ $event->date }}</h5>
                    <h5><b>Time:</b> {{ $event->start_time }}z to {{ $event->end_time }}z</h5>
                    <p><b>Additional Information:</b></p>
                    <p>{!! $event->description !!}</p>
                </div>
            </div>
			@if(Auth::user()->can('events'))
			<div class="card mb-4">
				<div class="card-header pt-3 pb-2">
					<b>Assign Positions:</b>
					                            <span class="float-right" data-toggle="modal" data-target="#manualAssign">
                                <button type="button" class="btn btn-primary btn-sm pull-right" data-placement="top">Manual Assign</button>
                            </span>
						</div>
						<div class="card-body pt-1">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Position</th>
                                    <th scope="col">Controller</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($registrations->count() > 0)
                                    @foreach($registrations as $r)
                                        <tr>
                                            <td>{{ $r->position_name }}</td>
                                            <td>
                                                {{ $r->controller_name }}
                                                <small>
                                                    @if($r->choice_number != 0)
                                                        (#{{ $r->choice_number }})
                                                    @else
                                                        (N/A)
                                                    @endif
                                                </small>
                                            </td>
                                            <td>
                                                @if($r->start_time != null)
                                                    {{ $r->start_time }}
                                                @else
                                                    {{ $event->start_time }}
                                                @endif
                                                -
                                                @if($r->end_time != null)
                                                    {{ $r->end_time }}z
                                                @else
                                                    {{ $event->end_time }}z
                                                @endif
                                            </td>
                                            <td>
                                                <span data-toggle="modal" data-target="#addrequest{{ $r->id }}">
                                                    <button type="button" class="btn btn-success btn-sm simple-tooltip" data-placement="top" data-toggle="tooltip" title="Assign Position"><i class="fas fa-check"></i></button>
                                                </span>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="addrequest{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Assign Position</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    {!! Form::open(['action' => ['AdminDash@assignPosition', $r->id]]) !!}
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    {!! Form::label('controller_name', 'Controller Name') !!}
                                                                    {!! Form::text('controller_name', $r->controller_name, ['class' => 'form-control', 'disabled']) !!}
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    {!! Form::label('position', 'Position') !!}
                                                                    {!! Form::select('position', $positions->pluck('name', 'id'), $r->position_id, ['class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    {!! Form::label('start_time', 'Start Time (Zulu)') !!}
                                                                    {!! Form::text('start_time', $r->start_time, ['placeholder' => $event->start_time, 'class' => 'form-control']) !!}
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    {!! Form::label('end_time', 'End Time (Zulu)') !!}
                                                                    {!! Form::text('end_time', $r->end_time, ['placeholder' => $event->end_time, 'class' => 'form-control']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button action="submit" class="btn btn-success">Assign Position</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">No positions posted.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
					</div>
				</div>
				@endif
        </div>
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                        Signup/Position Assignments
                        @if(Auth::user()->can('events'))
                            @if($event->reg == 0)
                                <a href="/dashboard/admin/events/toggle-reg/{{ $event->id }}" class="btn btn-success btn-simple-tooltip btn-circle float-right" data-toggle="tooltip" title="Open Registration"><i class="fas fa-check"></i></a>
                            @else
                                <a href="/dashboard/admin/events/toggle-reg/{{ $event->id }}" class="btn btn-danger btn-simple-tooltip btn-circle float-right" data-toggle="tooltip" title="Close Registration"><i class="fas fa-times"></i></a>
                            @endif
                        @endif
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Position</th>
                                <th scope="col">Controller</th>
                                @if(Auth::user()->can('events'))
                                    <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if($positions->count() > 0)
                                @foreach($positions as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>
                                            @if($p->controller->count() == 0)
                                                No Assignment
                                            @else
                                                @foreach($p->controller as $c)
                                                    <p>
                                                        @if(Auth::user()->can('events'))
                                                            <a href="/dashboard/admin/events/positions/unassign/{{ $c->id }}" style="color:inherit" data-toggle="tooltip" title="Unassign Controller"><i class="fas fa-times"></i></a>
                                                            &nbsp;
                                                        @endif
                                                        <b>
                                                            {{ $c->controller_name }}
                                                            <i>
                                                                @if($c->start_time != null)
                                                                    ({{ $c->start_time }}
                                                                @else
                                                                    ({{ $event->start_time }}
                                                                @endif
                                                                -
                                                                @if($c->end_time != null)
                                                                    {{ $c->end_time }}z)
                                                                @else
                                                                    {{ $event->end_time }}z)
                                                                @endif
                                                            </i>
                                                        </b>
                                                    </p>
                                                @endforeach
                                            @endif
                                        </td>
                                        @if(Auth::user()->can('events'))
                                            <td>
                                                <a href="/dashboard/admin/events/position/delete/{{ $p->id }}" class="btn btn-danger btn-circle btn-sm simple-tooltip" data-toggle="tooltip" title="Remove Position"><i class="fas fa-times"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No positions posted.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <hr>
                    <p><i>Select your top three positions and put the time you're available (time in zulu formatted, 00:00; if you are available for the entire event, you can leave the time blank):</i></p>
                    @if($positions->count() > 0)
                        {!! Form::open(['action' => 'ControllerDash@signupForEvent']) !!}
                            @csrf
                            @if($event->reg == 1 && Auth::user()->canEvents == 1)
                                {!! Form::hidden('event_id', $event->id) !!}
                                <div class="form-group">
                                    @if($your_registration1 != null)
                                        {!! Form::hidden('yr1', $your_registration1->id) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num1', '1.') !!}
                                            </div>
                                            @if($your_registration1->status == 0)
                                                <div class="col-sm-5">
                                                    {!! Form::select('num1', $positions->pluck('name', 'id'), $your_registration1->position_id, ['placeholder' => 'Choice 1', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time1', $your_registration1->start_time, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time1', $your_registration1->end_time, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @else
                                                <div class="col-sm-5">
                                                    {!! Form::select('num1', $positions->pluck('name', 'id'), $your_registration1->position_id, ['disabled', 'placeholder' => 'Choice 1', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time1', $your_registration1->start_time, ['disabled', 'placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time1', $your_registration1->end_time, ['disabled', 'placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        {!! Form::hidden('yr1', null) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num1', '1.') !!}
                                            </div>
                                            <div class="col-sm-5">
                                                {!! Form::select('num1', $positions->pluck('name', 'id'), null, ['placeholder' => 'Choice 1', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('start_time1', null, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('end_time1', null, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if($your_registration2 != null)
                                        {!! Form::hidden('yr2', $your_registration2->id) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num2', '2.') !!}
                                            </div>
                                            @if($your_registration2->status == 0)
                                                <div class="col-sm-5">
                                                    {!! Form::select('num2', $positions->pluck('name', 'id'), $your_registration2->position_id, ['placeholder' => 'Choice 2', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time2', $your_registration2->start_time, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time2', $your_registration2->end_time, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @else
                                                <div class="col-sm-5">
                                                    {!! Form::select('num2', $positions->pluck('name', 'id'), $your_registration2->position_id, ['disabled', 'placeholder' => 'Choice 2', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time2', $your_registration2->start_time, ['disabled', 'placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time2', $your_registration2->end_time, ['disabled', 'placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        {!! Form::hidden('yr2', null) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num2', '2.') !!}
                                            </div>
                                            <div class="col-sm-5">
                                                {!! Form::select('num2', $positions->pluck('name', 'id'), null, ['placeholder' => 'Choice 2', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('start_time2', null, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('end_time2', null, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @if($your_registration3 != null)
                                        {!! Form::hidden('yr3', $your_registration3->id) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num3', '3.') !!}
                                            </div>
                                            @if($your_registration3->status == 0)
                                                <div class="col-sm-5">
                                                    {!! Form::select('num3', $positions->pluck('name', 'id'), $your_registration3->position_id, ['placeholder' => 'Choice 3', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time3', $your_registration3->start_time, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time3', $your_registration3->end_time, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @else
                                                <div class="col-sm-5">
                                                    {!! Form::select('num3', $positions->pluck('name', 'id'), $your_registration3->position_id, ['disabled', 'placeholder' => 'Choice 3', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('start_time3', $your_registration3->start_time, ['disabled', 'placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('end_time3', $your_registration3->end_time, ['disabled', 'placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        {!! Form::hidden('yr3', null) !!}
                                        <div class="row">
                                            <div class="col-sm-1">
                                                {!! Form::label('num3', '3.') !!}
                                            </div>
                                            <div class="col-sm-5">
                                                {!! Form::select('num3', $positions->pluck('name', 'id'), null, ['placeholder' => 'Choice 3', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('start_time3', null, ['placeholder' => 'Start Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="col-sm-3">
                                                {!! Form::text('end_time3', null, ['placeholder' => 'End Zulu', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            @else
                                @if(Auth::user()->canEvents != 1)
                                    You are not permitted to signup for events.
                                @else
                                    Event registration is currently closed.
                                @endif
                            @endif
                        {!! Form::close() !!}
                    @else
                        <p>No positions added.</p>
                    @endif
                    @if(Auth::user()->can('events'))
                        <br>
                        {!! Form::open(['action' => ['AdminDash@addPosition', $event->id]]) !!}
                            @csrf
                            <div class="row">
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['placeholder' => 'New Position', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success btn-circle simple-tooltip" data-toggle="tooltip" title="Add Position"><i class="fas fa-check"></i></button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <br><center>
							<span data-toggle="modal" data-target="#savePreset">
								<button type="button" class="btn btn-primary btn-sm" data-placement="top">Save Current Positions as Preset</button>
							</span>
							<span data-toggle="modal" data-target="#loadPreset">
								<button type="button" class="btn btn-secondary btn-sm" data-placement="top">Load Position Preset</button>
							</span>
							<span data-toggle="modal" data-target="#removePreset">
								<button type="button" class="btn btn-danger btn-sm" data-placement="top">Remove Position Preset</button>
							</span>
						</center>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <a href="/dashboard/controllers/events" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    @if(Auth::user()->can('events'))
        <a href="/dashboard/admin/events/edit/{{ $event->id }}" class="btn btn-success">Edit</a>
        <a href="/dashboard/admin/events/delete/{{ $event->id }}" class="btn btn-danger">Delete</a>
    @endif
	<br>

	@if(Auth::user()->can('events'))
		<div class="modal fade" id="savePreset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Position Preset Name</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					{!! Form::open(['action' => ['AdminDash@setEventPositionPreset', $event->id]]) !!}
					@csrf
					<div class="modal-body">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button action="submit" class="btn btn-success">Save Position Preset</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="modal fade" id="loadPreset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Load Position Preset</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					{!! Form::open(['action' => ['AdminDash@retrievePositionPreset', $event->id]]) !!}
					@csrf
					<div class="modal-body">
						{!! Form::label('p_id', 'Position Preset') !!}
						{!! Form::select('p_id', $presets, null, ['placeholder' => 'Select Preset', 'class' => 'form-control']) !!}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button action="submit" class="btn btn-success">Load Position Preset</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="modal fade" id="removePreset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Remove Position Preset</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					{!! Form::open(['action' => ['AdminDash@deletePositionPreset', $event->id]]) !!}
					@csrf
					<div class="modal-body">
						{!! Form::label('p_id', 'Position Preset') !!}
						{!! Form::select('p_id', $presets, null, ['placeholder' => 'Select Preset', 'class' => 'form-control']) !!}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button action="submit" class="btn btn-success">Remove Position Preset</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="modal fade" id="manualAssign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Manual Assign Position</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					{!! Form::open(['action' => ['AdminDash@manualAssign', $event->id]]) !!}
					@csrf
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('controller', 'Controller Name') !!}
									{!! Form::select('controller', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('position', 'Position') !!}
									{!! Form::select('position', $positions->pluck('name', 'id'), null, ['placeholder' => 'Select Position', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									{!! Form::label('start_time', 'Start Time (Zulu)') !!}
									{!! Form::text('start_time', null, ['placeholder' => $event->start_time, 'class' => 'form-control']) !!}
								</div>
								<div class="col-sm-6">
									{!! Form::label('end_time', 'End Time (Zulu)') !!}
									{!! Form::text('end_time', null, ['placeholder' => $event->end_time, 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button action="submit" class="btn btn-success">Assign Position</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	@endif
</div>
@endsection
