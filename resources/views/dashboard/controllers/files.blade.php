@extends('layouts.dashboard')

@section('title')
Files
@endsection

@section('content')
<div class="container">
	<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="h3 mb-0 font-weight-bold text-gray-600">Controller Files/Documents</div>
                    </div>
                  </div>
                </div>
              </div>
<br>

<div class="container">
<div class="row">
	<div class="col-lg-2">
	<div class="card bg-primary shadow h-100 py-2 px-0">
                <div class="card-body">
    <ul class="nav flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link active bg-primary text-gray-200" href="#vrc" role="tab" data-toggle="tab">VRC</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#vstars" role="tab" data-toggle="tab">vSTARS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#veram" role="tab" data-toggle="tab">vERAM</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#vatis" role="tab" data-toggle="tab">vATIS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#sop" role="tab" data-toggle="tab">SOPs</a>
        </li>
		<li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#loa" role="tab" data-toggle="tab">LOAs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-primary text-gray-200" href="#misc" role="tab" data-toggle="tab">Miscellaneous</a>
        </li>
        @if(Auth::user()->can('staff'))
            <li class="nav-item">
                <a class="nav-link bg-primary text-gray-200" href="#staff" role="tab" data-toggle="tab">Staff</a>
            </li>
		@else
			<li class="nav-item">
				<a class="nav-link disabled bg-primary text-gray-200" href="#" tabindex="-1" aria-disabled="true">Staff</a>
			</li>
        @endif
    </ul>
				 @if(Auth::user()->can('files'))
					 <hr>
        <a href="/dashboard/admin/files/upload" class="btn btn-success">Upload File</a>
		@endif
		</div>
		</div>
	</div>
	<div class="col-lg-10">
	<div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="vrc">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vrc->count() > 0)
                        @foreach($vrc as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="vstars">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vstars->count() > 0)
                        @foreach($vstars as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="veram">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($veram->count() > 0)
                        @foreach($veram as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="vatis">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vatis->count() > 0)
                        @foreach($vatis as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="sop">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($sop->count() > 0)
                        @foreach($sop as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="loa">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($loa->count() > 0)
                        @foreach($loa as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
		<div role="tabpanel" class="tab-pane" id="misc">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($misc->count() > 0)
                        @foreach($misc as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="staff">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col" width="10%">Name</th>
                        <th scope="col" width="50%"><center>Description</center></th>
                        <th scope="col" width="20%"><center>Uploaded/Updated at</center></th>
                        <th scope="col" width="20%"><center>Actions</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($staff->count() > 0)
                        @foreach($staff as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td><center>
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-success simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                    @if(Auth::user()->can('files'))
                                        <a href="/dashboard/admin/files/edit/{{ $f->id }}" class="btn btn-warning simple-tooltip" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="/dashboard/admin/files/delete/{{ $f->id }}" class="btn btn-danger simple-tooltip" data-toggle="tooltip" title="Delete"><i class="fas fa-times"></i></a>
                                    @endif
									</center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
		</div>
		</div>
		</div>
		</div>
    </div>
	<br>
</div>
@endsection
