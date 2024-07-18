<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
        Dokumen lengkap Hasil Penelitian
        <span style="float:right"><a data-dismiss="modal" onclick="closeModal()">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <h4 style="font-weight: bold; color: #4682B4;">Dokumen Hasil Penelitian</h4>
          <hr style="  border: 1px solid DimGray;">
          @if (!empty($pengajuan))
            @foreach ($pengajuan as $key)
              <div class="form-group m-t-0 m-b-25">
                <button class="accordion btn btn-default btn-doc">{{$key->nama_jenis}}</button>
                <div class="panel-accordion" style="display: none;">
                  @if ($key->nama_file != '')
                    @if(file_exists('uploads/hasil_penelitian/'.$key->nama_file))
                      <?php $ext = explode('.',$key->nama_file); ?>
                      @if($ext[1]=='pdf' || $ext[1]=='PDF')
                        <iframe src="{{ url('/') }}/uploads/hasil_penelitian/{{$key->nama_file}}" width="100%" height="550px"></iframe>;
                      @else
                        <img src="{{ url('/') }}/uploads/hasil_penelitian/{{$key->nama_file}}" alt="" style="width: 100%">
                      @endif
                    @else
                      <?php echo $status = 'Tidak ada file'; ?>
                    @endif
                  @endif
                </div>
              </div>
            @endforeach
          @endif
          <span class="panel-btn-waiting">
            <fieldset class="form-group">
              <label>Catatan</label>
              <textarea name="catatan" id="catatan" class="form-control">-</textarea>
            </fieldset>
            @if($permohonan->status_hasil=='Terima')
              <a href="javascript:void(0)" onclick="approve('{{ $permohonan->id_permohonan }}','Terima')" class="btn btn-success btn-approve" id="btn-approve">
                <i class="fa fa-check"><span> Publish</span></i>
              </a>
              <a href="https://smallseotools.com/plagiarism-checker/" target="_blank" class="btn btn-info">
                <i class="fa fa-link"></i> <b>Cek Plagiarsm</b>
              </a> 
              <a href="javascript:void(0)" onclick="approve('{{ $permohonan->id_permohonan }}','Tolak')" class="btn btn-danger">
                <i class="fa fa-times"><span> Tolak</span></i>
              </a>
            @elseif($permohonan->status_hasil=='Publish')
              <a href="javascript:void(0)" class="btn btn-primary">Publish</a>
            @else
              <a href="javascript:void(0)" class="btn btn-danger">Tolak</a>
            @endif
          </span>
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
      $.post('{{ route('approve_hasil') }}',{id_permohonan:id_file,status:doc_status, catatan:catatan}).done(function(data){
        if(data.status == 'success'){
          if(data.st_status=='Terima'){
            var html= '<a href="javascript:void(0)" class="btn btn-primary">Publish</a>';
          }else{
            var html= '<a href="javascript:void(0)" class="btn btn-danger">Tolak</a>';
          }
          $('.panel-btn-waiting').html(html);
          swal("Success!", "Data Berhasil Di "+data.st_status+" !", "success");
        }else if(data.status=='Tolak'){
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
