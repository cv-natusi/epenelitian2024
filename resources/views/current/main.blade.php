@extends('layout.main')
@section('content')
<div class="row" style="padding: 0 15%;">
    @foreach ($submission as $submission)
      <div class="col-lg-12 col-md-12 panelArch" style="margin-bottom: 10px;border-radius: 5px">
        <div class="panelIconArch">
          <i class="fa fa-file-pdf-o">
            <a href="{{url('/current/ViewFileIn/'.$submission->id_hasil_penelitian)}}" target="_blank" style="color: red; font-size: 12px;">PDF</a>
          </i>
        </div>
        <div class="card text-left" style="margin-top: 15px">
          <div class="card-body">
            <h5 class="card-title"><a href="{{url('/current/viewCurrentIn/'.$submission->id_hasil_penelitian)}}" style="font-weight: 900; color: #3c3535">{{$submission->judul_penelitian}}</a></h5>

            <!-- @ if(!empty($submission->author_submit)) -->
              <p class="card-text" style="font-size: 14px;color: #696565;font-style: italic;">
                <!-- @ foreach ($submission->author_submit as $submis) -->
                  {{$submission->first_name}} {{$submission->middle_name}} {{$submission->last_name}}
                <!-- @ endforeach -->
              </p>
            <!-- @ endif -->
          </div>
          <!-- <div class="card-footer text-muted" style="font-size: 13px;">
           Date {{$submission->updated_at}}
          </div> -->
        </div> 
      </div>
    @endforeach
</div>
@endsection
