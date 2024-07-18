@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
  <a href="{{url('about/')}}" class="btn btn-primary btn-sm" style="float: right;font-size:12px;"><i class="fa fa-backward"> Kembali</i></a>
  <h1>Tata cara</h1>
   <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
            <b>
             @if(Session::get('bahasa') == 'indonesia')
                {!! $bahasa['bahasa55']->indonesia !!}
              @else
                {!! $bahasa['bahasa55']->inggris !!}
              @endif
            </b>
        </h4>
      </div>
      <div class="panel-body">
          <iframe src="{{url('/')}}/uploads/files/Doc5.pdf" type="application/pdf" width="100%" height="680px">This browser does not support PDFs. Please download the PDF to view it: Download PDF</iframe>
        </br>
          <iframe src="{{url('/')}}/uploads/files/alur.pdf" type="application/pdf" width="100%" height="750px">This browser does not support PDFs. Please download the PDF to view it: Download PDF</iframe>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
      $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
      $(this).siblings('.panel-heading').removeClass('active');
    });
  </script>
@endsection
