@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
    <h4 style="font-weight: 900">{{$submission->judul_penelitian}}</h4>
    <!-- @ if(!empty($submission->author_submit)) -->
      <p class="card-text" style="font-weight: 900;color: #8a8383">
        <!-- @ foreach ($submission->author_submit as $submis) -->
           {{$submission->first_name}} {{$submission->middle_name}} {{$submission->last_name}}
        <!-- @ endforeach -->
      </p>
    <!-- @ endif -->

<!--     <hr style="  border: 1px solid DimGray;">
 -->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Abstract</h4>
      </div>
      <div class="panel-body">
        <p>{!! $submission->abstrak !!}</p>
      </div>
    </div>

  <!-- <h4 style="font-weight: bold;color: #323639;">Abstract</h4>
  <p>{!! $submission->abstrak !!}</p> -->
  <?php
  // <h4 style="font-weight: bold;color: #323639;">Keywords</h4>
  // @if(!empty($submission->supplementary))
  //   <p class="card-text" >
  //     @foreach ($submission->supplementary as $supp)
  //       {{$supp->keywords}}, 
  //     @endforeach
  //   </p>
  // @endif
  ?>

  <h4 style="font-weight: bold;color: #323639;">View Full Text :</h4>
    <a href="{{url('/current/ViewFileIn/'.$submission->id_hasil_penelitian)}}" target="_blank" style="text-decoration: underline; color: red;">PDF</a>
  
  <?php
  // <h4 style="font-weight: bold;color: #323639;">References</h4>
  // <p>{{$submission->references}}</p>

  // <h4 style="font-weight: bold;color: #323639;">Supplementary File</h4>
  // @if(!empty($submission->supplementary))
  //   @foreach ($submission->supplementary as $supp)
  //     <p class="card-text">
  //         {{$supp->creator}}.{{$supp->title}}.{{$supp->publisher}},<a href="{{url('/')}}/uploads/file_submissions/{{$submission->file_submission}}" target="_blank" style="color: red; text-decoration: underline;">CrossRef</a>
  //     </p>
  //   @endforeach
  // @endif
  ?>
</div>
@endsection