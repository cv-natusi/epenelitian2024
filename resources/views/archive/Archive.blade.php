
@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
    <h1>Sitemap</h1>
    <div class="col-lg-12 col-md-12">
	    <div class="panel panel-primary">
	      <div class="panel-heading">
	      	<h4>Details Journal</h4>
	      </div>
	      <div class="panel-body">
	      	<iframe src="{{url('/')}}/uploads/file_submissions/{{$submission->file_submission}}" type="application/pdf" width="100%" height="680px">This browser does not support PDFs. Please download the PDF to view it: Download PDF</iframe>
	      </div>
	    </div>
  	</div>
</div>
@endsection