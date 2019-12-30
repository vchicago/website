@extends('layouts.frontpage')

@section('title')
Welcome
@endsection

@section('content')

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="row no-gutters">
          <div class="col-lg-6 p-0">
			<img src="/photos/frontpage.png" class="card-img img-fluid" alt="...">
			</div>
          <div class="col-lg-6">
			<div class="card-body p-4">
              <div class="text-center">
			          @if(Carbon\Carbon::now()->month == 12)
				  	@if(Carbon\Carbon:now()->day <= 27)
						<img src="/photos/xmas_logo.png" class="img-fluid" alt="ZAU Logo">
					  @else
						<img src="/photos/ny_logo.png" class="img-fluid" alt="ZAU Logo">
					  @endif
				   @elseif(Carbon\Carbon::now()->month == 1)
				   	@if(Carbon\Carbon:now()->day <= 21)
						<img src="/photos/ny_logo.png" class="img-fluid" alt="ZAU Logo">
					  @else
						<img src="/photos/logo.png" class="img-fluid" alt="ZAU Logo">
					  @endif
				   @else
				   <img src="/photos/ny_logo.png" class="img-fluid" alt="ZAU Logo">
				   @endif
				    
				</div>
					<hr>
						<p>Virtual Chicago ARTCC provides air traffic control services for the Chicago Metro area, Northwestern Indiana, Central Illinois, Eastern Iowa, Southern Wisconsin, and Southwestern Michgan. Our goal is to provide the most realistic experience to our pilots, while maintaining professionalism and courtesy. Chicago offers a wealth of difference for new controllers, and will proivde a good challenge for any aspiring controllers. Join our family today!</p>

						<p>All information contained on these pages are for flight simulation use only on the VATSIM network and shall not be used for real world navigation or aviation purposes. This site is in no way affiliated with the FAA, actual ZAU ARTCC or any other governing aviation agency or group. All content contained herein is approved for use on the VATSIM network.</p>
              </div>
            </div>
          </div>
        </div>

@endsection
