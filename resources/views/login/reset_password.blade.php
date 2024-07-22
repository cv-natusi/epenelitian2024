@extends('layout.main')
@section('content')
<div class="containerlogin">
	<div class="col-lg-7 col-lg-offset-3">
	  	<div class="row">
            <form method="post" action="{{route('store_resetpassword')}}" class="form-login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label><b>{{ __('Email') }}</b></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email Yang Pernah Terdaftar">
                    <p class='messageError errorKTP' style="color:red;"></p>
                    <input type='hidden' name='statusEmail' value='Exist' id='statusEmail' class='form-control'>
                </div>
                <div>
                    <label><b>NO WA</b></label>
                    <input id="no_wa" type="number" class="form-control @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" required autocomplete="no_wa" autofocus pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" placeholder="Masukkan Nomor Yang Pernah Terdaftar">
                    <p class='messageError errorWA' style="color:red;font-weight: bold;"></p>
                    <input type='hidden' name='statusWA' value='Exist' id='statusWA' class='form-control'>
                </div>
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
     $('#no_wa').on('keyup', function() {
        var no_wa = $('#no_wa').val();
        var email = $('#email').val();        
        $.post("{!! route('cek_resetwa') !!}", {no_wa:no_wa,email:email}).done(function(data){
            if (data.status == 'success') {
            console.log('mas');
            $('.errorWA').html('Data Ditemukan, Klik Tombol Reset dibawah ini');
            $('#statusWA').val('Ready');
            $('#statusEmail').val('Ready');
            disabledBtn();
            }else{
            console.log('ayang');
            $('.errorWA').html('No WA  dan Email Tidak Sesuai,Silahkan Hubungi Admin');
            $('#statusWA').val('Exist');
            $('#statusEmail').val('Exist');
            disabledBtn();
            }
        });        
    })

    function disabledBtn() {
      var stWA = $('#statusWA').val();       
      var stUsername = $('#statusEmail').val();

      if (stWA == 'Ready' && stUsername == 'Ready') {
        $('.btn-primary').removeAttr('disabled');
      }else{
        $('.btn-primary').attr('disabled', true);
      }
    }
</script>
@stop
