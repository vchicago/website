@extends('layouts.master')

@section('title')
500: Internal Server Error
@endsection

@section('content')
        <div class="fluid">
		<br><br>

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">500</div>
            <p class="lead text-gray-800 mb-5">Internal Server Error</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...Please kindly report this error to <a href="{{ 'mailto:wm@'.\Config::get('facility.email') }}">{{ 'wm@'.\Config::get('facility.email') }}</a> with descriptive steps to reproduce and a link to the page. Thank you for your help!</p><br>
                    Please include the following message in your email (if applicable):
                    <p class="text-gray-500 mb-0">{{ $exception->getMessage() }}</p>
					<br>
			@if(Auth::check())
            <a href="/dashboard">&larr; Back to Dashboard</a>
			@else
			<a href="/">&larr; Back to Home</a>
			@endif
          </div>
        </div>
@endsection
