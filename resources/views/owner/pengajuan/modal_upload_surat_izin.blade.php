<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
<form method="post" action="{{ route('uploadSuratIzin') }}" enctype="multipart/form-data">
  {{csrf_field()}}
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header" style="width: 100%">
            Upload Surat Izin
          <span style="float:right"><a data-dismiss="modal" {{-- onclick="closeModal()" --}}>Close</a></span>
        </div>
        <div class="modal-body">
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h4 style="font-weight: bold; color: #4682B4;">Upload Surat Izin Disini</h4>
            <hr style="  border: 1px solid DimGray;">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"> Surat Izin Kegiatan:</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" accept="application/pdf" name="upload_surat_izin" id="upload_surat_izin" placeholder="Upload Surat Izin Kegiatan">
                    
                </div>
                <div class="clearfix" style='padding-bottom:20px'></div>
                @if($pengajuan->upload_surat_izin)
                  <iframe src="{{ asset('uploads/file_upload_persyaratan/'.$pengajuan->upload_surat_izin) }}" id="viewer" frameborder="0" width="100%" height="600"></iframe>
                @else
                  <iframe id="viewer" frameborder="0" width="100%" height="600"></iframe>
                @endif
                <input type="hidden" name="docOld" value="{{ $pengajuan->upload_surat_izin }}"/>
                <input type="hidden" name="id_permohonan" value="{{ $id_permohonan }}"/>
                <button class="btn btn-success btn-approve" type="submit">{{ $pengajuan->upload_surat_izin ? 'Upload Ulang Surat Ijin' : 'Upload' }}</button>
            </div>
          </div>
        </div>
        <div class="clearfix" style='padding-bottom:20px'></div>
      </div>
    </div>
</form>
  </div>
  <script type="text/javascript">
    $().ready(function() {
      // validate the comment form when it is submitted
      $("#commentForm").validate();
    });

    $('#upload_surat_izin').change(function(){
      pdffile=this.files[0];
      pdffile_url=URL.createObjectURL(pdffile);
      $('#viewer').attr('src',pdffile_url);
    })
  
    $('input[type=file]').on('change',function (e) {
      var extValidation = new Array(".pdf");
      var fileExt = e.target.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
      if (extValidation.indexOf(fileExt) < 0) {
          swal('Extensi File Tidak Valid !','Upload file bertipe .pdf untuk dapat melakukan upload data...','warning')
          $(this).val("")
          return false;
      }
      else return true;
    })

      var onLoad = (function() {
          $('#detail-dialog').find('.modal-dialog').css({
              'width'     : '60%'
          });
          $('#detail-dialog').modal('show');
      })();
  
      $('#detail-dialog').on('hidden.bs.modal', function () {
          $('.modal-dialog').html('');
      });
  
      
    //  function approve(id_item_permohonan) {
    //      var upload_surat_izin = $('#upload_surat_izin').val();
    //     // if (doc_status == 'Terima') {
    //     //   var ket ='menerima?';
    //     // }else{
    //     //   var ket ='menolak?';
    //     // }
    //     // var catatan = $('#catatan').val();
    //     swal({
    //      title:"Apakah anda akan upload surat izin?",
    //      text:"Apakah anda yakin ?",
    //      type:"warning",
    //      showCancelButton: true,
    //      confirmButtonColor: "#DD6B55",
    //      confirmButtonText: "Saya yakin!",
    //      cancelButtonText: "Batal!",
    //      closeOnConfirm: true
    //    },
    //    function(){
    //      $.post('{{ route('uploadSuratIzin') }}',{id_item_permohonan:id_item_permohonan,upload_surat_izin:upload_surat_izin}).done(function(data){
    //        if(data.status == 'success'){
    //          swal("Success!", "Upload Surat Izin Berhasil!", "success");
    //         // $('.second-modal').html('');
    //        }else if(data.status=='fail'){
    //          // datagrid.reload();
    //          swal("Maaf!", "Upload Surat izin Gagal !", "error");
    //        }else{
    //          // datagrid.reload();
    //          swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
    //        }
    //      });
    //    });
    //   }
  
  </script>
  