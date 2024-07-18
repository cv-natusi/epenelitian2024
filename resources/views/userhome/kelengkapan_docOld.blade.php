@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
    <a href="{{url('userhome')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
    <div class="section-header">
      <h4 style="font-weight: bold;">File Pendukung</h4>
      <p>Upload file-file sesuai dengan isian ketentuan form dibawah ini.</p>
      <hr style="  border: 1px solid DimGray;">
    </div>
  </div>
  <div class="col-lg-12 col-md-12">
    <form class="form-horizontal" method="post" action="{{ route('do_uploadDoc') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$id_per}}">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- FOrm yg kiri dimasukkan disini -->
        <?php
        $i=0;
        $berkas_required = [];
        ?>
        @foreach ($nama_form as $key)
          <div class="form-row" style="padding: -10px">
            <div class="form-group">
              <?php
              $doc = App\Doc_Pendukung::where('jenis_file',$key->id_jenis_file)->where('permohonan_id',$id_per)->first();
              ?>
              <label class="col-sm-5 col-form-label" style="@if(!empty($doc)) @if($doc->acc_admin=='Tolak' || $doc->acc_kasi=='Tolak' || $doc->acc_kabid=='Tolak' || $doc->acc_kadin=='Tolak') color:red @endif @endif"> {{ $key->nama_form }} :</label>
              <div class="col-sm-7">
                <input type="hidden" name="id_jenis_file[]" value="{{ $key->id_jenis_file }}">
                @if($permohonan->status=='Pending' || $permohonan->status=='Tolak')
                  <input type="file" accept=".pdf" class="form-control" id="file_{{$key->id_jenis_file}}" name="file_pendukung{{$key->id_jenis_file}}" value="">
                @endif
                <?php
                if(!empty($doc)){
                  if($doc->nama_file!=''){
                    if(file_exists('uploads/semua/'.$doc->nama_file)){
                      ?>
                      <div class="">
                        <a href="javascript:void(0)" onclick="modal_view('{{$doc->nama_file}}')" class="btn btn-success" data-toggle="modal" data-target="#myModal">File Terlampir</a>
                        <br><b>Catatan : </b>{{ $doc->catatan }}
                      </div>
                      <?php
                      if($doc->acc_admin=='Tolak' || $doc->acc_kasi=='Tolak' || $doc->acc_kabid=='Tolak' || $doc->acc_kadin=='Tolak'){
                      }else{
                        array_push($berkas_required,'file_'.$key->id_jenis_file);
                      }
                    }
                  }
                }
                ?>                
              </div>
            </div>
          </div>
          <?php
          $i++;
          ?>
        @endforeach

        @if($permohonan->status=='Pending' || $permohonan->status=='Tolak')
          <div class="col-lg-12 col-md-12">
            <label>
              <input type="checkbox" name="kirim" value="kirim" onchange="required_file()"> Centang untuk mengirim permohonan ke dinas.
            </label>
          </div>

          <div class="form-group" style="float: right;">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
          </div>
        @endif
      </div>
    </form>
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
@endsection
@section('js')
  <script type="text/javascript">
  @if(count($berkas_required)==$nama_form->count())
  $('input[name=kirim]').prop('checked',true);
  @endif

  function modal_view(file){
    var ext = file.split('.');
    var html = '';
    if(ext[1]=='pdf' || ext[1]=='PDF'){
      html = '<iframe src="{{url('/')}}/uploads/semua/'+file+'" style="height: 70vh;width: 100%"></iframe>';
    }else{
      html = '<img src="{{url('/')}}/uploads/semua/'+file+'" style="width: 100%">';
    }

    $('.modal-body').html(html);
  }

  function required_file(){
    var cek = $('input[name=kirim]').is(':checked');
    if(cek==true){
      @foreach ($nama_form as $key)
      @if(in_array('file_'.$key->id_jenis_file,$berkas_required))
      @else
      $('#file_{{$key->id_jenis_file}}').attr('required','required');
      @endif
      @endforeach
    }else{
      @foreach ($nama_form as $key)
      $('#file_{{$key->id_jenis_file}}').removeAttr('required');
      @endforeach
    }
  }

   $('input[type=file]').on('change',function (e) {
        var extValidation = new Array(".pdf");
        var fileExt = e.target.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (extValidation.indexOf(fileExt) < 0) {
            swal('Extensi File Tidak Valid !','Upload file bertipe .pdf, untuk dapat melakukan upload data...','warning')
            $(this).val("")
            return false;
        }
        else return true;
    })
  </script>
@endsection
