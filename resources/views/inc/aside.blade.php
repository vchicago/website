<div class="o-hidden border-0 shadow-lg my-5 mx-0 px-0 rounded bg-light d-none d-lg-block">
	<div class="card-body p-0">
	            <div class="px-0 py-0">
              <div class="text-center d-block">
				<br>
	            <h5 class="text-primary"><i class="fa fa-broadcast-tower rotate-n-15"></i> Online Controllers</h5>
            <div class="table">
                <table class="table table-bordered table-responsive-lg table-sm">
                    <thead>
                        <th scope="col" class="text-xs"><center>Position</center></th>
                        <th scope="col" class="text-xs"><center>Controller</center></th>
                        <th scope="col" class="text-xs"><center>Time Online</center></th>
                    </thead>
                    <tbody>
                        @if($controllers->count() > 0)
                            @foreach($controllers as $c)
                                <tr>
                                    <td class="text-xs"><center>{{ $c->position }}</center></td>
                                    <td class="text-xs"><center>{{ $c->name }}</center></td>
                                    <td class="text-xs"><center>{{ $c->time_online }}</center></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-xs"><center><i>No Controllers Online</i></center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
			<p class="text-xs"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $controllers_update }}Z</p>
	</div>
	</div>
	</div>
</div>
<div class="o-hidden border-0 shadow-lg my-3 mx-0 px-0 rounded bg-light d-none d-lg-block">
	<div class="card-body p-0">
	            <div class="px-0 py-0">
              <div class="text-center px-0 py-0">
			  <br>
            <center><h5 class="text-primary"><i class="fa fa-cloud"></i> Weather</h5></center>
            <div class="table">
                <table class="table table-bordered table-responsive-lg table-sm">
                    <thead>
                        <th scope="col" class="text-xs"><center>Airport</center></th>
                        <th scope="col" class="text-xs"><center>Conditions</center></th>
                        <th scope="col" class="text-xs"><center>Wind</center></th>
                        <th scope="col" class="text-xs"><center>Altimeter</center></th>
                    </thead>
                    <tbody>
                        @if($airports->count() > 0)
                            @foreach($airports as $a)
                                <tr>
                                    <td class="text-xs"><a href="/pilots/airports/view/{{ $a->id }}"><center>{{ $a->ltr_4 }}</center></a></td>
                                    <td class="text-xs"center>{{ $a->visual_conditions }}</center></td>
                                    <td class="text-xs"><center>{{ $a->wind }}</center></td>
                                    <td class="text-xs"><center>{{ $a->altimeter }}</center></td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4" class="text-xs"><div align="center"><i >No Airports to Show</i></div></td>
                        @endif
                        <tr>
                            @if($metar_last_updated != null)
                                <td colspan="4" class="text-xs"><div align="center"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $metar_last_updated }}Z</div></td>
                            @else
                                <td colspan="4" class="text-xs"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated N/A</div></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
	</div>
	</div>
	</div>
</div>
		