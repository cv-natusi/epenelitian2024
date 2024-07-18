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
          <button type="button" class="btn btn-sm btn-primary btn-add" id="btn-add">
            <span class="fa fa-plus"></span> &nbsp Tambah Tempat Penelitian
          </button>
        </div>
        <!-- Search -->
        <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
          <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
            <div class="form-group">
              <div class="form-line">
                <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-tempatpenelitian"></select>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
            <div class="form-group">
              <div class="form-line">
                <input type="text" class="input-sm form-control" placeholder="Search" id="search-tempatpenelitian">
              </div>
            </div>
          </div>
        </div>
        <div class='clearfix'></div>
        <div class="col-md-12 p-0 m-b-0">
          <!-- Datagrid -->
          <div class="table-responsive">
            <table class="table table-striped b-t b-light" id="datagrid-tempatpenelitian"></table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <!-- Page Option -->
              <div class="col-sm-1 hidden-xs">
                <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-tempatpenelitian"></select>
              </div>
              <!-- Page Info -->
              <div class="col-sm-6 text-center">
                <small class="text-muted inline m-t-sm m-b-sm" id="info-tempatpenelitian"></small>
              </div>
              <!-- Paging -->
              <div class="col-sm-5 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-tempatpenelitian"></ul>
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
   var datagridtempatpenelitian = $("#datagrid-tempatpenelitian").datagrid({
      url                     : "{!! route('datagridtempatpenelitian') !!}",
      primaryField            : 'id_tempat_penelitian',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-tempatpenelitian',
      searchFieldElement      : '#search-option-tempatpenelitian',
      pagingElement           : '#paging-tempatpenelitian',
      optionPagingElement     : '#option-tempatpenelitian',
      pageInfoElement         : '#info-tempatpenelitian',
      columns                 : [
        {field: 'nama_tempat', title: 'Nama Tempat', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'kategori', title: 'Kategori', editable: false, sortable: true, width: 130, align: 'left', search: true},
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
          '<li onclick="update_tempat(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit</a></li>' +
          '<li onclick="delete_tempat(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
          '</ul>' +
          '</div>';
        return menu;
    }

    function update_tempat(rowIndex){
      var rowData = datagridtempatpenelitian.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').hide();
          $.post("{!! route('updatetempatpenelitian') !!}",{id:rowData.id_tempat_penelitian}).done(function(data){
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
      $.post("{!! route('createtempatpenelitian') !!}").done(function(data){
        if(data.status == 'success'){
          $('.loading').hide();
          $('.other-page').html(data.content).fadeIn();
        } else {
          $('.main-layer').show();
        }
      });
    });

    function delete_tempat(rowIndex){
      var rowData = datagridtempatpenelitian.getRowData(rowIndex);
      swal({
        title:"Hapus Tempat Penelitian",
        text:"Apakah anda yakin ?",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Saya yakin!",
        cancelButtonText: "Batal!",
        closeOnConfirm: false
      },
      function(){
        $.post("{!! route('deletetempatpenelitian') !!}",{id:rowData.id_tempat_penelitian}).done(function(data){
          if(data.status == 'success'){
            datagridtempatpenelitian.reload();
            swal("Success!", "Tempat Penelitian telah dihapus !", "success");
          }else if(data.status=='fail'){
            datagridtempatpenelitian.reload();
            swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
          }else{
            datagridtempatpenelitian.reload();
            swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
          }
        });
      });

  }

    $(document).ready(function() {
      datagridtempatpenelitian.run();
    });
  </script>
@stop
