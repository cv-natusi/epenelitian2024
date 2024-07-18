@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
  	<h3>Active Submission</h3>
  	<a href="{{url('userhome/active')}}" class="btn btn-info">Active</a>
  	<a href="{{url('userhome/archive')}}" class="btn btn-success">Archive</a>
    <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
  	<hr style="  border: 1px solid DimGray;">
	 
    <div class="tblRes">
    	<table class="table table-striped">
        <thead>
          <tr class="info">
            <th>User ID</th>
            <th>Submission ID</th>
            <th>Title</th>
            <th>Details submission</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($submission as $sub )
     		<tr>
            <td>{{$sub->users_id}}</td>
            <td>{{$sub->id}}</td>
            <td>{{$sub->title}}</td>
            <td><a href="{{url('/userhome/active/'.$sub->id)}}">View Details</a></td>
            <td>{{$sub->status}}</td>
          </tr>
  		@endforeach		        
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
