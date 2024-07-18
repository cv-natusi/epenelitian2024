<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
        Form Menu
        <span style="float:right"><a data-dismiss="modal">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <form id="commentForm" method="post">
            <input type="hidden" name="id_menu" value="{{$menu->id_menu}}">
            <table class="table table-bordered">
              <tr>
                <th>Bahasa Indonesia</th>
                <th>Bahasa Inggris</th>
              </tr>
              <tr>
                <td><input type="text" name="menu_indo" class="form-control" value="{{$menu->nama_menu}}" required></td>
                <td><input type="text" name="menu_inggris" class="form-control" value="{{$menu->name_menu}}" required></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" value="Simpan" class="btn btn-primary"></td>
              </tr>
            </table>
          </form>
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
          // window.location = "{{url('/')}}/owner/data_master/menu";
          location.reload()
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
