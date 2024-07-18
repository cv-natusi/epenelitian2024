@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
  	<h3>Active Submission</h3>
  	<a href="{{url('userhome/active')}}" class="btn btn-warning">Active</a>
  	<a href="{{url('userhome/archive')}}" class="btn btn-success">Archive</a>  
    <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
  	<hr style="  border: 1px solid DimGray;">
	
	<div class="tbRes">
    <table class="table table-striped">
      <thead>
        <tr class="info">
          <th>Rev ID</th>
          <th>Sub ID</th>
          <th>Title</th>
          <th>Descriptiions</th>
          <th>View & Download</th>
          <th>Create</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      @if (!empty($submission))      
       @foreach ($submission as $sub )
        <tr>
          <td>{{$sub->id}}</td>
          <td>{{$sub->id_sub}}</td>
          <td>{{$sub->title}}</td>
          <td>{!!$sub->description!!}</td>
          <td><a href="{{url('/')}}/uploads/file_submissions/{{$sub->file_submission}}" target="_blank">{{$sub->file_submission}}</a></td>
          <td><a href="{{url('/userhome/review/'.$sub->id_sub)}}">Add Comment</a></td>
          <td>{{$sub->sub_sta}}</td>
        </tr>
       @endforeach            
      @endif
      </tbody>
    </table>
  </div>
    <hr style="  border: 1px solid DimGray;">
  </div>
  <script type="text/javascript">
    var lbrRes = $('.tbRes').width();
    $('.tblRes').attr('style','max-width:'+lbrRes+'px;overflow-x:scroll;')
    console.log(lbrRes);
  </script>
@endsection
