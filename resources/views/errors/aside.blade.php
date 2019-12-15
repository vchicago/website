<div class="o-hidden border-0 shadow-lg my-5 mx-0 px-0 rounded bg-light">
	<div class="card-body p-0">
	            <div class="px-0 py-0">
              <div class="text-center">
				<br>
	            <h5><i class="fa fa-broadcast-tower rotate-n-15 text-primary"></i> Online Controllers</h5></center>
				<hr>
            <div class="table">
                <table class="table table-borderless table-responsive-lg table-sm">
                    <thead>
                        <th scope="col"><center><small>Position</small></center></th>
                        <th scope="col"><center><small>Controller</small></center></th>
                        <th scope="col"><center><small>Time Online<small></center></th>
                    </thead>
                    <tbody>
                        @if($controllers->count() > 0)
                            @foreach($controllers as $c)
                                <tr>
                                    <td><center><small>{{ $c->position }}</small></center></td>
                                    <td><center><small>{{ $c->name }}</small></center></td>
                                    <td><center><small>{{ $c->time_online }}</small></center></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><center><i>No Controllers Online</i></center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div> 
			<hr>
			<small>Last Updated {{ $controllers_update }}Z</small>
	<br><br>
	</div>
	</div>
	</div>
</div>
<div class="o-hidden border-0 shadow-lg my-5 mx-0 rounded bg-light">
	<div class="card-body p-0">
	<br><br>
	            <div class="p-5">
              <div class="text-center">
	<p>This will be a sidebar with information and stuff</p>
	<br><br>
	<hr>
	<br>
	<br>Even more stuff will go here.<br><br>
	</div>
	</div>
	</div>
</div>
		