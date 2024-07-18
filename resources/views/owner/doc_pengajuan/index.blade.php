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
            <li role="presentation" class="active">
              <a href="#data-pendukung" class="p-t-0" data-toggle="tab">
                <i class="material-icons"></i>Data Diterima
              </a>
            </li>           
          </ul>

          <div class="tab-content p-b-0">
            <div role="tabpanel" class="tab-pane fade in active" id="data-pendukung">
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-pendukung"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-pendukung">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-pendukung"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-pendukung"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-pendukung"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-pendukung"></ul>
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
   var datagridpendukung = $("#datagrid-pendukung").datagrid({
      url                     : "{!! route('datagridpendukung') !!}",
      primaryField            : 'id_file',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-pendukung',
      searchFieldElement      : '#search-option-pendukung',
      pagingElement           : '#paging-pendukung',
      optionPagingElement     : '#option-pendukung',
      pageInfoElement         : '#info-pendukung',
      columns                 : [
        {field: 'nama_file', title: 'Nama File', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'jenis_file', title: '', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'created_at', title: 'Tanggal', editable: false, sortable: true, width: 150, align: 'left', search: true},

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
          '<li onclick="detail_pengajuan(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View Details</a></li>' +
          '<li onclick="detail_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-check-square"></i> Terima</a></li>' +
          '<li onclick="detail_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-close"></i> Tolak</a></li>' +
          '<li onclick="delete_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
          '</ul>' +
          '</div>';
        return menu;
    }

    $(document).ready(function() {
      datagridpendukung.run();
    });
  </script>
@stop
