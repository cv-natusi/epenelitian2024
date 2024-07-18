@extends('layout.main')
@section('content')

  @foreach ($pengajuan as $peng)
    @if ($peng->doc_status == 'Tolak')
      <div class="alert alert-danger" role="alert">
        {{$peng->judul_penelitian}} Ditolak | Catatan : {{$peng->catatan}} &nbsp;<a href="{{'userhome/up_doc/'.$peng->id_permohonan}}" style="font-weight: 900px;"><b>Upload Ulang (upload disini)</b></a>
      </div>
    @endif
  @endforeach

  @foreach ($hasil as $has)
    @if ($has->status_hasil == 'Tolak')
      <div class="alert alert-danger" role="alert">
        File Hasil Penelitian <b> {{$has->nama_file}} "<?php echo basename($has->judul_penelitian); ?>"</b> kami {{$has->status_hasil}}, {{ $has->catatan }}. mohon segera upload kembali.<a href="{{'upload-hasil/penelitian/'.$peng->id_permohonan}}" style="font-weight: 900px;"><b>Upload Ulang</b></a>
      </div>
    @endif
  @endforeach

  @foreach ($permohonan as $per)
  	@if ($per->surat_ijin == 'belum di ambil')
    	<div class="alert alert-danger" role="alert">
    		Surat ijin penelitian dengan judul <b>"{{ $per->judul_penelitian }}"</b> sudah bisa di ambil <a href="{{'userhome/pernyataan/'.$per->id_permohonan}}"><b>...Detail</b></a>
    	</div>
    @endif
  @endforeach
    
    <div class="col-lg-12 col-md-12 tbRes">
    <div class="col-lg-12">
      @if($category == "mhs" || $category == "admin")
      <a href="{{url('userhome/create')}}" class="btn btn-xs btn-primary"> <span class="fa fa-plus"></span> Tambah Pengajuan</a>
      <div class="clearfix" style="margin-bottom: 10px"></div>
      <table class="table">
        <thead>
          <tr>
            <th width="2%">No</th>
            <th width="10%">Judul</th>
            <th>Tempat Penelitian</th>
            <th width="10%">Tanggal Pengajuan</th>
            <th width="10%">Surat Terbit</th>
            {{-- <th width="5%">Aksi</th> --}}
            <th width="5%">Status Permohonan</th>
            <th width="5%">Hasil</th>
            <th width="5%">Status Hasil</th>
          </tr>
        </thead>
        <tbody>
          @if($permohonan->count()!=0)
            <?php
            $no = 1;
            ?>
            @foreach($data_permohonan as $mohon)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mohon->judul_penelitian }}</td>
                @if(count($mohon->row) > 0)
                  <td>
                      <ol>
                      @foreach($mohon->row as $temp)
                        <li>{{$temp->nama_tempat_penelitian}}</li>
                      @endforeach
                      </ol>
                  </td>                
                @endif
                {{-- <td>{{ $mohon->estimasi_waktu }}</td> --}}
                <td>{{ $mohon->tgl_pengajuan }}</td>
                <td>
                  @if($mohon->tgl_ambil != null && $mohon->upload_surat_izin != null)
                    {{ $mohon->tgl_ambil }}
                  @endif
                </td>
                {{-- <td> --}}
                  <?php
                  // $judul = 'Upload Persyaratan';
                  // if($mohon->status!='Pending'){
                  //   $judul = 'Detail file pendukung';
                  // }
                  // $aksi = '<a href="'.url('userhome/up_doc/'.$mohon->id_permohonan).'" class="btn btn-xs btn-primary">'.$judul.'</a>';
                  // echo $aksi;
                  ?>
                {{-- </td> --}}
                <td style="text-transform:capitalize;">
                  @if($mohon->tgl_ambil != null && $mohon->upload_surat_izin != null)
                    <button class="btn btn-success" style="text-transform: capitalize;">{{ $mohon->status }}</button><br><br>
                    <a class="" href="{{asset('uploads/file_upload_persyaratan/'.$mohon->upload_surat_izin)}}" download="SURAT_IZIN_PENELITIAN">Download Surat Izin Penelitian</a>
                  @else
                    @if($mohon->status == 'terima')
                      <button class="btn btn-warning" style="text-transform: capitalize;">Proses</button>
                    @elseif($mohon->status == 'Tolak')
                      <button class="btn btn-danger" style="text-transform: capitalize;">{{ $mohon->status }}</button>
                    @else
                      <button class="btn btn-warning" style="text-transform: capitalize;">{{ $mohon->status }}</button>
                    @endif
                  @endif
                </td>
                  
                <td>
                  @if($mohon->tgl_ambil != null && $mohon->upload_surat_izin != null && $mohon->status_hasil != 'Publish' && $mohon->status_hasil != 'Terima')
                    <div class="upload-hasil-{{$mohon->id_permohonan}}" style="display: none;"><a href="{{url('/upload-hasil/penelitian/'.$mohon->id_permohonan)}}" class="btn btn-xs btn-primary">Upload hasil penelitian</a><br><br></div>
                    <a href="https://smallseotools.com/plagiarism-checker/" target="_blank" onclick="showUploadHasil({{$mohon->id_permohonan}})" class="btn btn-info btn-xs"><i class="fa fa-link"></i> <b>Cek Plagiarsm</b></a> 
                  @elseif($mohon->status_hasil == 'Terima')
                    <button class="btn btn-xs btn-warning">Hasil Penelitian Ditinjau Admin</button>
                  @elseif($mohon->status_hasil == 'Publish')
                    <button class="btn btn-xs btn-success">Hasil Penelitian Sudah Dipublish</button>
                  @endif
                </td>
                <td>{{ $mohon->status_hasil }}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="7" style="text-align: center">..:: Belum ada pengajuan ::..</td>
            </tr>
          @endif
        </tbody>
      </table>
      
      @elseif($category == "pns")
      <a href="{{url('userhome/create')}}" class="btn btn-xs btn-primary"> <span class="fa fa-plus"></span> Tambah Penelitian</a>
      <div class="clearfix" style="margin-bottom: 10px"></div>
      <table class="table">
        <thead>
          <tr>
            <th width="2%">No</th>
            <th width="7%">Judul</th>
            <th width="20%">Tempat Penelitian</th>
            <th width="5%">Hasil</th>
            <th width="5%">Status Hasil</th>
          </tr>
        </thead>
        <tbody>
          @if($permohonan->count()!=0)
            <?php
            $no = 1;
            ?>
            @foreach($permohonan as $mohon)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mohon->judul_penelitian }}</td>
                @if(count($mohon->row) > 0)
                  <td>
                      <ol>
                      @foreach($mohon->row as $temp)
                        <li>{{$temp->nama_tempat_penelitian}}</b></li>
                      @endforeach
                      </ol>
                  </td>                
                @endif
              
                  <?php
                  // $judul = 'Upload Persyaratan';
                  // if($mohon->status!='Pending'){
                  //   $judul = 'Detail file pendukung';
                  // }
                  // $aksi = '<a href="'.url('userhome/up_doc/'.$mohon->id_permohonan).'" class="btn btn-xs btn-primary">'.$judul.'</a>';
                  // echo $aksi;
                  ?>
                <td>
                  @if($mohon->tgl_ambil != null && $mohon->status_hasil != 'Publish' && $mohon->status_hasil != 'Terima')
                    <div class="upload-hasil-{{$mohon->id_permohonan}}" style="display: none;"><a href="{{url('/upload-hasil/penelitian/'.$mohon->id_permohonan)}}" class="btn btn-xs btn-primary">Upload hasil penelitian</a><br><br></div>
                    <a href="https://smallseotools.com/plagiarism-checker/" target="_blank" onclick="showUploadHasil({{$mohon->id_permohonan}})" class="btn btn-info btn-xs"><i class="fa fa-link"></i> <b>Cek Plagiarsm</b></a> 
                  @elseif($mohon->status_hasil == 'Terima')
                    <button class="btn btn-xs btn-warning">Hasil Penelitian Ditinjau Admin</button>
                  @elseif($mohon->status_hasil == 'Publish')
                    <button class="btn btn-xs btn-success">Hasil Penelitian Sudah Dipublish</button>
                  @endif
                </td>
                <td>{{ $mohon->status_hasil }}</td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" style="text-align: center">..:: Belum Ada Penelitian ::..</td>
            </tr>
          @endif
        </tbody>
      </table>
      @endif
      
    </div>

    <div class="col-lg-12 col-md-12">
      {!! $permohonan->render() !!}
    </div>
	  <!-- <h3 id="cek" style="font-weight: bold;">Cek Plagiarism</h3>
		  <p>
			@if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa16']->indonesia !!}
          @else
            {!! $bahasa['bahasa16']->inggris !!}
          @endif
          <a href="https://smallseotools.com/plagiarism-checker/" class="btn btn-info btn-xs"><i class="fa fa-link"></i> <b>Klik disini</b></a> -->
          <!-- <a href="https://smallseotools.com/plagiarism-checker/" style="color: red;text-decoration: underline;">click here.</a></p> -->

  <hr style="  border: 1px solid DimGray;">

	<h3 style="font-weight: bold;">My Account</h3>
	  	<li><a href="{{ route('edit_profil')}}">Edit My Profile</a></li>
	  	<li><a href="{{ route('update_password') }}">Change My Password</a></li>
	  	<li><a href="{{ url('/logout')}}">Logout</a></li>
	<hr style="  border: 1px solid DimGray;">
  </div>
  <script type="text/javascript">
    function showUploadHasil(value){
      $('.upload-hasil-'+value).show();
      localStorage.setItem('cekPlagiarism','sudah');
    }
    $( document ).ready(function() {
      if(localStorage.getItem('cekPlagiarism') == 'sudah'){
        $('#upload-hasil').show();
      }
    });
  	var lbrRes = $('.tbRes').width();
  	$('.tblRes').attr('style','max-width:'+lbrRes+'px;overflow-x:scroll;')
  	console.log(lbrRes);
  </script>
@endsection
