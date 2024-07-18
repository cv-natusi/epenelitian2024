<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
          Dokumen lengkap Pengajuan Penelitian
        <span style="float:right"><a data-dismiss="modal" onclick="closeModal()">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <h4 style="font-weight: bold; color: #4682B4;">Biodata Peneliti</h4>
          <hr style="  border: 1px solid DimGray;">
            <div class="form-group m-t-0 m-b-25">
              <table class="table">
                <tbody>
                    <tr>
                      <th>Nama Lengkap</th>
                        <td>: {{$profile->first_name}} {{$profile->middle_name}} {{$profile->last_name}}</td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                        <td>: {{$profile->gender}}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                        <td>: {{$profile->email}}</td>
                    </tr>
                    <tr>
                      <th>Phone</th>
                        <td>: {{$profile->phone}}</td>
                    </tr>             
                    <tr>
                      <th>Tanggal Pengajuan</th>
                        <td>: {{$pengajuan->tgl_pengajuan}}</td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
      <div class="clearfix" style='padding-bottom:20px'></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $.validator.setDefaults({
    submitHandler: function() {
      var data = $('#commentForm').serialize();
      $.post("{{route('simpan_menu_owner')}}",data,function(data){
        if(data.status=='success'){
          window.location = "{{url('/')}}/owner/data_master/menu";
        }else{
          swal('Tidak bisa disimpan');
        }
      });
    }
  });

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
</script>
