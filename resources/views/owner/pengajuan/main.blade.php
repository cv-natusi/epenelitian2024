@extends('owner.master.main')


@section('css')
  <style media="screen">
    .block-header h2 {
      font-size: 22px !important;
      margin-bottom: 10px !important;
    }
    .block-header .breadcrumb{
      font-size: 12px !important;
      border-top: 1px solid rgb(194, 198, 210) !important;
      padding: 3px 0px !important;
      background-color: transparent;
      margin-bottom: 10px;
      border-radius: 0px;
    }
    .table-responsive{
      overflow-x: unset !important;
    }
    .border-top-blue-3 {
      border-top: solid 3px #2196F3 !important;
    }
    .btn-doc {
      width: 100% !important;
      text-align: left !important;
    }
    .btn-doc:hover {
      background: #ccc;
    }
  </style>
@stop
@section('content')
  <div class="block-header">
    <h2>{{ $title }}</h2>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-layer">
      <div class="card">
        <div class="body p-0 border-top-blue-3">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" aria-expanded="true" class="@if($no==1) active @endif">
              <?php
              if(Auth::getUser()->level==1){
                $menunggu = DB::table('permohonan')->where('status', 'Menunggu Admin')->count();
              }elseif(Auth::getUser()->level==2){
                $menunggu = DB::table('permohonan')->where('status', 'Menunggu Kasi')->count();
              }elseif(Auth::getUser()->level==4){
                $menunggu = DB::table('permohonan')->where('status', 'Menunggu Kabid')->count();
              }elseif(Auth::getUser()->level==5){
                $menunggu = DB::table('permohonan')->where('status', 'Menunggu Kadin')->count();
              }elseif(Auth::getUser()->level==6){
                $menunggu = DB::table('permohonan')->join('verifikasi_tempat_penelitian as vt', 'permohonan.id_permohonan', '=', 'vt.permohonan_id')
                ->join('doc_pendukung', 'doc_pendukung.permohonan_id', '=', 'permohonan.id_permohonan')
                ->where('tempat_penelitian_id',Auth::getUser()->tempat_penelitian_id)->where('status_verifikasi', 'Menunggu')
                ->where('doc_pendukung.permohonan_id', '>', '0')->count();
              }else{
                $menunggu = 0;
              }
              ?>
              <a href="#data-menunggu" class="p-t-0" data-toggle="tab" aria-expanded="true" onclick="klikTab(1)">
                <i class="material-icons"></i>Menunggu
                @if($menunggu>0)
                  <span class="badge badge-pill badge-danger">
                    {{ $menunggu }}
                  </span>
                @endif
              </a>
            </li>
            <li role="presentation" class="@if($no==2) active @endif">
              <?php
              if(Auth::getUser()->level==1){
                $terima = DB::table('permohonan')->where('status','Menunggu Kasi')
                ->orWhere('status','Menunggu Kabid')
                ->orWhere('status','Menunggu Kadin')
                ->orWhere('status','Terima')->count();
              }elseif(Auth::getUser()->level==2){
                $terima = DB::table('permohonan')
                ->orWhere('status','Menunggu Kabid')
                ->orWhere('status','Menunggu Kadin')
                ->orWhere('status','Terima')->count();
              }elseif(Auth::getUser()->level==4){
                $terima = DB::table('permohonan')->where('status','Menunggu Kasi')
                ->orWhere('status','Menunggu Kadin')
                ->orWhere('status','Terima')->count();
              }elseif(Auth::getUser()->level==5){
                $terima = DB::table('permohonan')->where('status','Menunggu Kasi')
                ->orWhere('status','Terima')->count();
              }elseif(Auth::getUser()->level==6){
                $terima = DB::table('permohonan')->join('verifikasi_tempat_penelitian as vt', 'permohonan.id_permohonan', '=', 'vt.permohonan_id')->where('tempat_penelitian_id',Auth::getUser()->tempat_penelitian_id)->where('status_verifikasi', 'Terima')->count();                
              }else{
                $terima = 0;
              }
              ?>
              <a href="#data-terima" class="p-t-0" data-toggle="tab" onclick="klikTab(2)">
                <i class="material-icons"></i>Terima
                @if($terima>0)
                  <span class="badge badge-pill badge-danger">
                    {{ $terima }}
                  </span>
                @endif
              </a>
            </li>
            <li role="presentation" class="@if($no==3) active @endif">
              <?php 
                if(Auth::getUser()->level==1 || Auth::getUser()->level==2 || Auth::getUser()->level==4 || Auth::getUser()->level==5){
                  $tolak = DB::table('permohonan')->where('status', 'Tolak')->count();
                }elseif(Auth::getUser()->level==6){
                  $tolak = DB::table('permohonan')->join('verifikasi_tempat_penelitian as vt', 'permohonan.id_permohonan', '=', 'vt.permohonan_id')->where('tempat_penelitian_id',Auth::getUser()->tempat_penelitian_id)->where('status_verifikasi', 'Tolak')->count();        
                }else{
                  $tolak = 0;
                }
              ?>
              <a href="#data-tolak" class="p-t-0" data-toggle="tab" onclick="klikTab(3)">
                <i class="material-icons"></i>Tolak
                @if($tolak > 0)
                  <span class="badge badge-pill badge-danger">
                    {{ $tolak }}
                  </span>
                @endif
              </a>
            </li>
          </ul>
          <div class="tab-content p-b-0">
            <div role="tabpanel" class="tab-pane fade @if($no==1) active in @endif" id="data-menunggu">
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-menunggu"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-menunggu">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-menunggu"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-menunggu"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-menunggu"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-menunggu"></ul>
                    </div>
                  </div>
                </footer>
              </div>
              <div class="clearfix"></div>
            </div>

            <div role="tabpanel" class="tab-pane fade @if($no==2) active in @endif" id="data-terima">
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer p-10 m-b-0"></div>
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-terima"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-terima">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-terima"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-terima"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-terima"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-terima"></ul>
                    </div>
                  </div>
                </footer>
              </div>
              <div class="clearfix"></div>
            </div>

            <div role="tabpanel" class="tab-pane fade @if($no==3) active in @endif" id="data-tolak">
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer p-10 m-b-0"></div>
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-tolak"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-tolak">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-tolak"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-tolak"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-tolak"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-tolak"></ul>
                    </div>
                  </div>
                </footer>
              </div>
              <div class="clearfix"></div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-12 other-page"></div>
    <div class="col-12 modal-dialog"></div>
  </div>
@stop

@section('js')
  <script type="text/javascript">
    var datagridmenunggu = $("#datagrid-menunggu").datagrid({
      url                     : "{!! route('datagridmenunggu') !!}",
      primaryField            : 'id_permohonan',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-menunggu',
      searchFieldElement      : '#search-option-menunggu',
      pagingElement           : '#paging-menunggu',
      optionPagingElement     : '#option-menunggu',
      pageInfoElement         : '#info-menunggu',
      columns                 : [
        {field: 'judul_penelitian', title: 'Judul Penelitian', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'tgl_pengajuan', title: 'Tanggal Pengajuan', editable: false, sortable: true, width: 150, align: 'left', search: true},
        {field: 'nama_lengkap', title: 'Nama Lengkap', editable: false, sortable: true, width: 100, align: 'left', search: true},
        {field: 'nama_tempat_penelitian', title: 'Tempat Penelitian', editable: false, sortable: true, width: 150, align: 'left', search: true},
        // {field: 'status_verifikasi', title: 'Status Tempat Penelitian', editable: false, sortable: true, width: 80, align: 'center', search: true},
        @if(Auth::getUser()->level!=6)
         {field: 'status', title: 'Status Permohonan', editable: false, sortable: true, width: 50, align: 'left', search: true},
        @endif
        {field: 'menuM', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuM(rowData, rowIndex);
          }
        }

      ]
    });

    var datagridterima = $("#datagrid-terima").datagrid({
      url                     : "{!! route('datagridterima') !!}",
      primaryField            : 'id_permohonan',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-terima',
      searchFieldElement      : '#search-option-terima',
      pagingElement           : '#paging-terima',
      optionPagingElement     : '#option-terima',
      pageInfoElement         : '#info-terima',
      columns                 : [
        {field: 'judul_penelitian', title: 'Judul Penelitian', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'tgl_pengajuan', title: 'Tanggal Pengajuan', editable: false, sortable: true, width: 150, align: 'left', search: true},
        {field: 'nama_lengkap', title: 'Nama Lengkap', editable: false, sortable: true, width: 130, align: 'left', search: true},
        // {field: 'nama_jenis', title: 'Jenis Penelitian', editable: false, sortable: true, width: 100, align: 'left', search: true},
        {field: 'nama_tempat_penelitian', title: 'Tempat Penelitian', editable: false, sortable: true, width: 150, align: 'left', search: true},
        // {field: 'status_verifikasi', title: 'Status Tempat Penelitian', editable: false, sortable: true, width: 80, align: 'center', search: true},
        {field: 'menuAksis', title: 'Status Permohonan', sortable: false, width: 100, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex){
            return menuAksis(rowData, rowIndex);
          }
        },
        {field: 'statusHasil', title: 'Status Penelitian', sortable: false, width: 100, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return statusHasil(rowData, rowIndex);
          }
        },
         {field: 'menuTe', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuTe(rowData, rowIndex);
          }
        }

      ]
    });

    var datagridtolak = $("#datagrid-tolak").datagrid({
      url                     : "{!! route('datagridtolak') !!}",
      primaryField            : 'id_permohonan',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-tolak',
      searchFieldElement      : '#search-option-tolak',
      pagingElement           : '#paging-tolak',
      optionPagingElement     : '#option-tolak',
      pageInfoElement         : '#info-tolak',
      columns                 : [
        {field: 'judul_penelitian', title: 'Judul Penelitian', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'tgl_pengajuan', title: 'Tanggal Pengajuan', editable: false, sortable: true, width: 150, align: 'left', search: true},
        {field: 'nama_lengkap', title: 'Nama Lengkap', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'nama_tempat_penelitian', title: 'Tempat Penelitian', editable: false, sortable: true, width: 150, align: 'left', search: true},
        {field: 'status_verifikasi', title: 'Status Tempat Penelitian', editable: false, sortable: true, width: 80, align: 'center', search: true},
        {field: 'status', title: 'Status Permohonan', editable: false, sortable: true, width: 50, align: 'left', search: true},
         {field: 'menuTo', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuTo(rowData, rowIndex);
          }
        }

      ]
    });

     function menuM(rowData, rowIndex) {
        var menu =
          '<div class="btn-group">' +
          '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
          '<ul class="dropdown-menu pull-right">' +
          
          @if(Auth::getUser()->level!=6)
          '<li onclick="detail_peneliti(' + rowData.id_permohonan + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View Details</a></li>' +
          '<li onclick="delete_permohonan(\''+rowData.id_permohonan+'\')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Hapus</a></li>'+

          @endif

          @if(Auth::getUser()->level==6)
          '<li onclick="detail_pengajuan(' + rowData.id_permohonan + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View Pengajuan</a></li>' +
          @endif
          
          // '<li onclick="terima_pengajuan(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-check"></i> Terima</a></li>' +
          // '<li onclick="tolak_pengajuan(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Tolak</a></li>' +
          '</ul>' +
          '</div>';
        return menu;
    }

    function menuTe(rowData, rowIndex) {
        var menu =
          '<div class="btn-group">' +
          '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
          '<ul class="dropdown-menu pull-right">' +
          '<li onclick="detail_peneliti(' + rowData.id_permohonan + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View Detail Pengajuan</a></li>';
          // '<li onclick="cetak_konfir(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-print"></i> Buat Konfirmasi</a></li>' +
          // '<li onclick="send_notif(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-send"></i> Surat Ijin</a></li>' +
          @if(Auth::getUser()->level!=3)
            @if(Auth::getUser()->level==6)
              // if(rowData.status_hasil!=null && rowData.status_hasil!='' && rowData.status_hasil!='Pending' && rowData.status_hasil!='Tolak'){
              if(rowData.status_hasil!=null && rowData.status_hasil!='' && rowData.status_hasil=='Publish' && rowData.status_hasil!='Tolak'){
                menu+='<li><a href="javascript:void(0)" onclick="detail_hasil(' + rowData.id_permohonan + ')"><i class="fa fa-eye"></i> View Hasil Penelitian</a></li>';
              }
            @else
              // if(rowData.status_hasil!=null && rowData.status_hasil!='' && rowData.status_hasil!='Pending'){
              if(rowData.status_hasil!=null && rowData.status_hasil!='' && rowData.status_hasil=='Publish'){
              menu+='<li><a href="javascript:void(0)" onclick="detail_hasil(' + rowData.id_permohonan + ')"><i class="fa fa-eye"></i> View Hasil Penelitian</a></li>';
              } else if(rowData.status_hasil!=null && rowData.status_hasil!='' && rowData.status_hasil=='Terima'){
              menu+='<li><a href="javascript:void(0)" onclick="detail_hasil(' + rowData.id_permohonan + ')"><i class="fa fa-eye"></i> View Hasil Penelitian</a></li>';
              }
            @endif
            @if(Auth::getUser()->level==1)
              // menu+='<li><a href="javascript:void(0)" onclick="modal_surat(\''+rowData.id_permohonan+'\')"><i class="fa fa-print"></i> Cetak Surat Ijin</a></li>';
              // console.log(rowData)
              if(rowData.upload_surat_izin == null && rowData.tgl_ambil!=null && rowData.tgl_acc_kasi!=null){
                menu+='<li><a href="javascript:void(0)" onclick="modal_upload_surat_izin(\''+rowData.id_permohonan+'\')"><i class="fa fa-upload"></i> Upload Surat Ijin</a></li>';
              }else{
                menu+='<li><a href="javascript:void(0)" onclick="modal_upload_surat_izin(\''+rowData.id_permohonan+'\')"><i class="fa fa-file"></i> Lihat Surat Ijin</a></li>';
                menu+='<li onclick="batal_terima(\''+rowData.id_permohonan+'\')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Batal Terima</a></li>';
                menu+='<li><a href="{{url('/')}}/api/cetak_surat_ijin-'+rowData.id_permohonan+'-nota" target="_blank"><i class="fa fa-print"></i> Cetak Nota Dinas</a></li>';
                menu+='<li><a href="{{url('/')}}/api/cetak_surat_ijin-'+rowData.id_permohonan+'-surat" target="_blank"><i class="fa fa-print"></i> Cetak Surat</a></li>';
                // menu+='<li><a href="{{url('/')}}/api/view_surat_ijin-'+rowData.id_permohonan+'-surat" target="_blank"><i class="fa fa-eye"></i> View Surat Ijin</a></li>';
                // menu+='<li><a href="{{url('/')}}/api/view_surat_ijin-'+rowData.id_permohonan+'-nota" target="_blank"><i class="fa fa-eye"></i> View Nota Dinas</a></li>';
              }              
              // if(rowData.tgl_ambil=='' || rowData.tgl_ambil==null){
              //   menu+='<li><a href="javascript:void(0)" onclick="konfirmasi_pengambilan(\''+rowData.id_permohonan+'\')"><i class="fa fa-check"></i> Konfirmasi Pengambilan Surat</a></li>';
              // }
            @endif
          @endif
          // if(rowData.tempat_penelitian.indexOf(rowData.unit_kerja)>=0){
          // }
          menu+='</ul>' +
          '</div>';
        return menu;
    }

    function menuAksis(rowData, rowIndex) {
        var hasil = rowData.status_hasil;
        var check = rowData.status;
        var isi = '';
        if(check == "Menunggu Kasi"){ 
          isi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#000">&nbsp;&nbsp;Menunggu Kasi&nbsp;&nbsp;</span>';
          return isi;
        } else if (rowData.upload_surat_izin == null){
          isi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#444">&nbsp;&nbsp;Surat Izin Belum Diupload&nbsp;&nbsp;</span>';
          return isi;
        } else {
          isi = '<span style="padding: 5px;font-size: 9pt; border-radius: 5px;color: white;background:#34f">&nbsp;&nbsp;Terima&nbsp;&nbsp;</span>';
          // console.log(rowData);
          return isi;
        }
    }

    function statusHasil(rowData, rowIndex) {
        var hasil = rowData.status_hasil;
        var check = rowData.status;
        var isi = '';
        if(check == "Menunggu Kasi"){
          isi = 'Proses';
          return isi;
        } else if (rowData.upload_surat_izin == null){
          isi = 'Proses';
          return isi;
        } else {
          // console.log(rowData);
          return hasil;
        }
    }

    function hapus_surat_izin(id_permohonan){
      swal({
        title:"Konfirmasi Hapus Surat Ijin",
        text:"Anda ingin menghapus surat ijin ini ?",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Saya yakin!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false
      },
      function(){
        $.post("{{ route('hapusSuratIzin') }}",{id_permohonan:id_permohonan}).done(function(data){
          if(data.status == 'success'){
            datagridterima.reload();
            swal("Success!", "Surat ijin sudah dihapus", "success");
          }
        });
      });
    }

    function konfirmasi_pengambilan(id_permohonan){
      swal({
        title:"Konfirmasi Pengambian Surat Ijin",
        text:"Surat dapat d ambil pemohon pada esok hari di MPP Sidoarjo ?",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Saya yakin!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false
      },
      function(){
        $.post("{!! url('/') !!}/api/konfirmasi_pengambilan",{id:id_permohonan}).done(function(data){
          if(data.status == 'success'){
            datagridterima.reload();
            swal("Success!", "Surat ijin dapat diambil oleh pemohon esok hari", "success");
          }
        });
      });
    }

    function menuTo(rowData, rowIndex) {
        var menu =
          '<div class="btn-group">' +
          '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
          '<ul class="dropdown-menu pull-right">';
          // '<li onclick="view_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View Details</a></li>' +
          // '<li onclick="detail_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Keterangan</a></li>' +
          // menu+='<li onclick="delete_permohonan(\''+rowData.id_permohonan+'\')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Hapus Pengajuan</a></li>';
          menu+='<li onclick="batal_tolak(\''+rowData.id_permohonan+'\')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Batal Tolak</a></li>';          
          '</ul>' +
          '</div>';
        return menu;
    }

    function detail_pengajuan(rowIndex){
      var rowData = datagridmenunggu.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').show();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detail_pengajuan') !!}",{id_permohonan:rowData.id_permohonan}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

    function detail_peneliti(rowIndex){
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detail_peneliti') !!}",{id_permohonan:rowIndex}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

     function detail_pengajuan(rowIndex){
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detail_verifikasi_pengajuan') !!}",{id_permohonan:rowIndex}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

    function detail_hasil(rowIndex){
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detail_hasil') !!}",{id_permohonan:rowIndex}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

    function cetak_konfir(rowIndex){
      var rowData = datagridterima.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('cetak_konfir') !!}",{id_permohonan:rowData.id_permohonan}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

    function terima_pengajuan(rowIndex){
        var rowData = datagridterima.getRowData(rowIndex);
        $.post("{!! route('terima_pengajuan') !!}",{id:rowData.id_permohonan}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          datagridterima.reload();
          swal("Success","Pengajuan ini Diterima","success");
        } else if(data.status=='fail'){
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
        }
      });
    }
     function tolak_pengajuan(rowIndex){
        var rowData = datagridmenunggu.getRowData(rowIndex);
        $.post("{!! route('tolak_pengajuan') !!}",{id:rowData.id_permohonan}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          datagridmenunggu.reload();
          swal("Success","Pengajuan ini Ditolak","success");
        } else if(data.status=='fail'){
          swal("Maaf","Ini bukan berita milik anda !","error");
        } else {
        }
      });
    }

    function batal_terima(rowIndex){
        $.post("{!! route('batal_pengajuan') !!}",{id_permohonan:rowIndex}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          datagridterima.reload();
          swal("Success","Berhasil Dibatalkan","success");
        } else if(data.status=='fail'){
          swal("Maaf","Gagal DI Proses!","error");
        } else {
        }
      });
    }

    function batal_tolak(rowIndex){
        $.post("{!! route('batal_pengajuan') !!}",{id_permohonan:rowIndex}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          datagridtolak.reload();
          swal("Success","Berhasil Dibatalkan","success");
        } else if(data.status=='fail'){
          swal("Maaf","Gagal DI Proses!","error");
        } else {
        }
      });
    }

  function delete_permohonan(id_permohonan){
      swal({
        title:"Hapus Jenis Penelitian",
        text:"Apakah anda yakin ?",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Saya yakin!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false
      },
      function(){
        $.post("{!! route('delete_permohonan') !!}",{id:id_permohonan}).done(function(data){
          if(data.status == 'success'){
            datagridmenunggu.reload();
            swal("Success!", "Pengajuan telah dihapus !", "success");
          }else if(data.status=='fail'){
            datagridmenunggu.reload();
            swal("Maaf!", "Anda bukan pemilik data ini !", "error");
          }else{
            datagridmenunggu.reload();
            swal("Maaf!", "Data telah dihapus sebelum ini !", "error");
          }
        });
      });

  }

    function send_notif(rowIndex) {
      var rowData = datagridterima.getRowData(rowIndex);
      $.post("{!! route('send_notif') !!}",{id:rowData.id_permohonan}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          datagridmenunggu.reload();
          swal("Success","Pesan Terkirim","success");
        } else if(data.status=='fail'){
          swal("Maaf","Pengiriman pesan gagal !","error");
        } else {
        }
      });
    }

    function modal_surat(id_permohonan){
      $.post("{{route('modal_surat')}}",{id:id_permohonan},function(data){
        if(data.status=='success'){
          $('.modal-dialog').html(data.content);
        }
      });
    }

    function modal_upload_surat_izin(id_permohonan){
      $.post("{{route('modal_upload_surat_izin')}}",{id_permohonan:id_permohonan},function(data){
        if(data.status=='success'){
          $('.modal-dialog').html(data.content);
        }
      });
    }

    function klikTab(pos) { 
      window.history.replaceState(null, null, '?no='+pos);
      if (pos==1) {
        $('#datagrid-menunggu').html('');
        datagridmenunggu.run();
      }else if (pos==2) {
        $('#datagrid-terima').html('');
        datagridterima.run();
      }else if (pos==3) {
        $('#datagrid-tolak').html('');
        datagridtolak.run();
      }
    } 

    $(document).ready(function() {
      klikTab("{{$no}}");
    });
  </script>
@stop
