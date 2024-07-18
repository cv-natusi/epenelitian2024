@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12" style="background-color: #f7f7f7">
    <h1> 
      @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa6']->indonesia !!}
      @else
        {!! $bahasa['bahasa6']->inggris !!}
      @endif
    </h1>
    <div class="col-lg-12 col-md-12">
      @foreach($tahun as $thn)
        <h3>{{ $thn->tahun }}</h3>
        <ul>
          <li><a href="{{url('/archive/viewArchive', [$thn->tahun, 1])}}">
            @if(Session::get('bahasa') == 'indonesia')
              {!! $bahasa['bahasa7']->indonesia !!}
            @else
              {!! $bahasa['bahasa7']->inggris !!}
            @endif {{ $thn->tahun }})</a>
          </li>
          <li><a href="{{url('/archive/viewArchive', [$thn->tahun, 2])}}">
            @if(Session::get('bahasa') == 'indonesia')
              {!! $bahasa['bahasa8']->indonesia !!}
            @else
              {!! $bahasa['bahasa8']->inggris !!}
            @endif {{ $thn->tahun }})</a>
          </li>
        </ul>
        <hr style="border-top: 2px dotted;">
      @endforeach
    </div>
  </div>
@endsection