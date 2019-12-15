@extends('layouts.dashboard')

@section('title')
News Admin
@endsection

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">News Administration</h1>
    </div>
<br>
<div class="container">
    <a class="btn btn-primary" href="/dashboard/admin/calendar/new">New News Posting</a>
    <br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col"><center>Title</center></th>
                        <th scope="col"><center>Body</center></th>
                        <th scope="col"><center>Created By</center></th>
                        <th scope="col"><center>Last Updated By</center></th>
                        <th scope="col"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($news) > 0)
                        @foreach($news as $c)
                            <tr>
                                @if($c->time == null)
                                    <td>{{ $c->date }}</td>
                                @else
                                    <td>{{ $c->date }} {{ $c->time }}</td>
                                @endif
                                <td><center><a href="/dashboard/admin/calendar/view/{{ $c->id }}">{{ $c->title }}</a></center></td>
                                <td><center>{!! str_limit($c->body, 50, '...') !!}</center></td>
                                <td data-toggle="tooltip" title="{{ $c->created_at }}"><center>{{ App\User::find($c->created_by)->full_name }}</center></td>
                                @if($c->updated_by != null)
                                    <td data-toggle="tooltip" title="{{ $c->updated_at }}"><center>{{ App\User::find($c->updated_by)->full_name }}</center></td>
                                @else
                                    <td></td>
                                @endif
                                <td><center>
                                    {!! Form::open(['action' => ['AdminDash@deleteCalendarEvent', $c->id]]) !!}
                                        @csrf
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <a class="btn btn-success simple-tooltip" href="/dashboard/admin/calendar/edit/{{ $c->id }}" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                                        <button class="btn btn-danger simple-tooltip" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></button>
                                    {!! Form::close() !!}
                                </center></td>
                            </tr>
                        @endforeach
                    @else
                        <p>No news to show.</p>
                    @endif
                </tbody>
            </table>
        </div>
</div>
@endsection
