<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
          Dokumen lengkap Pengajuan Penelitian
        <span style="float:right"><a data-dismiss="modal" onclick="closeModal()">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <h4 style="font-weight: bold; color: #4682B4;">Kelengkapan Dokumen</h4>
          <hr style="  border: 1px solid DimGray;">
        @if (!empty($pengajuan))
          @foreach ($pengajuan as $key)
            <div class="form-group m-t-0 m-b-25">
                <button class="accordion btn btn-default btn-doc">{{$key->nama_form}}</button>
                <div class="panel-accordion" style="display: none;">
                  @if ($key->nama_file != '')
                    @if(file_exists('uploads/semua/'.$key->nama_file))
                      <?php $ext = explode('.',$key->nama_file); ?>
                      @if($ext[1]=='pdf' || $ext[1]=='PDF')
                        <iframe src="{{ url('/') }}/uploads/semua/{{$key->nama_file}}" width="100%" height="550px"></iframe>
                      @else
                        <img src="{{ url('/') }}/uploads/semua/{{$key->nama_file}}" alt="" style="width: 100%">
                      @endif
                    @else
                      <?php echo $status = 'Tidak ada file'; ?>
                    @endif
                    @if($key->jenis_file==2 || $key->jenis_file==3)
                      <div class="col-lg-12 col-md-12">
                        <div class="col-lg-6 col-md-6">
                          <b>No Surat</b> : {{$key->no_surat}}
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <b>Tanggal Surat</b> : {{App\Http\Libraries\Formatter::tanggal_indo($key->tanggal_surat)}}
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    @endif
                    @if($key->jenis_file==3)
                      <div class="col-lg-12 col-md-12">
                        <div class="col-lg-12 col-md-6">
                          <b>Penandatangan Surat Pengantar</b> : {{$key->jabatan_pj .' ('. $key->nama_pj .')'}}
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    @endif
                  @endif

                  @if(Auth::getUser()->level==1)
                    @if ($key->acc_admin == 'Terima')
                      <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                    @endif
                    @if ($key->acc_admin == 'Tolak')
                      <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                    @endif
                    @if($key->acc_admin=='Menunggu')
                      <span class="panel-btn-waiting{{ $key->id_file }}">
                        <fieldset class="form-group">
                          <label>Catatan</label>
                          <textarea name="catatan" id="catatan" class="form-control">-</textarea>
                        </fieldset>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                          <i class="fa fa-check"><span> Terima</span></i>
                        </a>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Tolak')" class="btn btn-danger">
                          <i class="fa fa-times"><span> Tolak</span></i>
                        </a>
                      </span>
                    @endif
                  @elseif(Auth::getUser()->level==2)
                    @if ($key->acc_kasi == 'Terima')
                      <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                    @endif
                    @if ($key->acc_kasi == 'Tolak')
                      <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                    @endif
                    @if($key->acc_kasi=='Menunggu')
                      <span class="panel-btn-waiting{{ $key->id_file }}">
                        <fieldset class="form-group">
                          <label>Catatan</label>
                          <textarea name="catatan" id="catatan" class="form-control">-</textarea>
                        </fieldset>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                          <i class="fa fa-check"><span> Terima</span></i>
                        </a>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Tolak')" class="btn btn-danger">
                          <i class="fa fa-times"><span> Tolak</span></i>
                        </a>
                      </span>
                    @endif
                  @elseif(Auth::getUser()->level==4)
                    @if ($key->acc_kabid == 'Terima')
                      <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                    @endif
                    @if ($key->acc_kabid == 'Tolak')
                      <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                    @endif
                    @if($key->acc_kabid=='Menunggu')
                      <span class="panel-btn-waiting{{ $key->id_file }}">
                        <fieldset class="form-group">
                          <label>Catatan</label>
                          <textarea name="catatan" id="catatan" class="form-control">-</textarea>
                        </fieldset>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                          <i class="fa fa-check"><span> Terima</span></i>
                        </a>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Tolak')" class="btn btn-danger">
                          <i class="fa fa-times"><span> Tolak</span></i>
                        </a>
                      </span>
                    @endif
                  @elseif(Auth::getUser()->level==5)
                    @if ($key->acc_kadin == 'Terima')
                      <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                    @endif
                    @if ($key->acc_kadin == 'Tolak')
                      <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                    @endif
                    @if($key->acc_kadin=='Menunggu')
                      <span class="panel-btn-waiting{{ $key->id_file }}">
                        <fieldset class="form-group">
                          <label>Catatan</label>
                          <textarea name="catatan" id="catatan" class="form-control">-</textarea>
                        </fieldset>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                          <i class="fa fa-check"><span> Terima</span></i>
                        </a>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_file }}','Tolak')" class="btn btn-danger">
                          <i class="fa fa-times"><span> Tolak</span></i>
                        </a>
                      </span>
                    @endif
                  @else
                  @endif
                </div>
            </div>
          @endforeach
        @endif
        </div>
      </div>
      <div class="clearfix" style='padding-bottom:20px'></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $().ready(function() {
    // validate the comment form when it is submitted
    $("#commentForm").validate();
  });

    var onLoad = (function() {
        $('#detail-dialog').find('.modal-dialog').css({
            'width'     : '60%'
        });
        $('#detail-dialog').modal('show');
    })();

    $('#detail-dialog').on('hidden.bs.modal', function () {
        $('.modal-dialog').html('');
    });

    var acc = document.getElementsByClassName("accordion");

    for (var i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }

   function approve(id_file,doc_status) {
      if (doc_status == 'Terima') {
        var ket ='menerima?';
      }else{
        var ket ='menolak?';
      }
      var catatan = $('#catatan').val();
      swal({
       title:"Apakah anda akan "+ket,
       text:"Apakah anda yakin ?",
       type:"warning",
       showCancelButton: true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText: "Saya yakin!",
       cancelButtonText: "Batal!",
       closeOnConfirm: true
     },
     function(){
       $.post('{{ route('approveFile') }}',{id_file:id_file,doc_status:doc_status, catatan:catatan}).done(function(data){
         if(data.status == 'success'){
           @if(Auth::getUser()->level==1)
           var st_pakai = data.file_doc.acc_admin;
           @elseif(Auth::getUser()->level==2)
           var st_pakai = data.file_doc.acc_kasi;
           @elseif(Auth::getUser()->level==4)
           var st_pakai = data.file_doc.acc_kabid;
           @elseif(Auth::getUser()->level==5)
           var st_pakai = data.file_doc.acc_kadin;
           @else
           var st_pakai = '';
           @endif
          if (st_pakai == 'Terima') {
            var hsl = '<a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>';
          }else{
            var hsl = '<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>';
          }
          $('.panel-btn-waiting'+id_file).html(hsl);
          // $('#detail-dialog').modal('hide');
          // $('#detail-dialog').html('');
          // $('.second-modal').html('');

          // filePendukung(data.id_file);
           // datagrid.reload();
           swal("Success!", "Data Berhasil Di "+st_pakai+" !", "success");
         }else if(data.status=='fail'){
           // datagrid.reload();
           swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
         }else{
           // datagrid.reload();
           swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
         }
       });
     });
    }

</script>
