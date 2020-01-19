@extends('layouts.landing')

@section('title')
Welcome
@endsection

@section('content')
<br>
		<img src="https://picsum.photos/1200/250?blur" class="img-responsive rounded shadow-lg" width="100%" alt="...">
<br>
<br>

		<img src="https://picsum.photos/1200/250?blur" class="img-responsive rounded shadow-lg" width="100%" alt="...">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="row no-gutters">
          <div class="col-lg-5">
				<img src="https://i.picsum.photos/id/1063/600/250.jpg" class="card-img img-fluid">
		  </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">vZAU Chicago ARTCC</h1>
				<br>
				@if(Auth::check())
				<small><i>Logged in as {{ Auth::user()->full_name }} - {{ Auth::user()->rating_short }}</i></small>
				<br>
				<a href="/dashboard" class="btn btn-primary btn-lg " role="button">Controller Dashboard</a>
				@else
				<a href="/login" class="btn btn-primary btn-lg " role="button">Login</a>
				@endif
				<br>
				<br>
				<hr>
								<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Online Controllers</h6>
					</div>
						<div class="card-body">
                    </tbody>
                </table>
				</div>
            </div>
			</div>
			<hr>
			<br>
			 <div class="copyright text-center my-auto">
            <span>Copyright &copy; vZAU ARTCC 2019</span>
          </div>
              </div>
            </div>
          </div>
        </div>

@endsection
