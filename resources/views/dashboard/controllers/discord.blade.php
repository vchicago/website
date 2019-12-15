@extends('layouts.dashboard')

@section('title')
Discord
@endsection

@section('content')
<div class="container">
<h1 class="h3 mb-4 text-gray-800">Discord Information</h1>
</div>
<br>

<div class="container">
	<div class="row">
            <div class="col-sm-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-left">
                    <div class="col-auto">
                      <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Chicago Discord</div>
                      <div class="h6 mb-0 text-gray-800">Discord is ZAU's primary means of communication. Training, coordinating, and all other types of chat are done through Discord. Below you can see who is online. By hitting 'Join', you can open the server in your Discord desktop application.</div>
                    </div>
                  </div>
                </div>
              </div>
			 </div>
		</div>
	<div class="row">
			  <div class="col-sm-12 mb-4">
					<widgetbot
					server="485491681903247361"
					channel="485495655616348189"
					width="100%"
					height="600"
					shard="https://disweb.dashflo.net"
					></widgetbot>
				<script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script>
				</div>
	</div>
				
</div>
@endsection
