@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
    <h1>E-Penelitian</h1>
      <div class="item">
        <div class="col-lg-12 col-md-12">
          @if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa1']->indonesia !!}
          @else
            {!! $bahasa['bahasa1']->inggris !!}
          @endif
          <hr style="border-top: 1px dotted;">
        </div>
      </div>

    <h3>
      @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa2']->indonesia !!}
      @else
        {!! $bahasa['bahasa2']->inggris !!}
      @endif
    </h3>
    <hr style="  border: 1px solid DimGray;">
    <div class="col-lg-12 col-md-12">
      <h4>@if(Session::get('bahasa') == 'indonesia')
          {!! $bahasa['bahasa3']->indonesia !!}
        @else
          {!! $bahasa['bahasa3']->inggris !!}
        @endif</h4>

        @if(Session::get('bahasa') == 'indonesia')
          {!! $bahasa['bahasa4']->indonesia !!}
        @else
          {!! $bahasa['bahasa4']->inggris !!}
        @endif
      <hr style="border-top: 1px dotted;">
    </div>
    <h3>
      @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa5']->indonesia !!}
      @else
        {!! $bahasa['bahasa5']->inggris !!}
      @endif
    </h3>
    <hr style="  border: 1px solid DimGray;">
    <div class="row" style="padding: 0 15%;">
      @foreach ($submission as $submission)
        <div class="col-lg-12 col-md-12 panelArch" style="margin-bottom: 10px;border-radius: 5px">
          <div class="panelIconArch">
            <i class="fa fa-file-pdf-o">
              <a href="{{url('/current/ViewFileIn/'.$submission->id_hasil_penelitian)}}" target="_blank" style="color: red; font-size: 12px;">PDF</a>
            </i>
          </div>
          <div class="card text-left" style="margin-top: 10px">
            <div class="card-body">
              <h5 class="card-title"><a href="{{url('/current/viewCurrentIn/'.$submission->id_hasil_penelitian)}}" style="font-weight: 900; color: #3c3535">{{$submission->judul_penelitian}}</a></h5>

                <p class="card-text" style="font-size: 14px;color: #696565;font-style: italic;">
                    {{$submission->first_name}} {{$submission->middle_name}} {{$submission->last_name}}
                </p>
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
