@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
    <a href="{{url('userhome')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
  	<h3>Detail data Pengajuan</h3>
  	<hr style="  border: 1px solid DimGray;">

    <div class="tbRes">
      <table class="table table-striped">
        <thead>
          <tr class="info">
            <th>ID</th>
            <th>Judul Penelitian</th>
            <th>Jenis Penelitian</th>
            <th>Status Permohonan</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($permohonan as $key  )
        <?php 
              $terima = DB::table('doc_pendukung')->where('permohonan_id', $key->id_permohonan)
                                      ->where('doc_status','terima')->get();

              $tolak = DB::table('doc_pendukung')->where('permohonan_id', $key->id_permohonan)
                                      ->where('doc_status','tolak')->get();

              $status_doc = DB::table('doc_pendukung')->where('permohonan_id', $key->id_permohonan)
                      ->where('doc_status','pending')->get(); 
          ?>

        <tr>
            <td>{{$key->id_permohonan}}</td>
            <td>{{$key->judul_penelitian}}</td>
            <td>{{$key->jenis_penelitian->nama_jenis}}</td>
            <td>
              <!-- permohonan diterima, doc. diterima, surat belum -->
              @if (count($terima)>=2 && $key->surat_ijin == "" OR $key->surat_ijin == "belum")
                <span>menunggu surat ijin diterbitkan</span>

              <!-- permohonan diterima, doc.di proses -->
              @elseif (count($status_doc)!=0)
                <span>dokumen pendukung sedang di review <i class="fa fa-refresh"></i></span>

              <!-- permohonan diterima, doc.di tolak -->
              @elseif (count($tolak)!=0)
                <span>doc. pendukung di tolak </span> <a href="{{url('userhome/up_doc/'.$key->id_permohonan)}}" style="text-decoration: underline; color: red;"><b>upload ulang</b></a> 

              <!-- permohonan status menunggu -->
              @elseif ($key->status == 'menunggu')        
                <span>sedang di proses <i class="fa fa-refresh"></i></span>  

              <!-- permohonan ditolak -->
              @elseif ($key->status == 'tolak')        
                <span>Judul Ditolak</span> <a href="{{url('userhome/create')}}" style="text-decoration: underline; color: red;"> <b>ajukan judul yang lain</b></a>   

              <!-- permohonan diterima, doc. diterima, surat sudah diterima & konfirmasi -->
              @elseif ($key->surat_ijin == 'sudah' && $key->status == 'terima')
                <span>surat ijin sudah diterima</span>

              <!-- permohonan diterima, doc. diterima, surat sudah diterima & belum konfirmasi -->
              @elseif ($key->surat_ijin == 'belum di ambil' && $key->status == 'terima')
                <span>surat ijin sudah diterbitkan</span> <a href="{{url('userhome/pernyataan/'.$key->id_permohonan)}}" style="text-decoration: underline; color: red;"><b>konfirmasi</b></a>

              @else
                  <span>permohonan diterima </span> <a href="{{url('userhome/up_doc/'.$key->id_permohonan)}}" style="text-decoration: underline; color: red;"><b>upload doc. pendukung</b></a> 
              @endif

            </td>
            <td>
              <a href="{{url('userhome/view/details/'.$key->id_permohonan)}}" style="text-decoration: underline;">Details Dokumen</a>
            </td>
          </tr>
        @endforeach           
        </tbody>
      </table>
    </div>

    <hr style="  border: 1px solid DimGray;">  
  </div>
   <script type="text/javascript">
    var lbrRes = $('.tbRes').width();
    $('.tblRes').attr('style','max-width:'+lbrRes+'px;overflow-x:scroll;')
    console.log(lbrRes);
  </script>
@endsection
