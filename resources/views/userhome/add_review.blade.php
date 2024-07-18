@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
      <h4 style="font-weight: bold; color: #4682B4;">Add Comment abot this Submission after In Review</h4>
      <hr style="  border: 1px solid DimGray;">
      <form method="post" enctype="multipart/form-data" action="{{ route('up_review') }}" style="margin-top: 20px;">
		{{ csrf_field() }}
        <input type="hidden" name="id_reviewer" value="{{$submission->id_reviewer}}">
		<div class="form-group">
			<label>File Upload*</label>
			<input type="file" name="file_sub" required="" class="form-control" accept=".pdf">
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-2" for="email">Accept:</label>
		    <div class="col-sm-4">
		      <input type="radio" name="status" value="accept" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Revisi:</label>
		    <div class="col-sm-4">
		      <input type="radio" name="status" value="in_revisi" class="form-control">
		    </div>
		  </div>
		<div class="form-group">
			<label>Change Comment</label>
			<textarea type="text" name="description" rows="3" placeholder="Affiliation"
				class="form-control"></textarea>
			<small class="form-text text-muted">(change comments after you give a new comment this submission).</small>
		</div>							
		<button class="btn btn-success" type="submit">Save</button>

		<hr style="border: 1px solid DimGray;"></hr>
			
	</form>      
  </div>
@endsection
@section('js')
<script type="text/javascript">
	 $('input[type=file]').on('change',function (e) {
      var extValidation = new Array(".pdf");
      var fileExt = e.target.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
      if (extValidation.indexOf(fileExt) < 0) {
          swal('Extensi File Tidak Valid !','Upload file bertipe .pdf untuk dapat melakukan upload data...','warning')
          $(this).val("")
          return false;
      }
      else return true;
    })
</script>
@endsection