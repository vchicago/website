@extends('layouts.landing')

@section('title')
Files
@endsection

@section('content')
	<div class="card o-hidden border-0 shadow-lg my-5 rounded">
	  <div class="row no-gutters">
    <div class="col-md-3 bg-light">
      <img src="/photos/banner3.jpg" class="card-img img-fluid">
	</div>
	<div class="col-md-9 bg-light">
	<div class="card-header">
	<h2 class="text-primary">vZAU Controller Files</h2>
	<hr>
    <ul class="nav nav-tabs nav-justified card-header-tabs bg-light" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#vrc" role="tab" data-toggle="tab" style="color:black">VRC</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vstars" role="tab" data-toggle="tab" style="color:black">vSTARS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#veram" role="tab" data-toggle="tab" style="color:black">vERAM</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vatis" role="tab" data-toggle="tab" style="color:black">vATIS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#sop" role="tab" data-toggle="tab" style="color:black">SOPs</a>
        </li>
		<li class="nav-item">
            <a class="nav-link" href="#loa" role="tab" data-toggle="tab" style="color:black">LOAs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#misc" role="tab" data-toggle="tab" style="color:black">Misc</a>
        </li>
    </ul>
	</div>
	<div class="card-body bg-light">
    <div class="tab-content bg-light">
        <div role="tabpanel" class="tab-pane active" id="vrc">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vrc->count() > 0)
                        @foreach($vrc as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="vstars">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vstars->count() > 0)
                        @foreach($vstars as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="veram">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($veram->count() > 0)
                        @foreach($veram as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="vatis">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($vatis->count() > 0)
                        @foreach($vatis as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="sop">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($sop->count() > 0)
                        @foreach($sop as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="loa">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($loa->count() > 0)
                        @foreach($loa as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
		        <div role="tabpanel" class="tab-pane" id="misc">
            <table class="table table-bordered table-striped table-sm bg-light">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"><center>Description</center></th>
                        <th scope="col"><center>Uploaded/Updated at</center></th>
                        <th scope="col"><center>Download</center></th>
                    </tr>
                </thead>
                <tbody>
                    @if($misc->count() > 0)
                        @foreach($misc as $f)
                            <tr>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->desc }}</td>
                                <td>{{ $f->updated_at }}</td>
                                <td align="center">
                                    <a href="{{ $f->path }}" target="_blank" class="btn btn-primary btn-circle simple-tooltip" data-toggle="tooltip" title="Download"><i class="fas fa-download"></i></a>
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
@endsection
