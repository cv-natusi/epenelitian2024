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
                  @endif

                  @if(Auth::getUser()->level==6)
                    @if ($key->status_verifikasi == 'Terima')
                      <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                    @endif
                    @if ($key->status_verifikasi == 'Tolak')
                      <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                    @endif
                    @if($key->status_verifikasi=='Menunggu')
                      <span class="panel-btn-waiting{{ $key->id_verifikasi_tp }}">
                        <fieldset class="form-group">
                          <label>Catatan</label>
                          <textarea name="catatan" id="catatan" class="form-control">-</textarea>
                        </fieldset>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_verifikasi_tp }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                          <i class="fa fa-check"><span> Terima</span></i>
                        </a>
                        <a href="javascript:void(0)" onclick="approve('{{ $key->id_verifikasi_tp }}','Tolak')" class="btn btn-danger">
                          <i class="fa fa-times"><span> Tolak</span></i>
                        </a>
                      </span>
                    @endif
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

   function approve(id_verifikasi_tp,status_verifikasi) {
      if (status_verifikasi == 'Terima') {
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
       $.post('{{ route('approveFileVerifikasi') }}',{id_verifikasi_tp:id_verifikasi_tp,status_verifikasi:status_verifikasi, catatan:catatan}).done(function(data){
         if(data.status == 'success'){           
          if (data.data.status_verifikasi == 'Terima') {
            var hsl = '<a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>';
          }else{
            var hsl = '<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>';
          }
          $('.panel-btn-waiting'+id_verifikasi_tp).html(hsl);
          // $('#detail-dialog').modal('hide');
          // $('#detail-dialog').html('');
          // $('.second-modal').html('');

          // filePendukung(data.id_verifikasi_tp);
           // datagrid.reload();
           swal("Success!", "Data Berhasil Di "+data.data.status_verifikasi+" !", "success");
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
