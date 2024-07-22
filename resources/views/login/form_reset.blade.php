@extends('layout.main')
@section('content')
<div class="containerlogin">
	<div class="col-lg-7 col-lg-offset-3">
	  	<div class="row">            
            <form method="post" action="{{route('store_verif_reset')}}" class="form-login">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ (!empty($users)) ? $users->id : '' }}">
                <div class="form-group">
                    <label><b>{{ __('Email') }}</b></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" readonly autocomplete="new-email" value="{{ (!empty($users)) ? $users->email : '' }}">
                </div>
                <div class="form-group">
                    <label><b>{{ __('Password') }}<span style="color: red;">*</span></b></label>
                    <input id="inputPassword" type="password" name="password" placeholder="Password" class="form-control">
                    <div class='iconEye'>
                        <a href="javascript:void(0)" onclick="showPassword()" id='eyePass'><i class="fa fa-eye"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>{{ __('Ulangi Password') }}<span style="color: red;">*</span></b></label>
                    <input id="inputConfirmPass" type="password" name="confirm_pass" onkeyup="confirmPassword()" placeholder="Konfirmasi Password" class="form-control">
                    <div class='iconEye'>
                        <a href="javascript:void(0)" onclick="showCornPassword()" id='eyeCornPass'><i class="fa fa-eye"></i></a>
                    </div>
                    <div class='iconStatus text-green' id='icon_confirmPass'></div>
                    <p class='messageError errorConfirmPass'></p>
                    <input type='hidden' name='statusConfirmPass' value='Failed' id='statusConfirmPass' class='form-control'>
                <div>
                    <button type="submit" class="button-login">Reset</button>                                        
                </div>
            </form>        
	  	</div>
	</div>
</div>
@endsection

@section('js')
<script>
    function showPassword() {
      var tag = document.getElementById("inputPassword").getAttribute("type");
      if (tag == 'password') {
        $('#inputPassword').attr('type','text');
        $('#eyePass').html('<i class="fa fa-eye"></i>');
      }else{
        $('#inputPassword').attr('type','password');
        $('#eyePass').html('<i class="fa fa-eye"></i>');
      }
    }

    function showCornPassword() {
      var tag = document.getElementById("inputConfirmPass").getAttribute("type");
      if (tag == 'password') {
        $('#inputConfirmPass').attr('type','text');
        $('#eyeCornPass').html('<i class="fa fa-eye"></i>');
      }else{
        $('#inputConfirmPass').attr('type','password');
        $('#eyeCornPass').html('<i class="fa fa-eye"></i>');
      }
    }


    function confirmPassword() {
      var password = $('#inputPassword').val();
      var confirmPass = $('#inputConfirmPass').val();
      if (password != '' && confirmPass != '') {
        if (password != confirmPass) {
          $('#inputConfirmPass').attr('class','form-control is-invalid');
          $('#icon_confirmPass').attr('class','iconStatus text-red');
          $('#icon_confirmPass').html('<i class="fa fa-exclamation-triangle"></i>');
          $('.errorConfirmPass').html('Password Tidak Cocok');
          $('#statusConfirmPass').val('Failed');
          disabledBtn();
        }else{
          $('#inputConfirmPass').attr('class','form-control is-valid');
          $('#icon_confirmPass').attr('class','iconStatus text-green');
          $('#icon_confirmPass').html('<i class="fa fa-check-circle"></i>');
          $('.errorConfirmPass').html('Password Cocok');
          $('#statusConfirmPass').val('Ready');
          disabledBtn();
        }
      }else {
        $('#inputConfirmPass').attr('class','form-control');
        $('#icon_confirmPass').attr('class','iconStatus');
        $('#icon_confirmPass').html('');
        $('.errorConfirmPass').html('');
        $('#statusConfirmPass').val('Failed');
        disabledBtn();
      }
    }

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function disabledBtn() {
      var stConfirmPass = $('#statusConfirmPass').val();
      if (stConfirmPass == 'Ready') {
        $('.btn-primary').removeAttr('disabled');
      }else{
        $('.btn-primary').attr('disabled', true);
      }
    }
</script>
@stop
