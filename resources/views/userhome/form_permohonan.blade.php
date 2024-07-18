@extends('layout.main')
@section('content')

@if($category == "pns")
  <form class="form-horizontal" method="post" action="{{ route('store_permohonan_b') }}" enctype="multipart/form-data">
  <div class="col-lg-12 col-md-12">
      <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
      <br>
      <br>
      <br>
      <div class="section-header">
          <h4 style="font-weight: bold;">Data Kegiatan</h4>
          <p>Isi data hasil penelitian yang telah dibuat.</p>
          <hr style="  border: 1px solid DimGray;">
      </div>
  </div>
  <div class="col-lg-12 col-md-12">
    {{csrf_field()}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group row">
        <div class="col-sm-8">
          
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Judul Kegiatan:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="judul_penelitian" placeholder="Masukkan Judul Kegiatan yang akan anda buat" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tempat Kegiatan:</label>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <textarea name="unit_kerja_b" style="opacity: 0;position: absolute;z-index:-99" required></textarea>
          <input type="text" id="unit_kerja_b" value="" placeholder="Silahkan Ketikkan Kata Kunci..." class="form-control disablecopypaste" autocomplete="off">
          <input type="hidden" id="unit_kerja_hidden_b">
          <div id="tempat-unit">
          </div>
          <div id="hasil-unit">
          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <a href="javascript:void(0)" class="btn btn-success" onclick="tambah_tempat_b()"><i class="fa fa-plus"></i></a>
        </div>
      </div>
       <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Awal:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_awal" autocomplete="off" placeholder="Tanggal Mulai Kegiatan" required autocomplete="off">
        </div>
      </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Akhir:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_akhir" autocomplete="off" placeholder="Tanggal Selesai Kegiatan" required autocomplete="off">
        </div>
      </div>
      <div class="form-group row">
      </div>
      <div class="form-group" style="float: right;">
          <button type="submit" class="btn btn-success">SIMPAN</button>
          <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
      </div>

    </div>
  </div>
</form>
@else
<form class="form-horizontal" method="post" action="{{ route('store_permohonan') }}" enctype="multipart/form-data">
  <div class="col-lg-12 col-md-12">
      <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
      <div class="section-header">
          <h4 style="font-weight: bold;">Form Permohonan</h4>
          <p>Buat Permohonan Pengajuan Kegiatan.</p>
          <hr style="  border: 1px solid DimGray;">
      </div>
  </div>
  <div class="col-lg-12 col-md-12">
    {{csrf_field()}}
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Pilih Jenis Kegiatan:</label>
        <div class="col-sm-8">
          <select class="form-control" name="jenis_penelitian_id" required="" id="getVal">
            <option value="" selected style="font-weight: bold;"> .:: Pilih Jenis Kegiatan ::. </option>
            @foreach ($jenis_penelitian as $jp)
                <option value="{{$jp->id_jenis_penelitian}}">{{$jp->nama_jenis}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Judul Kegiatan:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="judul_penelitian" placeholder="Masukkan Judul Kegiatan yang akan anda buat" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tempat Kegiatan:</label>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <textarea name="unit_kerja" style="opacity: 0;position: absolute;z-index:-99" required></textarea>
          <input type="text" id="unit_kerja" value="" placeholder="Silahkan Ketikkan Kata Kunci..." class="form-control disablecopypaste" autocomplete="off">
          <input type="hidden" id="unit_kerja_hidden">
          <div id="tempat-unit">

          </div>
          <div id="hasil-unit">

          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <a href="javascript:void(0)" class="btn btn-success" onclick="tambah_tempat()"><i class="fa fa-plus"></i></a>
        </div>
      </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Awal:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_awal" autocomplete="off" placeholder="Tanggal Mulai Kegiatan" required autocomplete="off">
        </div>
      </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Akhir:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_akhir" autocomplete="off" placeholder="Tanggal Selesai Kegiatan" required autocomplete="off">
          <label class="custom-control-label" style="color: red;">*sesuai dengan surat rekomendasi dari Bakesbanpol.</label>
        </div>
      </div>

    </div>
  </div>

  <div class="col-lg-12 col-md-12">
    <div class="section-header">
        <h4 style="font-weight: bold;">Form Upload Persyaratan</h4>
        <p>Buat Formulir Permohonan Persyaratan.</p>
        <hr style="  border: 1px solid DimGray;">
    </div>
  </div>
  <div class="col-lg-12 col-md-12">
    <div class="col-lg-12 col-md-12 col-sm-12">
        {{-- anas --}}
        @foreach($jenis_file_pendukung as $file)
          <div class="form-group row">
            <label class="col-sm-4 col-form-label"> {{$file->nama_jenis}}</label>
            <div class="col-sm-8">
                <input type=hidden name="id_jenis_file[]" value="{{ $file->id_jenis_file }}">
                <input type="file" class="form-control" accept="application/pdf" name="upload_doc_pendukung[]" placeholder="Upload {{$file->nama_jenis}}">
            </div>
          </div>
        @endforeach

        @foreach($jenis_file_pendukung_statis as $statis)
          <div class="form-group row">
            <label class="col-sm-4 col-form-label"> {{$statis->nama_jenis}}:</label>
            {{-- LAMPIRAN_01_LEMBAR_PERSETUJUAN_PEMEGANG_PROGRAM_YG_AKAN_DITELITI.docx --}}
            <div class="col-sm-2">
              <a class="btn btn-primary col-sm-12" href="{{asset('lampiran/'.$statis->doc)}}" download="{{$statis->doc}}">Download</a>
            </div>
            <div class="col-sm-6">
              <input type=hidden name="id_jenis_file_statis[]" value="{{ $statis->id_jenis_file }}">
              <input type="file" class="form-control" accept="application/pdf" name="upload_doc_pendukung_statis[]" placeholder="Upload {{$statis->nama_jenis}}" required>
              <label class="custom-control-label" style="color: red;">*download dulu file aslinya.</label>
            </div>
          </div>
        @endforeach
        {{-- end anas --}}       
        <div class="form-group" style="float: right;">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
        </div>
    </div>
  </div>
</form>
@endif

@endsection
@section('js')
<script type="text/javascript">

   $(document).ready(function () {
      $('input.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
      $('textarea.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
    });

    $('input[type=file]').on('change',function (e) {
      var extValidation = new Array(".pdf");
      var fileExt = e.target.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
      if (extValidation.indexOf(fileExt) < 0) {
          swal('Extensi File Tidak Valid !','Upload file bertipe .pdf untuk dapat melakukan upload data...','warning')
          $(this).val("")
          return false;
      }
      else return true;
    })

   function cekAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 32 || charCode == 46 || charCode == 64)
        return false;
      return true;
    }
 
    function cekAngkaHuruf(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || (charCode >= 48 && charCode <= 57) || (charCode == 44 || charCode == 46)  || charCode == 32 || charCode == 45 || charCode == 47 || charCode == 64){
        return true;
      }else{
        return false;
      }
    }

  var dataUnitKerja = new Array();
  $('#unit_kerja').keyup(function(){
    var value = $('#unit_kerja').val();
    //silfi
    var value_tempat = $('select[name=jenis_penelitian_id').val();
    //
    if (value) {
      $.post("{{ url('api/get_tempat') }}",{value:value,value_tempat:value_tempat},function(data){
        //
        var html = '';
        if(data.status=='success'){
          for (var i = 0; i < data.tempat_penelitian.length; i++) {
            html+='<a href="javascript:void(0)" onclick="set_unit(\''+data.tempat_penelitian[i]+'\')">'+data.tempat_penelitian[i].substring(data.tempat_penelitian[i].indexOf("_")+2, data.tempat_penelitian[i].length)+'</a><br>';
            dataUnitKerja = data.tempat_penelitian;
          }
        }
        $('#tempat-unit').html(html);
      });
    } else {
        $('#tempat-unit').html('');
    }
  });

  var dataUnitKerjaB = new Array();
  $('#unit_kerja_b').keyup(function(){
    var value = $('#unit_kerja_b').val();
    //silfi
    var value_tempat = $('select[name=jenis_penelitian_id').val();
    //
    if (value) {
      $.post("{{ url('api/get_tempat_b') }}",{value:value,value_tempat:value_tempat},function(data){
        //
        var html = '';
        if(data.status=='success'){
          for (var i = 0; i < data.tempat_penelitian.length; i++) {
            html+='<a href="javascript:void(0)" onclick="set_unit(\''+data.tempat_penelitian[i]+'\')">'+data.tempat_penelitian[i].substring(data.tempat_penelitian[i].indexOf("_")+2, data.tempat_penelitian[i].length)+'</a><br>';
            dataUnitKerjaB = data.tempat_penelitian;
          }
        }
        $('#tempat-unit').html(html);
      });
    } else {
        $('#tempat-unit').html('');
    }
  });


function set_unit(unit){
  $('#unit_kerja').val(unit.substring(unit.indexOf("_")+2, unit.length));
  $('#unit_kerja_hidden').val(unit);
  $('#unit_kerja_b').val(unit.substring(unit.indexOf("_")+2, unit.length));
  $('#unit_kerja_hidden_b').val(unit);
  $('#tempat-unit').html('');
}

$('input[name=tgl_awal]').datetimepicker({
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  format: 'yyyy-mm-dd',
  minView: 2,
  forceParse: 0,
});
$('input[name=tgl_akhir]').datetimepicker({
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  format: 'yyyy-mm-dd',
  minView: 2,
  forceParse: 0,
});

function tambah_tempat(){
  var tempat = $('#unit_kerja').val();
  var tempatHidden = $('#unit_kerja_hidden').val();
  var wadah = $('textarea[name=unit_kerja]').val();

  if(dataUnitKerja.indexOf(tempatHidden) !== -1){
    if(wadah!=''){
      if(wadah.indexOf(tempatHidden)<0){
        wadah += '|'+tempatHidden;
      }else{
        wadah = wadah;
      }
    }else{
      wadah += tempatHidden;
    }

    $('#unit_kerja').val('');
    $('#unit_kerja_hidden').val('');
    var kata = wadah.split("|");
    susun(kata);
  } else{
    $('#unit_kerja').val('');
    $('#unit_kerja_hidden').val('');
    $('#tempat-unit').html('');
    swal("Data yang Anda Pilih Kosong / Tidak ditemukan");
  }
}

function tambah_tempat_b(){
  var tempat = $('#unit_kerja_b').val();
  var tempatHidden = $('#unit_kerja_hidden_b').val();
  var wadah = $('textarea[name=unit_kerja_b]').val();

  if(dataUnitKerjaB.indexOf(tempatHidden) !== -1){
    if(wadah!=''){
      if(wadah.indexOf(tempatHidden)<0){
        wadah += '|'+tempatHidden;
      }else{
        wadah = wadah;
      }
    }else{
      wadah += tempatHidden;
    }

    $('#unit_kerja_b').val('');
    $('#unit_kerja_hidden_b').val('');
    var kata = wadah.split("|");
    susun_b(kata);
  } else{
    $('#unit_kerja_b').val('');
    $('#unit_kerja_hidden_b').val('');
    $('#tempat-unit').html('');
    swal("Data yang Anda Pilih Kosong / Tidak ditemukan");
  }
}

function hapus(id){
  var wadah = $('textarea[name=unit_kerja]').val();
  var kata = wadah.split("|");

  var pakai = [];
  var j = 0;
  if(kata.length!=0){
    for (var i = 0; i < kata.length; i++) {
      if(i==id){

      }else{
        pakai[j] = kata[i];
        j++;
      }
    }
  }

  susun(pakai);
}

function hapus_b(id){
  var wadah = $('textarea[name=unit_kerja_b]').val();
  var kata = wadah.split("|");

  var pakai = [];
  var j = 0;
  if(kata.length!=0){
    for (var i = 0; i < kata.length; i++) {
      if(i==id){

      }else{
        pakai[j] = kata[i];
        j++;
      }
    }
  }

  susun_b(pakai);
}

function susun(kata){
  var html = '';
  if(kata.length!=0){
    for (var i = 0; i < kata.length; i++) {
      html+='<a href="javascript:void(0)" class="btn btn-success" style="margin-right: 10px" onclick="hapus(\''+i+'\')">'+kata[i].substring(kata[i].indexOf("_")+2, kata[i].length)+'</a>';
    }
  }

  var wadah = kata.join("|");

  $('textarea[name=unit_kerja]').html(wadah);
  $('#hasil-unit').html(html);
}

function susun_b(kata){
  var html = '';
  if(kata.length!=0){
    for (var i = 0; i < kata.length; i++) {
      html+='<a href="javascript:void(0)" class="btn btn-success" style="margin-right: 10px" onclick="hapus(\''+i+'\')">'+kata[i].substring(kata[i].indexOf("_")+2, kata[i].length)+'</a>';
    }
  }

  var wadah = kata.join("|");

  $('textarea[name=unit_kerja_b]').html(wadah);
  $('#hasil-unit').html(html);
}
</script>
@endsection
