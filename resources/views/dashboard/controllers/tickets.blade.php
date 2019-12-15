@extends('layouts.dashboard')

@section('title')
Training Tickets
@endsection

@section('content')
<span class="border border-light" style="background-color:#F0F0F0">
<div class="container" style="background-color:#F0F0F0;">
    &nbsp;
    <h2>Training Tickets for {{ Auth::user()->full_name }}</h2>
    &nbsp;
</div>
</span>
<br>

@endsection