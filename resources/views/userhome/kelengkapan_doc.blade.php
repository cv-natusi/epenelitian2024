@extends('layout.main')
@section('content')
<form class="form-horizontal" method="post" action="{{ route('store_permohonan') }}" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="hidden" name="id_permohonan" value="{{$permohonan[0]->id_permohonan}}"/>
  <div class="alert alert-danger" role="alert">
    {{$permohonan[0]->judul_penelitian}} Ditolak<br> 
    Catatan : {{$permohonan[0]->catatan}}
  </div>
  {{-- File Lama Start --}}
  <div class="col-lg-12 col-md-12">
    <div class="section-header">
        <h4 style="font-weight: bold;">File Persyaratan Lama</h4>
        <p>File Persyaratan Lama Sebelum Revisi.</p>
        <hr style="  border: 1px solid DimGray;">
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 30px">
    {{-- anas --}}
    {{-- new --}}
    @foreach($nama_form as $keyLama => $itemLama)
      <div class="form-group row">
          <label class="col-sm-4 col-form-label"> {{$itemLama->nama_jenis}} Lama:</label>
          <div class="col-sm-8">
            <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan[$keyLama]?$permohonan[$keyLama]->file_doc:''}}" >Download File Lama</a>
          </div>
      </div>
    @endforeach
    {{-- new --}}
    {{-- anas --}}

    {{-- anas yg disabled --}}
    {{-- old --}}
    {{-- <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Proposal Penelitian Lama:</label>
        <div class="col-sm-8">
          <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan->upload_proposal_penelitian}}" download="LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON">Download File Lama</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Surat Pengantar dari Universitas/Instansi Lain Lama:</label>
        <div class="col-sm-8">
          <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan->upload_surat_pengantar}}" download="LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON">Download File Lama</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Surat Rekomendasi Bakesbangpol Kabupaten Sidoarjo Lama:</label>
        <div class="col-sm-8">
          <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan->upload_surat_rekomendasi}}" download="LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON">Download File Lama</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Surat Pernyataan Peneliti Lama:</label>
        <div class="col-sm-8">
          <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan->upload_surat_pernyataan}}" download="LAMPIRAN_01_LEMBAR_PERSETUJUAN_PEMEGANG_PROGRAM_YG_AKAN_DITELITI">Download File Lama</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Surat Kesediaan Pemegang Program Instansi yang akan diteliti Lama:</label>
        <div class="col-sm-8">
          <a class="btn btn-warning col-sm-12" href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan->upload_surat_kesediaan}}" download="LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON">Download File Lama</a>
        </div>
    </div> --}}
    {{-- old --}}
    {{-- anas yg disabled --}}
  </div>
  {{-- File Lama End --}}
  <div class="col-lg-12 col-md-12">
    <div class="section-header">
        <h4 style="font-weight: bold;">Form Upload Persyaratan</h4>
        <p>Revisi Formulir Permohonan Persyaratan.</p>
        <hr style="  border: 1px solid DimGray;">
    </div>
  </div>
  <div class="col-lg-12 col-md-12">
    <div class="col-lg-12 col-md-12 col-sm-12">
      {{-- anas --}}
      {{-- new form --}}
      @foreach($nama_form as $keyNamaForm => $itemNamaForm)
        @if($itemNamaForm->is_statis != 1)
        <div class="form-group row">
          <label class="col-sm-4 col-form-label"> {{ $itemNamaForm->nama_jenis }}:</label>
          @if($permohonan[$keyNamaForm]->doc_status != 'Terima')
          <div class="col-sm-6">
              <input type=hidden name="id_item_permohonan[]" value="{{ $permohonan[$keyNamaForm]->id_item_permohonan }}">
              <input type=hidden name="id_jenis_file[]" value="{{ $itemNamaForm->id_jenis_file }}">
              <input type="file" class="form-control disablecopypaste" name="upload_doc_pendukung[]" placeholder="Upload {{ $itemNamaForm->nama_jenis }}">
              <p style="color: red">Dokumen ditolak {{$permohonan[$keyNamaForm]->catatan_admin}}</p>
          </div>
          <div class="col-sm-2">
              <a href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan[$keyNamaForm]?$permohonan[$keyNamaForm]->file_doc:''}}" target="blank" class="btn btn-info">lihat dan koreksi</a>
          </div>
          @else
          <div class="col-sm-8">
            <p>Dokumen diterima</p>
          </div>
          @endif
        </div>
        @else
        <div class="form-group row">
          <label class="col-sm-4 col-form-label"> {{$itemNamaForm->nama_jenis}}:</label>
          @if($permohonan[$keyNamaForm]->doc_status != 'Terima')
          <div class="col-sm-2">
            <a class="btn btn-primary col-sm-12" href="{{asset('lampiran/'.$itemNamaForm->doc)}}" download="{{$itemNamaForm->doc}}">Download</a>
          </div>
          <div class="col-sm-4">
            <input type=hidden name="id_item_permohonan_statis[]" value="{{ $permohonan[$keyNamaForm]->id_item_permohonan }}">
            <input type=hidden name="id_jenis_file_statis[]" value="{{ $itemNamaForm->id_jenis_file }}">
            <input type="file" class="form-control" accept="application/pdf" name="upload_doc_pendukung_statis[]" placeholder="Upload {{$itemNamaForm->nama_jenis}}" required>
            <label class="custom-control-label" style="color: red;">*download dulu file aslinya.</label>
          </div>
          <p style="color: red">Dokumen ditolak {{$permohonan[$keyNamaForm]->catatan_admin}}</p>
          <div class="col-sm-2">
            <a href="{{ url('/') }}/uploads/file_upload_persyaratan/{{$permohonan[$keyNamaForm]?$permohonan[$keyNamaForm]->file_doc:''}}" target="blank" class="btn btn-info">lihat dan koreksi</a>
          </div>
          @else
          <div class="col-sm-6">
            <p>Dokumen diterima</p>
          </div>
          @endif
        </div>
        @endif
      @endforeach
      {{-- end new form --}}
      {{-- anass --}}
      
      {{-- anas yg disabled --}}
      {{-- old form --}}
      {{-- <div class="form-group row">
          <label class="col-sm-4 col-form-label"> Proposal Penelitian:</label>
          <div class="col-sm-6">
              <input type="file" class="form-control disablecopypaste" name="upload_proposal_penelitian" placeholder="Upload Proposal Penelitian">
          </div>
          <div class="col-sm-2">
              <button type="button" class="btn btn-info">lihat dan koreksi</button>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-4 col-form-label"> Surat Pengantar dari Universitas/Instansi Lain:</label>
          <div class="col-sm-6">
              <input type="file" class="form-control disablecopypaste" name="upload_surat_pengantar" placeholder="Upload Surat Pengantar">
          </div>
          <div class="col-sm-2">
              <button type="button" class="btn btn-info">lihat dan koreksi</button>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-4 col-form-label"> Surat Rekomendasi Bakesbangpol Kabupaten Sidoarjo:</label>
          <div class="col-sm-6">
              <input type="file" class="form-control disablecopypaste" name="upload_surat_rekomendasi" placeholder="Upload Surat rekomendasi">
          </div>
          <div class="col-sm-2">
              <button type="button" class="btn btn-info">lihat dan koreksi</button>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-4 col-form-label"> Surat Pernyataan Peneliti:</label>
          <div class="col-sm-2">
            <a class="btn btn-primary col-sm-12" href="{{asset('lampiran/LAMPIRAN_01_LEMBAR_PERSETUJUAN_PEMEGANG_PROGRAM_YG_AKAN_DITELITI.docx')}}" download="LAMPIRAN_01_LEMBAR_PERSETUJUAN_PEMEGANG_PROGRAM_YG_AKAN_DITELITI">Download</a>
          </div>
          <div class="col-sm-4">
            <input type="file" class="form-control disablecopypaste" name="upload_surat_pernyataan" placeholder="Upload Surat Pernyataan" required>
          </div>
          <div class="col-sm-2">
              <button type="button" class="btn btn-info">lihat dan koreksi</button>
          </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-4 col-form-label"> Surat Kesediaan Pemegang Program Instansi yang akan diteliti:</label>
          <div class="col-sm-2">
            <a class="btn btn-primary col-sm-12" href="{{asset('lampiran/LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON.docx')}}" download="LAMPIRAN_02_SURAT_PERNYATAAN_PEMOHON">Download</a>
          </div>
          <div class="col-sm-4">
              <input type="file" class="form-control disablecopypaste" name="upload_surat_kesediaan" placeholder="Upload Surat Kesediaan" required>
              <label class="custom-control-label" style="color: red;">*download dulu file aslinya.</label>
          </div>
          <div class="col-sm-2">
              <button type="button" class="btn btn-info">lihat dan koreksi</button>
          </div>
      </div> --}}
      {{-- end old form --}}
      {{-- anas yg disabled --}}

      {{-- <div class="col-lg-12 col-md-12">
        <label>
          <input type="checkbox" name="kirim" value="kirim" id="kirim"> Centang untuk mengirim permohonan ke dinas.
        </label>
      </div> --}}
      <div class="form-group" style="float: right;">
          <button type="submit" class="btn btn-success">SIMPAN</button>
          <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
      </div>
    </div>
  </div>
</form>
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


function set_unit(unit){
  $('#unit_kerja').val(unit.substring(unit.indexOf("_")+2, unit.length));
  $('#unit_kerja_hidden').val(unit);
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
</script>
@endsection
