@extends('layouts.email')

@section('content')
{!! nl2br($body) !!}
@endsection

@section('footer')
    <p><small>Automated from v{{ Config::get('facility.name_short') }} ARTCC issued on the behalf of {{ $sender->full_name }}.</small></p>
@endsection
