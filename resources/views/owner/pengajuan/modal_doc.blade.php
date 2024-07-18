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
            <div class="form-group m-t-0 m-b-25">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @foreach($pengajuan as $itemPengajuan)

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{$itemPengajuan->id_item_permohonan}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$itemPengajuan->id_item_permohonan}}" aria-expanded="true" aria-controls="collapse{{$itemPengajuan->id_item_permohonan}}">
                      <h4 class="panel-title">{{$itemPengajuan->nama_jenis}}</h4>
                    </div>
                    <div id="collapse{{$itemPengajuan->id_item_permohonan}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$itemPengajuan->id_item_permohonan}}">
                      <div class="panel-body">

                        @if ($itemPengajuan->file_doc != '')

                          @if(file_exists('uploads/file_upload_persyaratan/'.$itemPengajuan->file_doc))

                            @php $ext = explode('.',$itemPengajuan->file_doc); @endphp
                            @if($ext[1]=='pdf' || $ext[1]=='PDF')
                              <iframe src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$itemPengajuan->file_doc}}" width="100%" height="550px"></iframe>
                            @else
                              <img src="{{ url('/') }}/uploads/file_upload_persyaratan/{{$itemPengajuan->file_doc}}" alt="" style="width: 100%">
                            @endif

                            @if(Auth::getUser()->level==1)

                              @if ($itemPengajuan->acc_admin == 'Terima')
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                              @endif
                              @if ($itemPengajuan->acc_admin == 'Tolak')
                                <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                              @endif
                              @if($itemPengajuan->acc_admin=='Menunggu' || $itemPengajuan->acc_admin=='' || $itemPengajuan->acc_admin==null)
                                <span class="panel-btn-waiting{{ $itemPengajuan->id_item_permohonan }}-{{$itemPengajuan->nama_form}}">
                                  <fieldset class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="catatanadmin_{{$itemPengajuan->nama_form}}" id="catatanadmin_{{$itemPengajuan->nama_form}}" class="form-control catatan">-</textarea>
                                  </fieldset>
                                  <a href="javascript:void(0)" onclick="approveperfile('{{ $itemPengajuan->id_item_permohonan }}','Terima','{{$itemPengajuan->nama_form}}','admin')" class="btn btn-success btn-approve" id="btn-approve">
                                    <i class="fa fa-check"><span> Terima</span></i>
                                  </a>
                                  <a href="javascript:void(0)" onclick="approveperfile('{{ $itemPengajuan->id_item_permohonan }}','Tolak','{{$itemPengajuan->nama_form}}','admin')" class="btn btn-danger">
                                    <i class="fa fa-times"><span> Tolak</span></i>
                                  </a>
                                </span>
                                <div class="clearfix" style="margin-bottom: 15px"></div>
                              @endif

                            @elseif(Auth::getUser()->level==2)

                              @if ($itemPengajuan->acc_kasi == 'Terima')
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>
                              @endif
                              @if ($itemPengajuan->acc_kasi == 'Tolak')
                                <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>
                              @endif
                              @if($itemPengajuan->acc_kasi=='Menunggu' || $itemPengajuan->acc_kasi=='' || $itemPengajuan->acc_kasi==null)
                                <span class="panel-btn-waiting{{ $itemPengajuan->id_item_permohonan }}-{{$itemPengajuan->nama_form}}">
                                  <fieldset class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="catatankasi_{{$itemPengajuan->nama_form}}" id="catatankasi_{{$itemPengajuan->nama_form}}" class="form-control catatan">-</textarea>
                                  </fieldset>
                                  <a href="javascript:void(0)" onclick="approveperfile('{{ $itemPengajuan->id_item_permohonan }}','Terima','{{$itemPengajuan->nama_form}}','kasi')" class="btn btn-success btn-approve" id="btn-approve">
                                    <i class="fa fa-check"><span> Terima</span></i>
                                  </a>
                                  <a href="javascript:void(0)" onclick="approveperfile('{{ $itemPengajuan->id_item_permohonan }}','Tolak','{{$itemPengajuan->nama_form}}','kasi')" class="btn btn-danger">
                                    <i class="fa fa-times"><span> Tolak</span></i>
                                  </a>
                                </span>
                                <div class="clearfix" style="margin-bottom: 15px"></div>
                              @endif

                            @endif


                          @else
                            Tidak ada File
                          @endif

                          {{-- tanggal???? --}}

                        @endif

                      </div>
                    </div>
                  </div>

                @endforeach

              </div>
            </div>
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
    
    function approveperfile(id_item_permohonan,doc_status,doc,user) {//anas
      if (doc_status == 'Terima') {
        var ket ='menerima?';
      }else{
        var ket ='menolak?';
      }
      
      if(user == 'admin'){
        var catatan = $('#catatanadmin_'+doc).val();
      }else if(user == 'kasi'){
        var catatan = $('#catatankasi_'+doc).val();
      }
      
        
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
        $.post('{{ route('approvePerFile') }}',{id_item_permohonan:id_item_permohonan,doc_status:doc_status, catatan:catatan, doc:doc}).done(function(data){
          if(data.status == 'success'){
            @if(Auth::getUser()->level==1)
              var st_pakai = data.file_doc.acc_admin;
            @elseif(Auth::getUser()->level==2)
              var st_pakai = data.file_doc.acc_kasi;
            @else
              var st_pakai = '';
            @endif
            if (st_pakai == 'Terima') {
              var hsl = '<a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>';
            }else if (st_pakai == 'Tolak'){
              var hsl = '<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>';
            }else{
              var hsl = ''
            }
            $('.panel-btn-waiting'+id_item_permohonan+'-'+doc).html(hsl);
            // $('#detail-dialog').modal('hide');
            
            // filePendukung(data.id_item_permohonan);
            // datagrid.reload();
            console.log(data.content)
            // $('#detail-dialog').html(data.content);
            swal("Success!", "Data Berhasil Di "+st_pakai+" !", "success");
            // $('.second-modal').html(data.content);
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
    // function approve(id_item_permohonan,doc_status) {
    //   if (doc_status == 'Terima') {
    //     var ket ='menerima?';
    //   }else{
    //     var ket ='menolak?';
    //   }
    //   var catatan = $('#catatan').val();
    //   swal({
    //     title:"Apakah anda akan "+ket,
    //     text:"Apakah anda yakin ?",
    //     type:"warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "#DD6B55",
    //     confirmButtonText: "Saya yakin!",
    //     cancelButtonText: "Batal!",
    //     closeOnConfirm: true
    //   },
    //   function(){
    //     $.post('{{ route('approveFile') }}',{id_item_permohonan:id_item_permohonan,doc_status:doc_status, catatan:catatan}).done(function(data){
    //       if(data.status == 'success'){
    //         @if(Auth::getUser()->level==1)
    //         var st_pakai = data.file_doc.acc_admin;
    //         @elseif(Auth::getUser()->level==2)
    //         var st_pakai = data.file_doc.acc_kasi;
    //         @elseif(Auth::getUser()->level==4)
    //         var st_pakai = data.file_doc.acc_kabid;
    //         @elseif(Auth::getUser()->level==5)
    //         var st_pakai = data.file_doc.acc_kadin;
    //         @else
    //         var st_pakai = '';
    //         @endif
    //         if (st_pakai == 'Terima') {
    //           var hsl = '<a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-check"><span> Dokumen sudah Diterima</span></i></a>';
    //         }else{
    //           var hsl = '<a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-times"><span> Dokumen Ditolak</span></i></a>';
    //         }
    //         $('.panel-btn-waiting'+id_item_permohonan).html(hsl);
    //         // $('#detail-dialog').modal('hide');
            
    //         // filePendukung(data.id_item_permohonan);
    //         // datagrid.reload();
    //         console.log(data.content)
    //         // $('#detail-dialog').html(data.content);
    //         swal("Success!", "Data Berhasil Di "+st_pakai+" !", "success");
    //         // $('.second-modal').html(data.content);
    //       }else if(data.status=='fail'){
    //         // datagrid.reload();
    //         swal("Maaf!", "Anda bukan pemilik berita ini !", "error");
    //       }else{
    //         // datagrid.reload();
    //         swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
    //       }
    //     });
    //   });
    // }

</script>
