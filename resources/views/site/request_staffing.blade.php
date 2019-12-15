@extends('layouts.landing')

@section('title')
Staffing Request
@endsection

@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5">
		<div class="row no-gutters">
			<div class="col-md-2">
				<img src="/photos/banner4.png" class="card-img img-fluid">
			</div>
		<div class="col-md-10 bg-light">
		<div class="card-header py-1">
			<h2 class="h2 mb-4 mt-4">Request Staffing</h2>
		</div>
		<div class="card-body bg-light mb-2 mx-2">
			<p>Want to have ZAU controllers online for your group's next event? We would more than happy to help! Just fill out a staffing request and our Events Coordinator will make sure we provide ATC services as needed.</p>
		</div>
		</div>
	</div>
</div>

	<div class="card shadow-lg bg-light">
	<div class="card-body p-2 bg-light text-center mb-2 mx-2">
    {!! Form::open(['action' => 'FrontController@staffRequest']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('name', 'Your Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['placeholder' => 'Your Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('email', 'Your Email:', ['class' => 'control-label']) !!}
                            {!! Form::email('email', null, ['placeholder' => 'Your Email', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {!! Form::label('org', 'Organization (If Applicable):', ['class' => 'control-label']) !!}
                    {!! Form::text('org', null, ['placeholder' => 'Organization if applicable (Optional)', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('date', 'Date of Staffing', ['class' => 'form-label']) !!}
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        {!! Form::text('date', null, ['placeholder' => 'MM/DD/YYYY', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker1']) !!}
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {!! Form::label('time', 'Time of Staffing (Zulu)', ['class' => 'form-label']) !!}
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                        {!! Form::text('time', null, ['placeholder' => '00:00', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker2']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('additional_information', 'Additional Information:', ['class' => 'control-label']) !!}
            {!! Form::textArea('additional_information', null, ['placeholder' => 'Please include all additional relevant information regarding the need for staffing.', 'class' => 'form-control']) !!}
        </div>
		<div class="g-recaptcha" data-sitekey="6LeQhMIUAAAAALN6fLl6sRuEpePeWwYtKgEUkNx6"></div>
        <br>
        <button class="btn btn-success" type="submit">Send Request</button>
    {!! Form::close() !!}
	</div>
	</div>
<br>

<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'L'
    });
});
$(function () {
    $('#datetimepicker2').datetimepicker({
        format: 'HH:mm'
    });
});
</script>
@endsection
