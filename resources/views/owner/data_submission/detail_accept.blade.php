<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Details Submission and Author</div>
      <div class="panel-body">
        <table class="table">
          <tbody>
              <tr>
                <th>Submission ID </th>
                  <td> : {{$submission->id}}</td>           
              </tr>                  
              <tr>
                <th>Title</th>
                  <td> : {{$submission->title}}</td>            
              </tr>
              <tr>
                <th>Abstract</th>
                  <td> : {{$submission->abstract}}</td>            
              </tr>
              <tr>
                <th>Agencies</th>
                  <td> : {{$submission->agencies}}</td>            
              </tr>
              <tr>
                <th>Reference</th>
                  <td> : {{$submission->references}}</td>            
              </tr>
              <tr>
                <th>Comments</th>
                  <td> : {!!$submission->comments!!}</td>            
              </tr>                  
              <tr>
                <th><a href="javascript:void(0)" class="btn btn-sm btn-info m-0" onclick="form('{{$submission->id}}')"><span class="fa fa-picture-o"></span> &nbsp; Details Author & Reviewers</a></th>
                <th><a href="" class="btn btn-sm btn-info m-0">BACK</a></th>
              </tr>              
          </tbody>
        </table>

         <hr style="border: 1px solid DimGray;"></hr>
          <form method="post" enctype="multipart/form-data" action="{{ route('UpdateAccept') }}" style="margin-top: 20px;">
            {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$submission->id}}">
              <div class="form-group">
                <label>Convert File Submission to PDF*</label>
                <input type="file" name="file_submission" required="" class="form-control">
              </div>    
              <button class="btn btn-success" type="submit">Save</button>
              <hr style="border: 1px solid DimGray;"></hr>      
          </form>      

      </div>
    </div>
  </div>
</div>
<div class="other-page">
  </div>
  <div class="modal-dialog">
</div>
<script type="text/javascript">
   $('input[type=file]').on('change',function (e) {
      var extValidation = new Array(".jpg", ".jpeg");
      var fileExt = e.target.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
      if (extValidation.indexOf(fileExt) < 0) {
          swal('Extensi File Tidak Valid !','Upload file bertipe .jpg, .jpeg untuk dapat melakukan upload data...','warning')
          $(this).val("")
          return false;
      }
      else return true;
    })
</script>