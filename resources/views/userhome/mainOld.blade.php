@extends('layout.main')
@section('content')

  @foreach ($pengajuan as $peng)
    @if ($peng->doc_status == 'Tolak')
      <div class="alert alert-danger" role="alert">
        File Pendukung <b> {{$peng->nama_jenis}} "<?php echo basename($peng->nama_file); ?>"</b> kami {{$peng->doc_status}}, {{ $peng->catatan }}. mohon segera upload kembali.<a href="{{'userhome/up_doc/'.$peng->id_permohonan}}" style="font-weight: 900px;"><b>Upload Ulang</b></a>
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
  {{-- <div class="col-lg-12 col-md-12 tbRes">
  	<h3 style="font-weight: bold;">USERHOME</h3>
	  	<div class="row">
		  <div class="col-sm-4 mb-3 mb-md-0">
		    <div class="panel">
		      <div class="panel-body" style="background-color: #add8e678;">
		        <h5 class="panel-title"></h5>
		        <p class="panel-text" style="font-weight: bold;">Buat Pengajuan.</p>
		        <a href="{{url('userhome/create')}}" class="btn btn-info btn-xs"><i class="fa fa-file"></i> <b>Add Form Pengajuan</b></a>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-4 mb-3 mb-md-0">
		    <div class="panel">
		      <div class="panel-body" style="background-color: #add8e678;">
		        <h5 class="panel-title"></h5>
		        <p class="panel-text" style="font-weight: bold;">Upload/Submiting (*hasil penelitian disini).</p>
		        <a href="{{url('userhome/submit/1')}}" class="btn btn-info btn-xs"><i class="fa fa-upload"></i> <b>Upload Hasil Penelitian</b></a>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-4 mb-3 mb-md-0">
		    <div class="panel">
		      <div class="panel-body" style="background-color: #add8e678;">
		        <h5 class="panel-title"></h5>
		        <p class="panel-text" style="font-weight: bold;">Semua Pengajuan*(Upload berkas).</p>
		        <a href="{{url('userhome/view')}}" class="btn btn-info btn-xs"><i class="fa fa-list"></i> <b>View Details Pengajuan</b></a>
		      </div>
		    </div>
		  </div>
		</div>
	  <hr style="  border: 1px solid DimGray;">
	   <div class="tblRes">
		  <table class="table table-striped">
		    <thead>
		    <tr>
		        <th>Active</th>
		        <th>Review</th>
		        <th>Revisi</th>
		        <th>Archive</th>
		    </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td><a href="{{url('userhome/active')}}" style="text-decoration: underline;">({{$submissions_count}})Active</a></td>
		        <td><a href="{{url('userhome/review')}}" style="text-decoration: underline;">({{$review_count}})Review</a></td>
		        <td><a href="{{url('userhome/revisi')}}" style="text-decoration: underline;">({{$revisi_count}})Revisi</a></td>
		        <td><a href="{{url('userhome/archive')}}" style="text-decoration: underline;">({{$publish_count}})Archive</a></td>
		      </tr>
		    </tbody>
		  </table>
	  </div> --}}
    
    <div class="col-lg-12 col-md-12 tbRes">
    <div class="col-lg-12">
      <a href="{{url('userhome/create')}}" class="btn btn-xs btn-primary"> <span class="fa fa-plus"></span> Tambah Pengajuan</a>
      <div class="clearfix" style="margin-bottom: 10px"></div>
      <table class="table">
        <thead>
          <tr>
            <th width="2%">No</th>
            <th width="10%">Judul</th>
            <th>Tempat Penelitian -> Status</th>
            <th width="10%">Estimasi Surat</th>
            <th width="10%">Pengambilan Surat</th>
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
            @foreach($permohonan as $mohon)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mohon->judul_penelitian }}</td>
                @if(count($mohon->row) > 0)
                  <td>
                      <ol>
                      @foreach($mohon->row as $temp)
                        <li>{{$temp->nama_tempat_penelitian}} <b>->{{ $temp->status_verifikasi }}</b></li>
                      @endforeach
                      </ol>
                  </td>                
                @endif
                <td>{{ $mohon->estimasi_waktu }}</td>
                <td>{{ $mohon->tgl_ambil }}</td>
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
                <td style="text-transform:capitalize;">{{ $mohon->status }}</td>
                <td>
                  <?php
                  if($mohon->tgl_ambil!='' || $mohon->tgl_ambil!=null){
                    echo '<a href="'.url('/upload-hasil/penelitian/'.$mohon->id_permohonan).'" class="btn btn-xs btn-primary">Upload hasil penelitian</a>';
                  }
                  ?>
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
    </div>

    <div class="col-lg-12 col-md-12">
      {!! $permohonan->render() !!}
    </div>
	  <h3 style="font-weight: bold;">Cek Plagiarism</h3>
		  <p>
			@if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa16']->indonesia !!}
          @else
            {!! $bahasa['bahasa16']->inggris !!}
          @endif
          <a href="https://smallseotools.com/plagiarism-checker/" class="btn btn-info btn-xs"><i class="fa fa-link"></i> <b>Klik disini</b></a>
          <!-- <a href="https://smallseotools.com/plagiarism-checker/" style="color: red;text-decoration: underline;">click here.</a></p> -->
	<hr style="  border: 1px solid DimGray;">
	<h3 style="font-weight: bold;">My Account</h3>
	  	<li><a href="{{ route('edit_profil')}}">Edit My Profile</a></li>
	  	<li><a href="{{ route('update_password') }}">Change My Password</a></li>
	  	<li><a href="{{ url('/logout')}}">Logout</a></li>
	<hr style="  border: 1px solid DimGray;">
  </div>
  <script type="text/javascript">
  	var lbrRes = $('.tbRes').width();
  	$('.tblRes').attr('style','max-width:'+lbrRes+'px;overflow-x:scroll;')
  	console.log(lbrRes);
  </script>
@endsection
