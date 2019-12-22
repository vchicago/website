@extends('layouts.landing')

@section('title')
Visitor Application
@endsection

@section('content')
<div class="container">
	<div class="card shadow-lg my-5 bg-light">
		<div class="card-body p-0 bg-light text-center mb-2 mx-2">
			<h2 class="h2 mb-4 mt-4">Visit vZAU ARTCC</h2>
		</div>
	</div>
<br>


	<div class="card shadow-lg bg-light">
	<div class="card-body p-2 bg-light text-center mb-2 mx-2">
    {!! Form::open(['action' => 'FrontController@storeVisit']) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('cid', 'CID') !!}
                    {!! Form::text('cid', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('name', 'Full Name') !!}
                    {!! Form::text('name', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('rating', 'Rating') !!}
                    {!! Form::select('rating', [
                        1 => 'Observer (OBS)', 2 => 'Student 1 (S1)',
                        3 => 'Student 2 (S2)', 4 => 'Senior Student (S3)',
                        5 => 'Controller (C1)', 7 => 'Senior Controller (C3)',
                        8 => 'Instructor (I1)', 10 => 'Senior Instructor (I3)'
                    ], null, ['placeholder' => 'Select Rating', 'class' => 'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('home', 'Home ARTCC') !!}
                    {!! Form::text('home', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('reason', 'Explanation of Why You Want to Visit the '.\Config::get('facility.name_short').' ARTCC') !!}
            {!! Form::textArea('reason', null, ['placeholder' => 'Required', 'class' => 'form-control']) !!}
        </div>
		<div class="g-recaptcha" data-sitekey="6Lf0BcgUAAAAAIj7fnd58WCsh_Fo5J2y4MXKv6x1"></div>
        <br>
        <button class="btn btn-success" type="submit">Submit</button>
    {!! Form::close() !!}
	</div>
	</div>
</div>
@endsection
