<div class="o-hidden border-0 shadow-lg my-5 mx-0 px-0 rounded bg-light d-none d-lg-block">
	<div class="card-body p-0">
	            <div class="px-0 py-0">
              <div class="text-center d-block">
				<br>
	            <h5 class="text-primary"><i class="fa fa-broadcast-tower rotate-n-15"></i> Online Controllers</h5>
            <div class="table">
                <table class="table table-bordered table-responsive-lg table-sm" id="onlineControllers">
                    <thead>
                        <th scope="col" class="text-xs"><center>Position</center></th>
                        <th scope="col" class="text-xs"><center>Controller</center></th>
                        <th scope="col" class="text-xs"><center>Time Online</center></th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
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

<script>
let controllers = [];
let loading = true;

function updateControllers() {
    $.get("https://api.vzau.cloud/v1/live/controllers/ZAU").done((data) => {
        loading = false;
        if (typeof data == "object" && data.length == 0) {
            controllers = data
        } else {
            controllers = [];
        }
    }).fail(() => {
        controllers = [];
    })
}

function displayControllers() {
    if (loading) {
        $("#onlineControllers tbody").html(`
            <tr><td colspan="4"><center><i>Loading...</i></center></td></tr>
        `);
        return;
    }
    let html = "";
    if (controllers.length > 0) {
        data.forEach(controller => {
            let duration = ((new Date()) - (new Date(controller['logon_time']))).toISOString().substr(11, 5).replaceAll(":", "+");
            html = `${html}
                <tr>
                <td><center><small>${controller['callsign']}</small></center></td>
                <td><center><small>${controller['name']}</small></center></td>
                <td><center><small>${duration}</small></center></td>
                </tr>
            `;
        });

        $("#onlineControllers tbody").html(`
            <tr><td colspan="4"><center><i>No controllers online</i></center></td></tr>
        `);
    } else {
        $("#onlineControllers tbody").html(html);
    }
}

updateControllers();
setInterval(() => updateControllers(), 120000);
setInterval(() => displayControllers(), 1000);
</script>