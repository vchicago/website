@extends('layouts.dashboard')

@section('title')
    New Airport
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">New Airport</h1>
    </div>
<br>
<div class="container">
    {!! Form::open(['action' => 'AdminDash@storeAirport']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('name', 'Airport Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('FAA', '3-Letter Identifier (FAA)') !!}
                    {!! Form::text('FAA', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('ICAO', '4-Letter Identifier (ICAO)') !!}
                    {!! Form::text('ICAO', 'K', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Add</button>
    {!! Form::close() !!}
	<br><br>
</div>
@endsection
