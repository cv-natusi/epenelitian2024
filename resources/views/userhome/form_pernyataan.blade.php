@extends('layout.main')
@section('content')

@foreach ($permohonan as $per)
<div class="col-lg-12 col-md-12">
    <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
	  <div class="section-header">
        <h4 style="font-weight: bold;">Penelitian <b>"{{ $per->judul_penelitian }}"</b></h4>
        <hr style="  border: 1px solid DimGray;">
    </div>
</div>
<div class="col-lg-12 col-md-12">
	<div class="text-muted">
		<strong>
            Surat ijin penelitian sudah bisa di ambil:<br>
        </strong><br>        
	</div>
	<form action="{{ url('userhome/confirm_penelitian') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Estimasi Waktu Penelitian Selesai</label>
			<input type="hidden" name="id" value="{{ $per->id_permohonan }}">
			<input id="dtp" name="estimasi" class="form-control" required="" placeholder="exp: 2019-12-19">
		</div>
		<div class="alert alert-warning" style="text-align: justify;">
			<p class="text-center"><b>PERNYATAAN</b></p>
			<input type="checkbox" name="agree" required="">
			Saya bersedia upload/ submiting hasil penelitian akhir (Bab1-7), maksimal 1 bulan setelah penelitian selesai. Jika tidak, maka saya bersedia tidak diijinkan melakukan penelitian kembali di Kab. Sidoarjo
		</div>
		<button type="submit" class="btn btn-success">Konfirmasi</button>
	</form>
</div>
@endforeach

<script>
		$(function(){
        $( "#dtp" ).datepicker({
         dateFormat:'yy-mm-dd',
         changeMonth: true,
         changeYear: true,
         yearRange:'2015:2065'
	     });
	    });
</script>
@endsection
