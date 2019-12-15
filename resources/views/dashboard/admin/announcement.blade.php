@extends('layouts.dashboard')

@section('title')
Announcement
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Manage the Dashboard Announcement</h1>
    </div>
<br>
<div class="container">
    {!! Form::open(['action' => 'AdminDash@saveAnnouncement']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('body', 'Announcement (Leave Blank to Remove the Announcement):', ['class' => 'control-label']) !!}
            {!! Form::textArea('body', $announcement->body, ['placeholder' => 'Leave Blank for no Announcement', 'id' => 'article-ckeditor', 'class' => 'form-control']) !!}
        </div>
        <p class="small"><i>Last edited by {{ $announcement->staff_name }} on {{ $announcement->update_time }}</i></p>
        <button class="btn btn-success" type="submit">Save Announcement</button>
    {!! Form::close() !!}
	<br>
</div>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
@endsection
