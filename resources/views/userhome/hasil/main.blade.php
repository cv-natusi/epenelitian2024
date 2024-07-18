@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12 tbRes">
    <form action="{{route('simpan_hasil_penelitian')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <a href="{{url('userhome')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
      <h3 style="font-weight: bold;">Upload hasil penelitian</h3>
      <h5>Detail Permohonan Kegiatan</h5>
      <input type="hidden" name="id_permohonan" value="{{$permohonan->id_permohonan}}">
      <table class="table table-bordered">
        <tr>
          <td width="20%" style="font-weight: bold">Judul Kegiatan</td>
          <td>:</td>
          <td width="30%">{{$permohonan->judul_penelitian}}</td>
          <td width="20%" style="font-weight: bold">Nama</td>
          <td>:</td>
          <td width="30%">{{$permohonan->first_name}} {{($permohonan->middle_name!=null) ? $permohonan->middle_name : ''}} {{$permohonan->last_name}}</td>
        </tr>
        <tr>
          <td width="20%" style="font-weight: bold">Tempat Kegiatan</td>
          <td>:</td>                      
          <td width="30%">
              <ol>
              @foreach($verifikasi as $temp)
                <li>{{$temp->nama_tempat_penelitian}}</li>
              @endforeach
              </ol>
          </td>
          <td width="20%" style="font-weight: bold">Unit Kerja</td>
          <td>:</td>
          @if($permohonan->unit_kerja != '')
          <td width="30%">{{$permohonan->unit_kerja}} ({{$permohonan->unit_instansi}})</td>
          @else
          <td width="30%">{{$permohonan->unit_instansi}}</td>
          @endif
        </tr>
        <tr>
          <td width="20%" style="font-weight: bold">Waktu Kegiatan</td>
          <td>:</td>
          <td width="30%">{{$permohonan->tgl_awal}} <b>sampai</b> {{$permohonan->tgl_akhir}}</td>
          <td width="20%" style="font-weight: bold">No Identitas</td>
          <td>:</td>
          <td width="30%">{{$permohonan->no_identitas}}</td>
        </tr>
      </table>

      <div class="col-lg-12 col-md-12">
        <h3>Abstrak</h3>
        @if($permohonan->status_hasil=='Diterima Admin' || $permohonan->status_hasil=='Publish')
          {!! (!empty($hasil)) ? $hasil->abstrak : '' !!}
        @else
          <textarea class="form-control disablecopypaste" value="" name="abstrak" required="" onkeypress="return cekAngkaHuruf(event)"> {{(!empty($hasil)) ? $hasil->abstrak : ''}} </textarea>
          <!-- <textarea class="form-control disablecopypaste" value="" id="summary-ckeditor" name="abstrak" required="" onkeypress="return cekAngkaHuruf(event)"> {{(!empty($hasil)) ? $hasil->abstrak : ''}} </textarea> -->
        @endif
        <h3>File yang harus diupload</h3>
        <?php
        $berkas_required = [];
        ?>
        @foreach($jenis_hasil as $jh)
          <div class="form-group">
            <label class="col-lg-4 col-md-4">{{ $jh->nama_jenis }}</label>
            <div class="col-lg-8 col-md-8">
              @if($permohonan->status_hasil=='Diterima Admin' || $permohonan->status_hasil=='Publish')
              @else
                <input type="file" id="file_{{$jh->id_jenis_hasil}}" name="file_{{$jh->id_jenis_hasil}}" class="form-control" accept="application/pdf"></br>
              @endif
              <?php
              $doc = App\DocHasil::where('permohonan_id',$permohonan->id_permohonan)->where('jenis_hasil_id',$jh->id_jenis_hasil)->first();
              if(!empty($doc)){
                if($doc->nama_file!=''){
                  if(file_exists('uploads/hasil_penelitian/'.$doc->nama_file)){
                    ?>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="modal_view('{{$doc->nama_file}}')" data-toggle="modal" data-target="#myModal">File terlampir</a>
                    <?php
                    array_push($berkas_required,'file_'.$jh->id_jenis_hasil);
                  }
                }
              }
              ?>
            </div>
          </div>
        @endforeach
        @if(!empty($hasil))
          <h3>Catatan</h3>
          <p>{{ $hasil->catatan }}</p>
        @endif
      </div>
          <label>
            <input type="checkbox" name="kirim" onchange="required_file()" required> Jika anda yakin centang untuk di koreksi Admin</label>
            {{-- <input type="checkbox" name="kirim" onchange="required_file()" required> Jika anda yakin, centang untuk di publish</label> --}}
          <br>
          <input type="submit" name="" value="Upload" class="btn btn-primary">        
    </form>

    <!-- <a href="https://smallseotools.com/plagiarism-checker/" style="color: red;text-decoration: underline;">click here.</a></p> -->
    <hr style="  border: 1px solid DimGray;">
    <h3 style="font-weight: bold;">My Account</h3>
    <li><a href="{{ route('edit_profil')}}">Edit My Profile</a></li>
    <li><a href="{{ route('update_password') }}">Change My Password</a></li>
    <li><a href="{{ url('/logout')}}">Logout</a></li>
    <hr style="  border: 1px solid DimGray;">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal View</h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">

      $(document).ready(function () {
      $('input.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
      $('textarea.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
    });
 
    function cekAngkaHuruf(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || (charCode >= 48 && charCode <= 57) || (charCode == 44 || charCode == 46)  || charCode == 32 || charCode == 45 || charCode == 47 || charCode == 64){
        return true;
      }else{
        return false;
      }
    }

    function modal_view(file){
      var ext = file.split('.');
      var html = '';
      if(ext[1]=='pdf' || ext[1]=='PDF'){
        html = '<iframe src="{{url('/')}}/uploads/hasil_penelitian/'+file+'" style="height: 70vh;width: 100%"></iframe>';
      }else{
        html = '<img src="{{url('/')}}/uploads/hasil_penelitian/'+file+'" style="width: 100%">';
      }

      $('.modal-body').html(html);
    }

    $( document ).ready(function() {
      required_file();
    });

    function required_file(){
      var cek = $('input[name=kirim]').is(':checked');
      if(cek==true){
        $('#summary-ckeditor').attr('required','required');
        @foreach($jenis_hasil as $jh)
        @if(in_array('file_'.$jh->id_jenis_hasil,$berkas_required))
        @else
        $('#file_{{$jh->id_jenis_hasil}}').attr('required','required');
        @endif
        @endforeach
      }else{
        $('#summary-ckeditor').removeAttr('required');
        @foreach($jenis_hasil as $jh)
        $('#file_{{$jh->id_jenis_hasil}}').removeAttr('required');
        @endforeach
      }
    }

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
  </script>
@endsection
