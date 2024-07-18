<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
          Perihal Surat yang akan dicetak
        <span style="float:right"><a data-dismiss="modal">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <h4 style="font-weight: bold; color: #4682B4;">Surat Ijin</h4>
          <hr style="  border: 1px solid DimGray;">
          <div class="form-group">
            <label class="col-lg-4 col-md-4">Perihal</label>
            <div class="col-lg-8 col-md-8">
              <select class="form-control" name="jenis" onchange="view_surat(this)">
                <option value="">.:: Perihal Surat ::.</option>
                @if(!empty($lmb))
                  @foreach($lmb as $l)
                    @if($l->id_lembar!=1)
                      <option value="{{$l->id_lembar}}">{{$l->keterangan}}</option>
                    @else
                    <!-- UNTUK NOTA DINAS  -->
                      <!-- @ if(strpos($permohonan->tempat_penelitian, $permohonan->unit_kerja) !== false){ -->
                        <!-- <option value="{{$l->id_lembar}}">{{$l->keterangan}}</option> -->
                      <!-- @ endif -->
                      @foreach($tmpt as $t)
                        @if(strpos($permohonan->unit_kerja, $t->nama_tempat) !== false){
                          @if($t->kategori == "Internal"){
                            <option value="{{$l->id_lembar}}">{{$l->keterangan}}</option>
                          @endif
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <a href="javascript:void(0)" class="btn btn-success" onclick="cetak_surat()"><i class="fa fa-print"></i>Cetak</a>
          </div>
          <div class="col-lg-12 col-md-12">
            <div id="view-surat">

            </div>
          </div>
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

    function view_surat(ini){
      if(ini.value==''){
        $('#view-surat').html('');
      }else{
        $.post("{{ route('view-surat-ijin') }}",{kategori:ini.value,permohonan:'{{$permohonan->id_permohonan}}'},function(data){
          if(data.status=='success'){
            $('#view-surat').html(data.content);
          }else{
            $('#view-surat').html('');
          }
        });
      }
    }

    function cetak_surat(){
      var jenis = $('select[name=jenis]').val();
      if(jenis==''){

      }else{
        window.open("{{url('/')}}/api/cetak_surat_ijin-{{$permohonan->id_permohonan}}-"+jenis);
      }
    }
</script>
