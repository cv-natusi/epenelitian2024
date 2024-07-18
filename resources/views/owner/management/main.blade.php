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
    <h2></h2>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-layer">
      <div class="card">
        <div class="body p-0 border-top-blue-3">
           <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" aria-expanded="true" class="active">              
              <a href="#data-pemohon" class="p-t-0" data-toggle="tab" aria-expanded="true">
                <i class="material-icons"></i>Users Pemohon                  
              </a>
            </li>
            <li role="presentation">             
              <a href="#data-tempat_penelitian" class="p-t-0" data-toggle="tab">
                <i class="material-icons"></i>Users Tempat Penelitian
              </a>
            </li>
          </ul>
          <div class="tab-content p-b-0">
            <div role="tabpanel" class="tab-pane fade active in" id="data-pemohon">
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-pemohon"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-pemohon">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-pemohon"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-pemohon"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-pemohon"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-pemohon"></ul>
                    </div>
                  </div>
                </footer>
              </div>
              <div class="clearfix"></div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="data-tempat_penelitian">
              <button type="button" class="btn btn-sm btn-primary btn-add pull-left" id="btn-add">
                <span class="fa fa-plus"></span> Tambah Data User
              </button>               
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer p-10 m-b-0"></div>
              <!-- Search -->
              <div class="col-md-4 col-sm-4 col-xs-12 form-inline pull-right panelSearch p-10 m-b-0">               
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-search" id="search-option-tempat_penelitian"></select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 m-b-0">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="input-sm form-control" placeholder="Search" id="search-tempat_penelitian">
                    </div>
                  </div>
                </div>
              </div>
              <div class='clearfix'></div>
              <div class="col-md-12 p-0 m-b-0">
                <!-- Datagrid -->
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light" id="datagrid-tempat_penelitian"></table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <!-- Page Option -->
                    <div class="col-sm-1 hidden-xs">
                      <select class="input-sm form-control show-tick input-s-sm inline v-middle option-page" id="option-tempat_penelitian"></select>
                    </div>
                    <!-- Page Info -->
                    <div class="col-sm-6 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm" id="info-tempat_penelitian"></small>
                    </div>
                    <!-- Paging -->
                    <div class="col-sm-5 text-right text-center-xs">
                      <ul class="pagination pagination-sm m-t-0 m-b-0" id="paging-tempat_penelitian"></ul>
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
@endsection

@section('js')
  <script type="text/javascript">
    var datagridpemohon = $("#datagrid-pemohon").datagrid({
      url                     : "{!! route('datagridpemohon') !!}",
      primaryField            : 'u.id',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-pemohon',
      searchFieldElement      : '#search-option-pemohon',
      pagingElement           : '#paging-pemohon',
      optionPagingElement     : '#option-pemohon',
      pageInfoElement         : '#info-pemohon',
      columns                 : [
        {field: 'username', title: 'Username', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'email', title: 'Email', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'phone', title: 'Telp', editable: false, sortable: true, width: 150, align: 'left', search: true},
        {field: 'edit', title: 'Image', editable: false, sortable: true, width: 150, align: 'left', search: true,
    			rowStyler: function(rowData, rowIndex) {
    				return edit(rowData, rowIndex);
    			}
    		},
        {field: 'menuPemohon', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuPemohon(rowData, rowIndex);
          }
        }

      ]
    });

    var datagridtempat_penelitian = $("#datagrid-tempat_penelitian").datagrid({
      url                     : "{!! route('datagridtempat_penelitian') !!}",
      primaryField            : 'u.id',
      rowNumber               : true,
      rowCheck                : false,
      searchInputElement      : '#search-tempat_penelitian',
      searchFieldElement      : '#search-option-tempat_penelitian',
      pagingElement           : '#paging-tempat_penelitian',
      optionPagingElement     : '#option-tempat_penelitian',
      pageInfoElement         : '#info-tempat_penelitian',
      columns                 : [
        {field: 'username', title: 'Username', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'email', title: 'Email', editable: false, sortable: true, width: 130, align: 'left', search: true},
        {field: 'menuTempat_penelitian', title: 'Action', sortable: false, width: 50, align: 'center', search: false,
          rowStyler: function(rowData, rowIndex) {
            return menuTempat_penelitian(rowData, rowIndex);
          }
        }

      ]
    });   

     function menuPemohon(rowData, rowIndex) {
        var menu =
           '<div class="btn-group">' +
	        '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
	        '<ul class="dropdown-menu pull-right">' +
	        '<li onclick="detailUser(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View</a></li>' +
	        // '<li onclick="updateUser(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit</a></li>' +
	        '<li onclick="hapusUser(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
	        '</ul>' +
	        '</div>';
        return menu;
    }

    function menuTempat_penelitian(rowData, rowIndex) {
        var menu =
           '<div class="btn-group">' +
	        '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
	        '<ul class="dropdown-menu pull-right">' +
	        '<li onclick="detailPkm(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View</a></li>' +
	        '<li onclick="updatePkm(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit Data</a></li>' +
	        '<li onclick="hapusPkm(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
	        '</ul>' +
	        '</div>';
        return menu;
    }

    function image(rowData, rowIndex){
		if (rowData.photo_user != "") {
			var tag = '<img src="{!! url("AssetsAdmin/dist/img/Editor/'+rowData.photo_user+'") !!}" style="height:100px;width:auto">';
		}else{
			var tag = '<img src="{!! url("AssetsSite/img/icon/default_logo.jpg") !!}" style="height:100px;width:auto">';
		};
		return tag;
	}

	function edit(rowData, rowIndex) {
		var tag = '<a href="javascript:void(0)" class="btn btn-sm btn-info m-0" onclick="form('+rowData.users_id+')"><span class="fa fa-picture-o"></span> &nbsp View</a>';
		return tag;
	}

	function resets(rowData, rowIndex){
		var tag = '<a href="javascript:void(0)" class="btn btn-sm btn-danger m-0" onclick="resetPassword('+rowIndex+')"><span class="fa fa-refresh"></span> &nbsp Reset</a>';
		return tag;
	}

	function form(id){
	  $.post("{{route('modalGambar')}}",{id:id},function(data){
	    if(data.status=='success'){
	      $('.modal-dialog').html(data.content);
	    }
	  });
	}

    function detailUser(rowIndex){
      var rowData = datagridpemohon.getRowData(rowIndex);
  		$('.loading').show();
  		$('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detailBerita') !!}",{id:rowData.users_id}).done(function(data){
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
     
	function updateUser(rowIndex){
    var rowData = datagridpemohon.getRowData(rowIndex);
  		$('.loading').show();
  		$('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('updateUser') !!}",{id:rowData.users_id}).done(function(data){
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

    function hapusUser(rowIndex){
        var rowData = datagridpemohon.getRowData(rowIndex);
    
    swal({
      title:"Hapus User",
      text:"Apakah anda yakin?",
      type:"warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Saya yakin!",
      cancelButtonText: "Batal!",
      closeOnConfirm: false
    },
    function(){
      $.post("{!! route('doDeleteAuthor') !!}",{id:rowData.users_id}).done(function(data){
        if(data.status == 'success'){
          datagridpemohon.reload();
          swal("Success!", "User telah dihapus !", "success");
        }else if(data.status=='fail'){
          datagridpemohon.reload();
          swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
        }else{
          datagridpemohon.reload();
          swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
        }
      });
    });
  }

    $(document).ready(function() {
      datagridpemohon.run();
      datagridtempat_penelitian.run();
    });


    function detailPkm(rowIndex){
      var rowData = datagridtempat_penelitian.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detailPkm') !!}",{id:rowData.id}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan Data milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }


    function updatePkm(rowIndex){
    var rowData = datagridtempat_penelitian.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('updatePkm') !!}",{id:rowData.id}).done(function(data){
        $('.loading').hide();
        if(data.status == 'success'){
          $('.other-page').html(data.content).fadeIn();
        } else if(data.status=='fail'){
          $('.main-layer').show();
          swal("Maaf","Ini bukan milik anda !","error");
        } else {
          $('.main-layer').show();
        }
      });
    }

	function hapusPkm(rowIndex){
    var rowData = datagridtempat_penelitian.getRowData(rowIndex);		
		swal({
			title:"Hapus User",
			text:"Apakah anda yakin?",
			type:"warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Saya yakin!",
			cancelButtonText: "Batal!",
			closeOnConfirm: false
		},
		function(){
			$.post("{!! route('doDeletePkm') !!}",{id:rowData.id}).done(function(data){
				if(data.status == 'success'){
					datagridtempat_penelitian.reload();
					swal("Success!", "User telah dihapus !", "success");
				}else if(data.status=='fail'){
					datagridpemohon.reload();
					swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
				}else{
					datagridpemohon.reload();
					swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
				}
			});
		});
	}  

  $('.btn-add').click(function(){
      $('.loading').show();
      $('.main-layer').hide();
      $.post("{!! route('addUserPkm') !!}").done(function(data){
        if(data.status == 'success'){
          $('.loading').hide();
          $('.other-page').html(data.content).fadeIn();
        } else {
          $('.main-layer').show();
        }
      });
    });

  </script>
@stop

