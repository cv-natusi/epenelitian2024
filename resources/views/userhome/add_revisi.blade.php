@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
      <h4 style="font-weight: bold; color: #4682B4;">View Fix it your File, Than Upload again your file.</h4>
      <hr style="  border: 1px solid DimGray;">
      <form method="post" enctype="multipart/form-data" action="{{ route('Update_Sub') }}" style="margin-top: 20px;">
		{{ csrf_field() }}
        <input type="hidden" name="id" value="{{$submission->id}}">
		<div class="form-group">
			<label>File Upload*</label>
			<input type="file" name="file_submission" required="" class="form-control" accept=".pdf">
		</div>		
		<button class="btn btn-success" type="submit">Save</button>
		<hr style="border: 1px solid DimGray;"></hr>			
	</form>      
  </div>
@endsection
@section('js')
<script type="text/javascript">
	 $('input[type=file]').on('change',function (e) {
        var extValidation = new Array(".jpg", ".jpeg", ".pdf");
        var fileExt = e.target.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (extValidation.indexOf(fileExt) < 0) {
            swal('Extensi File Tidak Valid !','Upload file bertipe .jpg, .jpeg atau .pdf, untuk dapat melakukan upload data...','warning')
            $(this).val("")
            return false;
        }
        else return true;
    })
</script>
@endsection