@extends('layouts.landing')

@section('title')
Staff
@endsection

@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5">
	<img src="/photos/banner2.jpg" class="card-img-top img-fluid" alt="roster">
    <div class="block-heading-two">
		<div class="card-body">
		<h2 class="card-title">vZAU Staff</h4>
		<hr>
		<h4>
            Air Traffic Manager -
            @if($atm == '[]')
                <i>Vacant</i>
            @else
                @foreach($atm as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:atm@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope" ></i></a>
			</h4>
        <p>The Air Traffic Manager is responsible to the VATUSA Northeastern Region Director for the overall administration of the ARTCC. The ATM is responsible for appointing ARTCC staff members and delegation of authorities.</p>
    <hr>
        <h4>
            Deputy Air Traffic Manager -
            @if($datm == '[]')
                <i>Vacant</i>
            @else
                @foreach($datm as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:datm@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope rotate-n-15"></i></a>
        </h4>
        <p>The Deputy Air Traffic Manager reports to the Air Traffic Manager and acts as Air Traffic Manager in their absence. The Deputy Air Traffic Manager is jointly responsible for administration and accuracy of the roster including visiting controllers.</p>
    <hr>
        <h4>
            Training Administrator -
            @if($ta == '[]')
                <i>Vacant</i>
            @else
                @foreach($ta as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:ta@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope rotate-n-15"></i></a>
        </h4>
        <p>The Training Administrator works with the Air Traffic Manager and Deputy Air Traffic Manager to build training programs, establish training procedures and recommend instructors and mentors. The Training Administrator works with Instructors and Mentors to develop knowledge and mentors to help develop teaching ability.</p>
    <hr>
    @if($ata != '[]')
            <h4>
                Assistant Training Administrator -
                @if($ata == '[]')
                    <i>Vacant</i>
                @else
                    @foreach($ata as $s)
                        {{ $s->full_name }}
                    @endforeach
                @endif
            </h4>
        <hr>
    @endif
        <h4>
            Webmaster -
            @if($wm == '[]')
                <i>Vacant</i>
            @else
                @foreach($wm as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:wm@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope rotate-n-15" ></i></a>
        </h4>
        <p>Responsible to the Air Traffic Manager for the operation and maintenance of all IT services including, but not limited to, the Website, Discord, and Email services and any other tasking as directed.</p>
    <hr>
    @if($awm != '[]')
            <h4>
                Assistant Webmaster -
                @if($awm == '[]')
                    <i>Vacant</i>
                @else
                    @foreach($awm as $s)
                        {{ $s->full_name }}
                    @endforeach
                @endif
            </h4>
        <hr>
    @endif
        <h4>
            Events Coordinator -
            @if($ec == '[]')
                <i>Vacant</i>
            @else
                @foreach($ec as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:ec@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope rotate-n-15"></i></a>
			</h4>
        <p>The Events Coordinator is responsible to the Deputy Air Traffic Manager for the coordination, planning, dissemination and creation of events to neighboring facilities, virtual airlines, VATUSA and VATSIM.</p>
    <hr>
    @if($aec != '[]')
            <h4>
                Assistant Events Coordinator -
                @if($aec == '[]')
                    <i>Vacant</i>
                @else
                    @foreach($aec as $s)
                        {{ $s->full_name }}
                    @endforeach
                @endif
            </h4>
        <hr>
    @endif
        <h4>
            Facility Engineer -
            @if($fe == '[]')
                <i>Vacant</i>
            @else
                @foreach($fe as $s)
                    {{ $s->full_name }}
                @endforeach
            @endif
            &nbsp;<a href="{{ 'mailto:fe@'.\Config::get('facility.email') }}" class="text-primary"><i class="fa fa-envelope rotate-n-15"></i></a>
        </h4>
        <p>The Facility Engineer is responsible to the Senior Staff for creation of sector files, radar client files, training scenarios, Letters of Agreement, Memorandums of Understanding, Standard Operating Procedures and other requests as directed and submission to the Air Traffic Manager for approval prior to dissemination.</p>
    <hr>
    @if($afe != '[]')
            <h4>
                Assistant Facility Engineer -
                @if($afe == '[]')
                    <i>Vacant</i>
                @else
                    @foreach($afe as $s)
                        {{ $s->full_name }}
                    @endforeach
                @endif
            </h4>
        <hr>
    @endif
        <h4>
            Instructors:
            @if($ins == '[]')
                <i>&nbsp;No Instructors</i>
            @else
                <br><br>
                <ul>
                    @foreach($ins as $i)
                        <li>{{ $i->full_name }}</li>
                    @endforeach
                </ul>
            @endif
            <hr>
            Mentors:
            @if($mtr == '[]')
                <i>&nbsp;No Mentors</i>
            @else
                <br><br>
                <ul>
                    @foreach($mtr as $i)
                        <li>{{ $i->full_name }}</li>
                    @endforeach
                </ul>
            @endif
        </h4>
    </div>
	</div>
</div>

@endsection
