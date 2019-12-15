@extends('layouts.email')

@section('content')
<p>Dear {{ $s->full_name }},</p>
<br>
<p>You have not met the activity requirements within the last thirty days. As a student, you are required to take part in at least 60 minutes of training each 30 days. You will have a 30 day grace period to meet this requirement, but after that you may be removed from the roster.</p>
<p>If you have any concerns or are on an LOA, please contact the DATM at <a href="mailto:datm@vzauartcc.org">datm@vzauartcc.org</a>.</p>
<br>
<p>Sincerely,</p>
<p>vZAU ARTCC Staff</p>
@endsection
