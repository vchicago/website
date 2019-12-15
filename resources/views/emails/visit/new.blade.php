@extends('layouts.email')

@section('content')
<p>Dear {{ $visit->name }},</p>

<p>Your visitor application has been successfully submitted. If you have any questions or concerns, please email the DATM at <a href="mailto:datm@vzauartcc.org">datm@vzauartcc.org</a>.</p>

<p>Best regards,</p>
<p>vZAU Visiting Staff</p>
@endsection
