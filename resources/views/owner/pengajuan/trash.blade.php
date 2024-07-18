
@if (!empty($pengajuan))
<div class="form-group m-t-0 m-b-25">
  <button class="accordion1 btn btn-default btn-doc">Proposal Penelitian</button>
  <div class="panel-accordion1" style="display: none;">
    @if ($pengajuan->upload_proposal_penelitian != '')
      @if(file_exists('uploads/file_upload_persyaratan/'.$pengajuan->upload_proposal_penelitian))
        <?php $ext = explode('.',$pengajuan->upload_proposal_penelitian); ?>
        @if($ext[1]=='pdf' || $ext[1]=='PDF')
          <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_proposal_penelitian}}" width="100%" height="550px"></iframe>
        @else
          <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_proposal_penelitian}}" alt="" style="width: 100%">
        @endif

        {{-- aksi trima tolak tiap accordion --}}
        
        @if(Auth::getUser()->level==1)
          @if ($pengajuan->accadmin_proposal_penelitian == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->accadmin_proposal_penelitian == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->accadmin_proposal_penelitian=='Menunggu' || $pengajuan->accadmin_proposal_penelitian=='' || $pengajuan->accadmin_proposal_penelitian==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-proposal_penelitian">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_proposal_penelitian" id="catatanadmin_proposal_penelitian" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','proposal_penelitian')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','proposal_penelitian')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==2)
          @if ($pengajuan->acckasi_proposal_penelitian == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acckasi_proposal_penelitian == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acckasi_proposal_penelitian=='Menunggu' || $pengajuan->acckasi_proposal_penelitian=='' || $pengajuan->acckasi_proposal_penelitian==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-proposal_penelitian">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_proposal_penelitian" id="catatanadmin_proposal_penelitian" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','proposal_penelitian')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','proposal_penelitian')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==4)
          @if ($pengajuan->acc_kabid == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kabid == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kabid=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-proposal_penelitian">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_proposal_penelitian" id="catatanadmin_proposal_penelitian" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','proposal_penelitian')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','proposal_penelitian')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==5)
          @if ($pengajuan->acc_kadin == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kadin == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kadin=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-proposal_penelitian">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_proposal_penelitian" id="catatanadmin_proposal_penelitian" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','proposal_penelitian')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','proposal_penelitian')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @else
        @endif

      @else
        <?php echo $status = 'Tidak ada file'; ?>
      @endif
      @if($pengajuan->jenis_file==2 || $pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6">
            <b>No Surat</b> : {{$pengajuan->no_surat}}
          </div>
          <div class="col-lg-6 col-md-6">
            <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($pengajuan->tanggal_surat)}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
      @if($pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-12 col-md-6">
            <b>Penandatangan Surat Pengantar</b> : {{$pengajuan->jabatan_pj .' ('. $pengajuan->nama_pj .')'}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
    @endif
  </div>
  <button class="accordion2 btn btn-default btn-doc">Surat Pengantar dari Universitas/Instansi Lain</button>
  <div class="panel-accordion2" style="display: none;">
    @if ($pengajuan->upload_surat_pengantar != '')
      @if(file_exists('uploads/file_upload_persyaratan/'.$pengajuan->upload_surat_pengantar))
        <?php $ext = explode('.',$pengajuan->upload_surat_pengantar); ?>
        @if($ext[1]=='pdf' || $ext[1]=='PDF')
          <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_pengantar}}" width="100%" height="550px"></iframe>
        @else
          <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_pengantar}}" alt="" style="width: 100%">
        @endif

        
        {{-- aksi trima tolak tiap accordion --}}
        
        @if(Auth::getUser()->level==1)
          @if ($pengajuan->accadmin_surat_pengantar == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->accadmin_surat_pengantar == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->accadmin_surat_pengantar=='Menunggu' || $pengajuan->accadmin_surat_pengantar=='' || $pengajuan->accadmin_surat_pengantar==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pengantar">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pengantar" id="catatanadmin_surat_pengantar" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pengantar')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pengantar')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==2)
          @if ($pengajuan->acckasi_surat_pengantar == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acckasi_surat_pengantar == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acckasi_surat_pengantar=='Menunggu' || $pengajuan->acckasi_surat_pengantar=='' || $pengajuan->acckasi_surat_pengantar==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pengantar">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pengantar" id="catatanadmin_surat_pengantar" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pengantar')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pengantar')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==4)
          @if ($pengajuan->acc_kabid == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kabid == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kabid=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pengantar">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pengantar" id="catatanadmin_surat_pengantar" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pengantar')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pengantar')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==5)
          @if ($pengajuan->acc_kadin == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kadin == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kadin=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pengantar">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pengantar" id="catatanadmin_surat_pengantar" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pengantar')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pengantar')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @else
        @endif

      @else
        <?php echo $status = 'Tidak ada file'; ?>
      @endif
      @if($pengajuan->jenis_file==2 || $pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6">
            <b>No Surat</b> : {{$pengajuan->no_surat}}
          </div>
          <div class="col-lg-6 col-md-6">
            <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($pengajuan->tanggal_surat)}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
      @if($pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-12 col-md-6">
            <b>Penandatangan Surat Pengantar</b> : {{$pengajuan->jabatan_pj .' ('. $pengajuan->nama_pj .')'}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
    @endif
  </div>
  <button class="accordion3 btn btn-default btn-doc">Surat Rekomendasi Bakesbangpol Kabupaten Sidoarjo</button>
  <div class="panel-accordion3" style="display: none;">
    @if ($pengajuan->upload_surat_rekomendasi != '')
      @if(file_exists('uploads/file_upload_persyaratan/'.$pengajuan->upload_surat_rekomendasi))
        <?php $ext = explode('.',$pengajuan->upload_surat_rekomendasi); ?>
        @if($ext[1]=='pdf' || $ext[1]=='PDF')
          <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_rekomendasi}}" width="100%" height="550px"></iframe>
        @else
          <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_rekomendasi}}" alt="" style="width: 100%">
        @endif


        {{-- aksi trima tolak tiap accordion --}}
        
        @if(Auth::getUser()->level==1)
          @if ($pengajuan->accadmin_surat_rekomendasi == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->accadmin_surat_rekomendasi == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->accadmin_surat_rekomendasi=='Menunggu' || $pengajuan->accadmin_surat_rekomendasi=='' || $pengajuan->accadmin_surat_rekomendasi==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_rekomendasi">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_rekomendasi" id="catatanadmin_surat_rekomendasi" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_rekomendasi')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_rekomendasi')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==2)
          @if ($pengajuan->acckasi_surat_rekomendasi == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acckasi_surat_rekomendasi == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acckasi_surat_rekomendasi=='Menunggu' || $pengajuan->acckasi_surat_rekomendasi=='' || $pengajuan->acckasi_surat_rekomendasi==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_rekomendasi">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_rekomendasi" id="catatanadmin_surat_rekomendasi" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_rekomendasi')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_rekomendasi')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==4)
          @if ($pengajuan->acc_kabid == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kabid == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kabid=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_rekomendasi">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_rekomendasi" id="catatanadmin_surat_rekomendasi" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_rekomendasi')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_rekomendasi')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==5)
          @if ($pengajuan->acc_kadin == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kadin == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kadin=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_rekomendasi">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_rekomendasi" id="catatanadmin_surat_rekomendasi" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_rekomendasi')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_rekomendasi')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @else
        @endif

      @else
        <?php echo $status = 'Tidak ada file'; ?>
      @endif
      @if($pengajuan->jenis_file==2 || $pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6">
            <b>No Surat</b> : {{$pengajuan->no_surat}}
          </div>
          <div class="col-lg-6 col-md-6">
            <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($pengajuan->tanggal_surat)}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
      @if($pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-12 col-md-6">
            <b>Penandatangan Surat Pengantar</b> : {{$pengajuan->jabatan_pj .' ('. $pengajuan->nama_pj .')'}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
    @endif
  </div>
  <button class="accordion4 btn btn-default btn-doc">Surat Pernyataan Peneliti</button>
  <div class="panel-accordion4" style="display: none;">
    @if ($pengajuan->upload_surat_pernyataan != '')
      @if(file_exists('uploads/file_upload_persyaratan/'.$pengajuan->upload_surat_pernyataan))
        <?php $ext = explode('.',$pengajuan->upload_surat_pernyataan); ?>
        @if($ext[1]=='pdf' || $ext[1]=='PDF')
          <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_pernyataan}}" width="100%" height="550px"></iframe>
        @else
          <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_pernyataan}}" alt="" style="width: 100%">
        @endif


        {{-- aksi trima tolak tiap accordion --}}
        
        @if(Auth::getUser()->level==1)
          @if ($pengajuan->accadmin_surat_pernyataan == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->accadmin_surat_pernyataan == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->accadmin_surat_pernyataan=='Menunggu' || $pengajuan->accadmin_surat_pernyataan=='' || $pengajuan->accadmin_surat_pernyataan==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pernyataan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pernyataan" id="catatanadmin_surat_pernyataan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pernyataan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pernyataan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==2)
          @if ($pengajuan->acckasi_surat_pernyataan == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acckasi_surat_pernyataan == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acckasi_surat_pernyataan=='Menunggu' || $pengajuan->acckasi_surat_pernyataan=='' || $pengajuan->acckasi_surat_pernyataan==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pernyataan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pernyataan" id="catatanadmin_surat_pernyataan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pernyataan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pernyataan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==4)
          @if ($pengajuan->acc_kabid == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kabid == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kabid=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pernyataan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pernyataan" id="catatanadmin_surat_pernyataan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pernyataan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pernyataan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==5)
          @if ($pengajuan->acc_kadin == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kadin == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kadin=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_pernyataan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_pernyataan" id="catatanadmin_surat_pernyataan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_pernyataan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_pernyataan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @else
        @endif

      @else
        <?php echo $status = 'Tidak ada file'; ?>
      @endif
      @if($pengajuan->jenis_file==2 || $pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6">
            <b>No Surat</b> : {{$pengajuan->no_surat}}
          </div>
          <div class="col-lg-6 col-md-6">
            <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($pengajuan->tanggal_surat)}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
      @if($pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-12 col-md-6">
            <b>Penandatangan Surat Pengantar</b> : {{$pengajuan->jabatan_pj .' ('. $pengajuan->nama_pj .')'}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
    @endif
  </div>
  <button class="accordion5 btn btn-default btn-doc">Surat Kesediaan Pemegang Program Instansi yang akan diteliti</button>
  <div class="panel-accordion5" style="display: none;">
    @if ($pengajuan->upload_surat_kesediaan != '')
      @if(file_exists('uploads/file_upload_persyaratan/'.$pengajuan->upload_surat_kesediaan))
        <?php $ext = explode('.',$pengajuan->upload_surat_kesediaan); ?>
        @if($ext[1]=='pdf' || $ext[1]=='PDF')
          <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_kesediaan}}" width="100%" height="550px"></iframe>
        @else
          <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$pengajuan->upload_surat_kesediaan}}" alt="" style="width: 100%">
        @endif

        
        {{-- aksi trima tolak tiap accordion --}}
        
        @if(Auth::getUser()->level==1)
          @if ($pengajuan->accadmin_surat_kesediaan == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->accadmin_surat_kesediaan == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->accadmin_surat_kesediaan=='Menunggu' || $pengajuan->accadmin_surat_kesediaan=='' || $pengajuan->accadmin_surat_kesediaan==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_kesediaan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_kesediaan" id="catatanadmin_surat_kesediaan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_kesediaan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_kesediaan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==2)
          @if ($pengajuan->acckasi_surat_kesediaan == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acckasi_surat_kesediaan == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acckasi_surat_kesediaan=='Menunggu' || $pengajuan->acckasi_surat_kesediaan=='' || $pengajuan->acckasi_surat_kesediaan==null)
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_kesediaan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_kesediaan" id="catatanadmin_surat_kesediaan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_kesediaan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_kesediaan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==4)
          @if ($pengajuan->acc_kabid == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kabid == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kabid=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_kesediaan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_kesediaan" id="catatanadmin_surat_kesediaan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_kesediaan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_kesediaan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @elseif(Auth::getUser()->level==5)
          @if ($pengajuan->acc_kadin == 'Terima')
            <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
          @endif
          @if ($pengajuan->acc_kadin == 'Tolak')
            <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
          @endif
          @if($pengajuan->acc_kadin=='Menunggu')
            <span class="panel-btn-waiting{{ $pengajuan->id_item_permohonan }}-surat_kesediaan">
              <fieldset class="form-group">
                <label>Catatan</label>
                <textarea name="catatanadmin_surat_kesediaan" id="catatanadmin_surat_kesediaan" class="form-control catatan">-</textarea>
              </fieldset>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Terima','surat_kesediaan')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Terima</span></i>
              </a>
              <a href="javascript:void(0)" onclick="approveperfile('{{ $pengajuan->id_item_permohonan }}','Tolak','surat_kesediaan')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            </span>
            <div class="clearfix" style="margin-bottom: 15px"></div>
          @endif
        @else
        @endif

      @else
        <?php echo $status = 'Tidak ada file'; ?>
      @endif
      @if($pengajuan->jenis_file==2 || $pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-6 col-md-6">
            <b>No Surat</b> : {{$pengajuan->no_surat}}
          </div>
          <div class="col-lg-6 col-md-6">
            <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($pengajuan->tanggal_surat)}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
      @if($pengajuan->jenis_file==3)
        <div class="col-lg-12 col-md-12">
          <div class="col-lg-12 col-md-6">
            <b>Penandatangan Surat Pengantar</b> : {{$pengajuan->jabatan_pj .' ('. $pengajuan->nama_pj .')'}}
          </div>
        </div>
        <div class="clearfix"></div>
      @endif
    @endif
  </div>
  <br><br>
</div>
@endif

@php
/* 
        apakah accadmin_proposal_penelitian && accadmin_surat_pengantar && accadmin_surat_rekomendasi && accadmin_surat_pernyataan && accadmin_surat_kesediaan tidak kosong 
        jika iya, 

          apakah accadmin_proposal_penelitian && accadmin_surat_pengantar && accadmin_surat_rekomendasi && accadmin_surat_pernyataan && accadmin_surat_kesediaan = tolak
          jika iya, status doc admin tolak
          apakah accadmin_proposal_penelitian && accadmin_surat_pengantar && accadmin_surat_rekomendasi && accadmin_surat_pernyataan && accadmin_surat_kesediaan = terima
          jika iya, status doc admin terima
          jika tidak, status doc admin tolak

        jika tidak, status doc admin tolak
      
      */
      
      if($File->accadmin_proposal_penelitian && $File->accadmin_surat_pengantar && $File->accadmin_surat_rekomendasi && $File->accadmin_surat_pernyataan && $File->accadmin_surat_kesediaan){
        if($File->accadmin_proposal_penelitian == 'Tolak' && $File->accadmin_surat_pengantar == 'Tolak' && $File->accadmin_surat_rekomendasi == 'Tolak' && $File->accadmin_surat_pernyataan == 'Tolak' && $File->accadmin_surat_kesediaan == 'Tolak'){
          $File->doc_status = 'Tolak';
          $File->acc_admin = 'Tolak';
          $File->tgl_acc_admin = date('Y-m-d');
        }elseif($File->accadmin_proposal_penelitian == 'Terima' && $File->accadmin_surat_pengantar == 'Terima' && $File->accadmin_surat_rekomendasi == 'Terima' && $File->accadmin_surat_pernyataan == 'Terima' && $File->accadmin_surat_kesediaan == 'Terima'){
          $File->doc_status = 'Terima';
          $File->acc_admin = 'Terima';
          $File->tgl_acc_admin = date('Y-m-d');
        }
      }else{
        $File->doc_status = 'Tolak';
        $File->acc_admin = 'Tolak';
        $File->tgl_acc_admin = date('Y-m-d');
      }
@endphp