@extends('layouts.dashboard')

@section('title')
Website Activity
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Admin Activity Log</h1>
    </div>
<br>

<div class="container">
    <br>
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Date/Time</th>
                <th scope="col">Description</th>
                <th scope="col">IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $a)
                <tr>
                    <td>{{ $a->time_date }}</td>
                    <td>{{ $a->what }}</td>
                    <td>{{ $a->ip }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $audits->links() !!}
</div>

@endsection
