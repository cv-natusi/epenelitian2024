@extends('layout.main')
@section('content')

@if($category == "pns")
  @include('userhome.form_pns')
@else
  @include('userhome.form_mahasiswa')
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


$('input[name=tgl_surat_pimpinan]').datetimepicker({
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  format: 'yyyy-mm-dd',
  minView: 2,
  forceParse: 0,
});

$('input[name=tgl_surat_rekom]').datetimepicker({
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
