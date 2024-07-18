@extends('layout.login')
@section('content')
<h1>login admin</h1>
<div class="contact-form">
  <div class="signin">
    <form method="post" action="{{route('dolog_admin')}}" class="form-login">
          {{ csrf_field() }}
	      <input type="text" class="user" name="username" value="Enter Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Username';}" />
	      <input type="password" class="pass" name="password" value="Your Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Password';}" />
          <input type="submit" value="LOGIN" />
          <p>Not a member? <a href="{{url('/registrasi')}}">Signup now >></a> </p>
	</form>
  </div>
</div>
@endsection