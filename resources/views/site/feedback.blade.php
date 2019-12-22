@extends('layouts.landing')

@section('title')
New Feedback
@endsection

@section('content')
	<div class="card shadow-lg my-5 bg-light">
		<div class="card-body p-0 bg-light text-center mb-2 mx-2">
			<h2 class="h2 mb-4 mt-4">Leave Feedback</h2>
		</div>
	</div>
<br>


<div class="card shadow-lg bg-light">
	<div class="card-body p-2 bg-light text-center mb-2 mx-2">
    {!! Form::open(['action' => 'FrontController@saveNewFeedback']) !!}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('controller', 'Controller:', ['class' => 'control-label']) !!}
                    {!! Form::select('controller', $controllers, null, ['placeholder' => 'Select Controller', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service', 'Service Level:', ['class' => 'control-label']) !!}
                    {!! Form::select('service', [
                        0 => 'Excellent',
                        1 => 'Good',
                        2 => 'Fair',
                        3 => 'Poor',
                        4 => 'Unsatisfactory'
                    ], null, ['placeholder' => 'Select Level', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('pilot_name', 'Pilot Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('pilot_name', null, ['placeholder' => 'Your Name (Optional)', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('pilot_email', 'Pilot Email:', ['class' => 'control-label']) !!}
                            {!! Form::email('pilot_email', null, ['placeholder' => 'Your Email (Optional)', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
                    {!! Form::text('position', null, ['placeholder' => 'Position Staffed', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('callsign', 'Flight Callsign:', ['class' => 'control-label']) !!}
                    {!! Form::text('callsign', null, ['placeholder' => 'Your Flight Callsign', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pilot_cid', 'Pilot VATSIM CID:', ['class' => 'control-label']) !!}
                    {!! Form::text('pilot_cid', null, ['placeholder' => 'Your VATSIM CID (Optional)', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('comments', 'Additional Comments:', ['class' => 'control-label']) !!}
            {!! Form::textArea('comments', null, ['placeholder' => 'Additional Comments (Optional)', 'class' => 'form-control']) !!}
        </div>
		<div class="g-recaptcha" data-sitekey="6Lf0BcgUAAAAAIj7fnd58WCsh_Fo5J2y4MXKv6x1"></div>
        <br>
        <button class="btn btn-success" type="submit">Send Feedback</button>
    {!! Form::close() !!}
		</div>
	</div>
@endsection
