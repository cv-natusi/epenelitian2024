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
      <div class="body p-0 border-top-blue-3">
        <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer" style='padding:5px'>
          <!-- <button type="button" class="btn btn-sm btn-primary btn-add" id="btn-add">
            <span class="fa fa-plus"></span> &nbsp Tambah Lembar Konfirmasi
          </button> -->
        </div>        
        <!-- Search -->
        <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
          <div class="col-md-4 col-sm-4 col-xs-12 m-b-0">
            <div class="form-group">
              <div class="form-line">
                <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-lembar_konfir"></select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
            <div class="form-group">
              <div class="form-line">
                <input type="text" class="input-sm form-control" placeholder="Search" id="search-lembar_konfir">
              </div>
            </div>
          </div>
        </div>
        <div class='clearfix'></div>
        <div class="col-md-12 p-0 m-b-0">
          <!-- Datagrid -->
          <div class="table-responsive">
            <table class="table table-striped b-t b-light" id="datagrid-lembar_konfir"></table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <!-- Page Option -->
              <div class="col-sm-1 hidden-xs">
                <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-lembar_konfir"></select>
              </div>
              <!-- Page Info -->
              <div class="col-sm-6 text-center">
                <small class="text-muted inline m-t-sm m-b-sm" id="info-lembar_konfir"></small>
              </div>
              <!-- Paging -->
              <div class="col-sm-5 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-lembar_konfir"></ul>
              </div>
            </div>
          </footer>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="col-12 other-page"></div>
    <div class="col-12 modal-dialog"></div>
  </div>
@stop

@section('js')
  <script type="text/javascript">
   var datagridlembar_konfir = $("#datagrid-lembar_konfir").datagrid({
      url                     : "{!! route('datagridlembar_konfir') !!}",
      primaryField            : 'id_lembar',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-lembar_konfir',
      searchFieldElement      : '#search-option-lembar_konfir',
      pagingElement           : '#paging-lembar_konfir',
      optionPagingElement     : '#option-lembar_konfir',
      pageInfoElement         : '#info-lembar_konfir',
      columns                 : [
        {field: 'keterangan', title: 'Keterangan', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'menuM', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuM(rowData, rowIndex);
          }
        }
      ]
    });


     function menuM(rowData, rowIndex) {
        var menu =
          '<div class="btn-group">' +
          '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
          '<ul class="dropdown-menu pull-right">' +
          '<li onclick="update_lembar(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit</a></li>' +
          // '<li onclick="delete_lembar(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
          '</ul>' +
          '</div>';
        return menu;
    }

    function update_lembar(rowIndex){
      var rowData = datagridlembar_konfir.getRowData(rowIndex);
      // console.log(rowData.id_lembar);
      $('.loading').show();
      $('.main-layer').hide();
          $.post("{!! route('updatelembar_konfir') !!}",{id:rowData.id_lembar}).done(function(data){
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

      $('.btn-add').click(function(){
      $('.loading').show();
      $('.main-layer').hide();
      $.post("{!! route('createlembar_konfir') !!}").done(function(data){
        if(data.status == 'success'){
          $('.loading').hide();
          $('.other-page').html(data.content).fadeIn();
        } else {
          $('.main-layer').show();
        }
      });
    });

    function delete_jenis(rowIndex){
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
        $.post("{!! route('deletelembar_konfir') !!}",{id:rowData.id_lembar}).done(function(data){
          if(data.status == 'success'){
            datagridlembar_konfir.reload();
            swal("Success!", "Jenis Penelitian telah dihapus !", "success");
          }else if(data.status=='fail'){
            datagridlembar_konfir.reload();
            swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
          }else{
            datagridlembar_konfir.reload();
            swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
          }
        });
      });

  }

    $(document).ready(function() {
      datagridlembar_konfir.run();
    });
  </script>
@stop
