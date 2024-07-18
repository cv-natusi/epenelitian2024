<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
        Gambar User
        <span style="float:right"><a data-dismiss="modal">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          {{-- Isi --}}
          <div class="text-center">
            <img src="{{url('/')}}/uploads/images/{{ $users_id->image }}" class="rounded" alt="" width="300px;" height="300px;">
          </div>
        </div>
      </div>
      <div class="clearfix" style='padding-bottom:20px'></div>
    </div>
  </div>
</div>      
<script type="text/javascript">

  var onLoad = (function() {
    $('#detail-dialog').find('.modal-dialog').css({
        'width'     : '40%'
      });
    $('#detail-dialog').modal('show');
  })();
  $('#detail-dialog').on('hidden.bs.modal', function () {
    $('.modal-dialog').html('');
  })

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
</script>
      