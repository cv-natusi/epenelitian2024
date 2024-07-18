@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary main-layer">
        <div class="panel-heading">
          {{$title}}
        </div>
        {{-- Mulai dari Sini --}}
        <div class="col-md-4 col-sm-4 col-xs-12 form-inline main-layer" style='padding:5px'>
        </div>
        <!-- Search -->
        <div class="col-md-8 col-sm-8 col-xs-12 form-inline main-layer" style="text-align: right;padding:5px;">
          <div class="form-group">
            <select class="input-sm form-control input-s-sm inline v-middle option-search" id="search-option"></select>
          </div>
          <div class="form-group">
            <input type="text" class="input-sm form-control" placeholder="Search" id="search">
          </div>
        </div>
        <div class='clearfix'></div>
        <div class="col-md-12" style='padding:0px'>
          <!-- Datagrid -->
          <div class="table-responsive" style="min-height: 200px;">
            <table class="table table-striped b-t b-light" id="datagrid"></table>
          </div>
          <footer class="panel-footer">
            <div class="row">
              <!-- Page Option -->
              <div class="col-sm-1 hidden-xs">
                <select class="input-sm form-control input-s-sm inline v-middle option-page" id="option"></select>
              </div>
              <!-- Page Info -->
              <div class="col-sm-6 text-center">
                <small class="text-muted inline m-t-sm m-b-sm" id="info"></small>
              </div>
              <!-- Paging -->
              <div class="col-sm-5 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none" id="paging"></ul>
              </div>
            </div>
          </footer>
        </div>
        <div class='clearfix'></div>
        {{-- Selesai --}}
      </div>
    </div>
  </div>
  <div class="other-page">
  </div>
  <div class="modal-dialog">

</div>
@endsection
@section('js')
<script type="text/javascript">
  var datagrid = $("#datagrid").datagrid({
    url                     : "{!! route('datagridaccept') !!}",
    primaryField            : 'sub.id',
    rowNumber               : true,
    rowCheck                : false,
    searchInputElement      : '#search',
    searchFieldElement      : '#search-option',
    pagingElement           : '#paging',
    optionPagingElement     : '#option',
    pageInfoElement         : '#info',
    columns                 : [
      {field: 'id', title: 'Submission ID', editable: false, sortable: true, width: 50, align: 'left', search: true},
      {field: 'title', title: 'Title', editable: false, sortable: true, width: 150, align: 'left', search: true},
      {field: 'created_at', title: 'Date Created', editable: false, sortable: true, width: 150, align: 'left', search: true},
       {field: 'menu', title: 'Menu', sortable: false, width: 100, align: 'center', search: false,
        rowStyler: function(rowData, rowIndex) {
          return menu(rowData, rowIndex);
        }
       }
    ]
  });

  $(document).ready(function() {
    datagrid.run();
  });
  function menu(rowData, rowIndex) {
      var menu =
        '<div class="btn-group">' +
        '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>' +
        '<ul class="dropdown-menu pull-right">' +
        '<li onclick="view_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-eye"></i> View File</a></li>' +
        '<li onclick="detail_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-pencil"></i> Details Submission</a></li>' +
        // '<li onclick="delete_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-trash-o"></i> Delete</a></li>' +
        '<li onclick="publish_accept(' + rowIndex + ')"><a href="javascript:void(0);"><i class="fa fa-upload"></i> Publish</a></li>' +
        '</ul>' +
        '</div>';
      return menu;
    }
     function publish_accept(rowIndex){
        var rowData = datagrid.getRowData(rowIndex);
        $.post("{!! route('publish_accept') !!}",{id:rowData.id}).done(function(data){
      $('.loading').hide();
      if(data.status == 'success'){
        datagrid.reload();
        swal("Success","This Submission Success to Publish","success");
      } else if(data.status=='fail'){
        swal("Maaf","Ini bukan berita milik anda !","error");
      } else {
      }
    });
  }

    function view_accept(rowIndex){
        var rowData = datagrid.getRowData(rowIndex);
    $('.loading').show();
    $('.main-layer').hide();
        // swal("Good",rowData.judul,"success");
        $.post("{!! route('view_accept') !!}",{id:rowData.id}).done(function(data){
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
  
  function delete_accept(rowIndex){
        var rowData = datagrid.getRowData(rowIndex);
    swal({
      title:"Hapus Journal",
      text:"Apakah anda yakin ?",
      type:"warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Saya yakin!",
      cancelButtonText: "Batal!",
      closeOnConfirm: false
    },
    function(){
      $.post("{!! route('doDeleteJournal') !!}",{id:rowData.id}).done(function(data){
        if(data.status == 'success'){
          datagrid.reload();
          swal("Success!", "Journal telah dihapus !", "success");
        }else if(data.status=='fail'){
          datagrid.reload();
          swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
        }else{
          datagrid.reload();
          swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
        }
      });
    });
  }
  function detail_accept(rowIndex){
    var rowData = datagrid.getRowData(rowIndex);
      $('.loading').show();
      $('.main-layer').hide();
          // swal("Good",rowData.judul,"success");
          $.post("{!! route('detail_accept') !!}",{id:rowData.id}).done(function(data){
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

    function form(id){
      $.post("{{route('detailAccept')}}",{id:id},function(data){
        if(data.status=='success'){
          $('.modal-dialog').html(data.content);
        }
      });
    }
</script>
@stop
