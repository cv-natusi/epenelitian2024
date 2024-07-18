@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12 tbRes">
  	<h3 style="font-weight: bold;">USER HOME</h3>
	  </br>
	  <div class="tblRes">
		  <table class="table">
		    <thead>
		      <tr>
		        <th>Active</th>
		        <th>Review</th>
		        <th>Revisi</th>
		        <th>Archive</th>
		        <th>New Submission</th>
            <th>Upload File Pendukung</th>
		      </tr>
		    </thead>
		    <tbody>		    	
		      <tr>
		        <th><a href="{{url('userhome/active')}}" style="text-decoration: underline;">({{$submissions_count}})Active</a></th>
		        <th><a href="{{url('userhome/review')}}" style="text-decoration: underline;">({{$review_count}})Review</a></th>
		        <th><a href="{{url('userhome/revisi')}}" style="text-decoration: underline;">({{$revisi_count}})Revisi</a></th>
		        <th><a href="{{url('userhome/archive')}}" style="text-decoration: underline;">({{$accept_count}})Archive</a></th>
		        <th><a href="{{url('userhome/submit/1')}}" style="text-decoration: underline;">New Submission</a></th>
            <th><a href="{{url('userhome/up_doc')}}" style="text-decoration: underline;">Upload File-file</a></th>
		      </tr>
		    </tbody>
		  </table>
	  </div>
	  <h3 style="font-weight: bold;">Cek Plagiarism</h3>
		  <p>
			@if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa16']->indonesia !!}
          @else
            {!! $bahasa['bahasa16']->inggris !!}
          @endif
          <a href="https://smallseotools.com/plagiarism-checker/" style="color: red;text-decoration: underline;">click here.</a></p>
	<hr style="  border: 1px solid DimGray;">
	<h3 style="font-weight: bold;">My Account</h3>
	  	<li><a href="{{ route('edit_profil')}}">Edit My Profile</a></li>
	  	<li><a href="{{ route('update_password') }}">Change My Password</a></li>
	  	<li><a href="{{ url('/logout')}}">Logout</a></li>
	<hr style="  border: 1px solid DimGray;">
  </div>

  <script type="text/javascript">
  	var lbrRes = $('.tbRes').width();
  	$('.tblRes').attr('style','max-width:'+lbrRes+'px;overflow-x:scroll;')
  	console.log(lbrRes);
  </script>
@endsection
