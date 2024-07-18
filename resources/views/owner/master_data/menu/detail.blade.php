    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            {{$title}} | {{$id->file_submission}}
          </div>
        </div>
      </div>
    </div>
    <a href="" class="btn btn-primary">BACK</a>
    <iframe src="{{url('/')}}/uploads/file_submissions/{{$id->file_submission}}" type="application/pdf" width="100%" height="580px">
      This browser does not support PDFs. Please download the PDF to view it: Download PDF
      </iframe>
