@extends('layout.main')
@section('content')
<style>
.btnabout{
  background-image: linear-gradient(#7ea3d5, #547AB8 , #579BD4);
  font-weight: bold;
}
</style>
  <div class="col-lg-12 col-md-12">
    <div class="list-group liAbJournal">
        <h4><Button class="btn btnabout">
          @if(Session::get('bahasa') == 'indonesia')
            {!! $bahasa['bahasa54']->indonesia !!}
          @else
            {!! $bahasa['bahasa54']->inggris !!}
          @endif
        </Button></h4>
          <li><a href="about/sop">
            <i class="fa fa-tags"></i>
            @if(Session::get('bahasa') == 'indonesia')
              {!! $bahasa['bahasa55']->indonesia !!}
            @else
              {!! $bahasa['bahasa55']->inggris !!}
            @endif</a>
          </li>
          <li><a href="about/contact">
            <i class="fa fa-list"></i>
            @if(Session::get('bahasa') == 'indonesia')
              {!! $bahasa['bahasa56']->indonesia !!}
            @else
              {!! $bahasa['bahasa56']->inggris !!}
            @endif
             <span style="font-weight: bold; color: red;"> <i class="fa fa-download"></i> Download contoh File Orsinilitas disini.</span></a>
          </li>
    </div>
    <div class="text-center" style="margin: 20px 0px;">
      <h3 style="font-weight: bold;">Alur Penelitian</h3>
      <hr>
      <iframe src="{{url('uploads/files/alur.pdf')}}" width="85%" height="700px"></iframe>
    </div><br>
</div>
@endsection
