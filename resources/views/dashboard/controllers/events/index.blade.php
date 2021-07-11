@extends('layouts.dashboard')

@section('title')
Events
@endsection

@section('content')
<div class="container">
	<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="h3 mb-0 font-weight-bold text-gray-800">Events</div>
                    </div>
                  </div>
                </div>
              </div>
<br>
<br>
<div class="container">
    @if(Auth::user()->isAbleTo('events'))
        <a href="/dashboard/admin/events/new" class="btn btn-primary">New Event</a>
        <br><br>
    @endif
    <table class="table table-bordered bg-gradient-primary">
        <thead>
            <tr>
                <th scope="col" class="text-gray-200">Event</th>
                <th scope="col" class="text-gray-200"><center>Date</center></th>
                <th scope="col" class="text-gray-200"><center>Time</center></th>
                @if(Auth::user()->isAbleTo('events'))
                    <th scope="col" class="text-gray-200"><center>Actions</center></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if($events->count() > 0)
                @foreach($events as $e)
                    <tr>
                        @if($e->banner_path != null)
                            <td width="500px"><a href="/dashboard/controllers/events/view/{{ $e->id }}"><img src="{{ $e->banner_path }}" width="500px" alt="{{ $e->name }}"></a></td>
                        @else
                            <td width="500px"><a href="/dashboard/controllers/events/view/{{ $e->id }}"><h4 class="text-gray-200">{{ $e->name }}</h4></a></td>
                        @endif
                        <td class="text-gray-200">{{ $e->date }}</td>
                        <td class="text-gray-200">{{ $e->start_time }} - {{ $e->end_time }}z</td>
                        @if(Auth::user()->isAbleTo('events'))
                            <td>
                                @if($e->status == 0)
                                    <a href="/dashboard/admin/events/set-active/{{ $e->id }}" class="btn btn-success" data-toggle="tooltip" title="Unhide Event"><i class="fas fa-check"></i></a>
                                @elseif($e->status == 1)
                                    <a href="/dashboard/admin/events/hide/{{ $e->id }}" class="btn btn-warning" data-toggle="tooltip" title="Hide Event"><i class="fas fa-ban"></i></a>
                                @endif
                                <a href="/dashboard/admin/events/edit/{{ $e->id }}" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a href="/dashboard/admin/events/delete/{{ $e->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                @if($e->status == 0)
                                    <br>
                                    <p class="text-gray-200"><small><i>Hidden</i></small></p>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-gray-200">No events found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
