@extends('layout.main')
@section('content')
<div class="containerlogin">
	<div class="col-lg-7 col-lg-offset-3">
	  	<div class="row">
	  		<form method="post" action="{{route('doLogin')}}" class="form-login">
      		{{ csrf_field() }}
		   	<div class="form-group">
				<label><b>USERNAME</b></label>
			    <input type="text" placeholder="Enter Username" name="username" class="form-control" required>
			</div>
			<div>
			    <label><b>PASSWORD</b></label>
			    <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
			</div>
			<div>
			    <button type="submit" class="button-login">Login</button>
			    <label>
			      <input type="checkbox" checked="checked" name="remember"> Remember me
			    </label>
		  	</div>
			  <div class="btn" style="background-color:#f1f1f1">
			    <button type="button" class="cancelbtn">Cancel</button>
			    <span class="psw">Dont Have Account?? <a href="{{ url('registrasi/') }}" style="font-weight:bold;"> Registration in here!</a></span>
			  </div>

			</form>
	  	</div>
	</div>
</div>
@endsection
