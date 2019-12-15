@extends('layouts.email')
@section('content')
    <p>Dear {{ $visitor->name }},</p>

    <p>Congratulations, you have been accepted as a visitor in Chicago.</p><br>
    <p>You can find all the information for the various facilities within the ARTCC under the files page on the website, <a href="http://www.vzauartcc.org">www.vzauartcc.org</a>.</p><br>
    <p>Discord is used for all controller communications. You can find information on how to connect <a href="https://vzauartcc.org/dashboard/controllers/discord">here.</a></p><br>
    <p>All visitors are certified to control minor fields through their current rating. It is highly recommended that you review the SOPs and LOAs located on the website prior to logging onto the network. Although it is not required, it is recommended to schedule a session with a mentor or instructor to go over the procedures at minor facilities.</p><br>
    <p>Once again, congratulations on being accepted as a visitor in Chicago and we hope to see you on the network soon! If you have any questions, feel free to email the DATM at <a href="mailto:datm@vzauartcc.org">datm@vzauartcc.org</a>.</p><br>

    <p>Best regards,</p>
    <p>vZAU Staff</p>
@endsection
