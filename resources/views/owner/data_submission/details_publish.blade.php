<div class="modal fade" id="detail-dialog" tabindex="-1" role="dialog" aria-labelledby="product-detail-dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header" style="width: 100%">
          All Author Details
        <span style="float:right"><a data-dismiss="modal">Close</a></span>
      </div>
      <div class="modal-body">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <h4 style="font-weight: bold; color: #4682B4;">Author Submission</h4>
          <hr style="  border: 1px solid DimGray;">
          <table class="table">
            <tbody>
            @if(!empty($submission->author_submit))
              @foreach ($submission->author_submit as $aut)
                <tr>
                  <th>first Name</th>
                  <td> : {{$aut->first_name}}</td>           
                </tr>
                <tr>
                  <th>Email</th>
                  <td> : {{$aut->email}}</td>            
                </tr>
                <tr>
                  <th>Orcid ID</th>
                  <td> : {{$aut->id_orcid}}</td>            
                </tr>
                <tr>
                  <th>Affiliation</th>
                  <td> : {{$aut->affiliation}}</td>            
                </tr>
                <tr>
                  <th>Interest</th>
                  <td> : {!!$aut->interest!!}</td>           
                </tr>
                <tr>
                  <th>Bio</th>
                  <td> : {!!$aut->bio!!}</td>            
                </tr>
                <tr>
                  <td colspan="2">
                  <hr style="  border: 1px solid DimGray;">                              
                  </td>
                </tr>
              @endforeach
            @endif
            </tbody>
          </table>

          <h4 style="font-weight: bold; color: #4682B4;">Supplementary File</h4>
          <hr style="  border: 1px solid DimGray;">
          <table class="table">
            <tbody>
                @if(!empty($submission->supplementary))
                  @foreach ($submission->supplementary as $sup)
                  <tr>
                    <th>Title</th>
                    <td> : {{$sup->title}}</td>           
                  </tr>
                  <tr>
                    <th>File</th>
                    <td> : {{$sup->file}}</td>            
                  </tr>
                  <tr>
                    <th>Creator</th>
                    <td> : {{$sup->creator}}</td>            
                  </tr>
                  <tr>
                    <th>Type</th>
                    <td> : {{$sup->type}}</td>            
                  </tr>
                  <tr>
                    <th>Descriptions</th>
                    <td> : {{$sup->description}}</td>           
                  </tr>  
                  @endforeach              
                @endif                      
            </tbody>
          </table>

          <h4 style="font-weight: bold; color: #4682B4;">Details Reviewers</h4>
          <hr style="  border: 1px solid DimGray;">
          <table class="table">
            <tbody>
                @if(!empty($submission->reviewer))
                  @foreach ($submission->reviewer as $rev)
                  <tr>
                    <th>USER ID</th>
                    <td> : {{$rev->users_id}}</td>           
                  </tr>
                   <tr>
                    <th>First Name</th>
                    <td> : {{$rev->first_name}}</td>           
                  </tr>
                  <tr>
                    <th>File</th>
                    <td> : {{$rev->file_sub}}</td>            
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td> : {{$rev->description}}</td>            
                  </tr>
                  <tr>
                    <td colspan="2">
                    <hr style="  border: 1px solid DimGray;">                              
                    </td>
                  </tr>                 
                  @endforeach              
                @endif                      
            </tbody>
          </table>

        </div>
      </div>
      <div class="clearfix" style='padding-bottom:20px'></div>
    </div>
  </div>
</div>      
<script type="text/javascript">
  var onLoad = (function() {
    $('#detail-dialog').find('.modal-dialog').css({
        'width'     : '60%'
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
      