@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
  <h1>Article in Press</h1>
    <div class="col-lg-12 col-md-12">
      <div class="item">
        <div class="content">
          @if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa9']->indonesia !!}
          @else
            {!! $bahasa['bahasa9']->inggris !!}
          @endif
          </div>
      </div>
      <hr style="  border: 1px solid DimGray;">
    </div>

    <div class="row" style="padding: 0 15%;">
    @foreach ($submission as $submission)
      <div class="col-lg-12 col-md-12 panelArch" style="margin-bottom: 15px;border-radius: 5px">
        <div class="panelIconArch">
          <i class="fa fa-file-pdf-o">
            <a href="{{url('/')}}/uploads/file_submissions/{{$submission->file_submission}}" target="_blank" style="font-size: 12px; color: red;">PDF</a>
          </i>
        </div>
        <div class="card text-left" style="margin-top: 10px">
          <div class="card-body">
            <h5 class="card-title"><a href="{{url('/')}}/uploads/file_submissions/{{$submission->file_submission}}" target="_blank" style="font-weight: 900; color: #3c3535">{{$submission->title}}</a></h5>

            @if(!empty($submission->author_submit))
              <p class="card-text" style="font-size: 14px; font-weight: bold; color: #696565">
                @foreach ($submission->author_submit as $submis)
                  {{$submis->first_name}} {{$submis->middle_name}} {{$submis->last_name}}, 
                @endforeach
              </p>
            @endif
          </div>
          <div class="card-footer text-muted" style="font-size: 13px;">
           Date {{$submission->updated_at}}
          </div>
        </div> 
      </div>
    @endforeach
  </div>
</div>
@endsection
