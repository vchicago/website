<div class="o-hidden border-0 shadow-lg my-5 mx-0 px-0 rounded bg-light">
	<div class="card-body p-0">
	            <div class="px-0 py-0">
              <div class="text-center">
				<br>
	            <h5><i class="fa fa-broadcast-tower rotate-n-15 text-primary"></i> Online Controllers</h5></center>
				<hr>
            <div class="table">
                <table class="table table-borderless table-responsive-lg table-sm" id="onlineControllers">
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