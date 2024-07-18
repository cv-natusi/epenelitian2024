@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
    <h1>
    @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa2']->indonesia !!}
      @else
        {!! $bahasa['bahasa2']->inggris !!}
      @endif
  	</h1>
    <div class="list-group">
        <div class="col-lg-12 col-md-12">
            {{-- {!!$announcement->announcement!!} --}}
        </div>
    </div>
    <hr style="  border: 1px solid DimGray;">
    <p style="font-weight: bold;">
    	@if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa4']->indonesia !!}
      @else
        {!! $bahasa['bahasa4']->inggris !!}
      @endif
    </p>
</div>
@endsection
