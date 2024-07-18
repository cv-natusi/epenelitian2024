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
                <th><a href="javascript:void(0)" class="btn btn-sm btn-info m-0" onclick="form('{{$submission->id}}')"><span class="fa fa-picture-o"></span> &nbsp; Details Author</a></th>
                <th><a href="" class="btn btn-sm btn-info m-0">BACK</a></th>
              </tr>              
          </tbody>
        </table>
        <hr style="border: 1px solid DimGray;"></hr>
      </div>
    </div>
  </div>
</div>
<div class="other-page">
  </div>
  <div class="modal-dialog">
</div>