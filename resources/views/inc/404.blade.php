@extends('layouts.landing')

@section('title')
Page Not Found
@endsection

@section('content')
        <div class="container">
		<br><br>

          <!-- 404 Error Text -->
          <div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
			<div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
			@if(Auth::check())
            <a href="/dashboard">&larr; Back to Dashboard</a>
			@else
			<a href="/">&larr; Back to Home</a>
			@endif
          </div>
        </div>
		</div>
@endsection
