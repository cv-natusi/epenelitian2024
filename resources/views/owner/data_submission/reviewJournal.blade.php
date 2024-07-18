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
        <form class="panel-form" method="POST" enctype="multipart/form-data" action="{{ route('addReviewer') }}"
            style="margin-top: 20px;">
            {{ csrf_field() }}
          <button type="button" id="formButton" style="display: block; margin-top: 10px;" class="btn btn-primary col-sm btn-add-reviewer">Add Reviewer</button>
          <div id="panel-form" class="user" style="display: none;">
            <input type="hidden" name="jumlah_reviewer" class="noReviewer">
            <input type="hidden" value="{{$submission->id}}" name="submission_id">
            <div class="fmAut"></div>
            <!-- <button type="submit" class="btn btn-success">SAVE</button> -->
          </div>
          <div class="form-group">
          </br>
            <label>Chosee Reviewer:</label>
             <select class="form-control" id="sel1" name="reviewer[0]">
                @foreach($profile as $us)
                  <option value="{{$us->users_id}}">{{$us->first_name}} {{$us->middle_name}} {{$us->last_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <label>Add Descriptions*</label>
            <textarea type="text" class="form-control" name="descriptions[0]" class="form-control" row="3"></textarea>
          </div>
          <hr style="border: 1px solid DimGray;"></hr>
          <button class="btn btn-success btn-submit" type="submit" disabled>Save</button>
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
  $('.btn-add-reviewer').click(function(){
    var no = $('.noReviewer').val();
    if(no == ''){
      no = 1;
    }else{
      no++;
    }
    if (no >= 1) {
      $('.btn-submit').removeAttr('disabled');
    }else{
      $('.btn-submit').attr('disabled',true);
    }
    $('#panel-form').show();

    var tag = '';
    tag += '<div class="form-group">';
    tag += '<label>chosee Reviewer:</label>';
    tag += '<select class="form-control" id="sel1" name="reviewer['+parseInt(no)+']">';
    tag += '@foreach($profile as $us)';
    tag += '<option value="{{$us->users_id}}">{{$us->first_name}} {{$us->middle_name}} {{$us->last_name}}</option>';
    tag += '@endforeach';
    tag += '</select>';
    tag += '</div>';
    tag += '<div class="form-group">';
    tag += '<label>Add Declarations *</label>';
    tag += '<textarea type="text" class="form-control" name="descriptions['+parseInt(no)+']" class="form-control" row="3"></textarea>';
    tag += '</div>';
    tag += '<div class="clearfix"></div>';
    tag += '<hr style="border: 1px solid DimGray;"></hr>';
    $('.fmAut').append(tag);
    $('.noReviewer').val(no);
  });
</script>