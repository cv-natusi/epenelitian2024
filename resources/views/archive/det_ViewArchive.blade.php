@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
    <h4 style="font-weight: 900">{{$submission->title}}</h4>
    @if(!empty($submission->author_submit))
      <p class="card-text" style="font-weight: 900;color: #8a8383">
        @foreach ($submission->author_submit as $submis)
          {{$submis->first_name}} {{$submis->middle_name}} {{$submis->last_name}}, 
        @endforeach
      </p>
    @endif

    <hr style="  border: 1px solid DimGray;">


  <h4 style="font-weight: bold;color: #323639;">Abstract</h4>
  <p>{{$submission->abstract}}</p>

  <h4 style="font-weight: bold;color: #323639;">Keywords</h4>
  @if(!empty($submission->supplementary))
    <p class="card-text" >
      @foreach ($submission->supplementary as $supp)
        {{$supp->keywords}}, 
      @endforeach
    </p>
  @endif

  <h4 style="font-weight: bold;color: #323639;">View Full Text</h4>
  <p><a href="{{url('/archive/ViewFile/'.$submission->id)}}" target="_blank" style="color: red; text-decoration: underline;">PDF</a></p>
  <h4 style="font-weight: bold;color: #323639;">References</h4>
  <p>{{$submission->references}}</p>

  <h4 style="font-weight: bold;color: #323639;">Supplementary File</h4>
  @if(!empty($submission->supplementary))
    @foreach ($submission->supplementary as $supp)
      <p class="card-text">
          {{$supp->creator}}.{{$supp->title}}.{{$supp->publisher}},<a href="{{url('/')}}/uploads/files/{{$supp->file}}" target="_blank" style="color: red; text-decoration: underline;">CrossRef</a>
      </p>
    @endforeach
  @endif

  <h4 style="font-weight: bold;">Support contact Authors :</h4>
   @if(!empty($submission->author_submit))
    <p class="card-text" style="text-decoration: underline;">
      @foreach ($submission->author_submit as $submis)
        {{$submis->email}}</br>
      @endforeach
    </p>
  @endif

</div>
@endsection