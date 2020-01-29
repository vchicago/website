@extends('layouts.dashboard')

@section('title')
New Calendar Event/News
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">New News Posting</h1>
    </div>
<br>
<div class="container">
        {!! Form::open(['action' => 'AdminDash@storeCalendarEvent']) !!}
        @csrf
        <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Required']) !!}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('date', 'Date', ['class' => 'form-label']) !!}
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        {!! Form::text('date', null, ['placeholder' => 'MM/DD/YYYY', 'class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker1']) !!}
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {!! Form::label('time', 'Time') !!}
                    {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => 'HH:MM (Optional)']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('body', 'Additional Information') !!}
            {!! Form::textArea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Type of Post') !!}
            {!! Form::select('type', [
                1 => 'News'
            ], null, ['class' => 'form-control', 'disabled']) !!}
        </div>
        <div class="row">
            <div class="col-sm-1">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
    {!! Form::close() !!}
            <div class="col-sm-1">
                <a href="/dashboard/admin/calendar" class="btn btn-danger">Cancel</a>
            </div>
        </div>
</div>
<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'L'
    });
});
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection
