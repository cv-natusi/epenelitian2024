@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
        {{-- Mulai dari Sini Gayn --}}
        <form method='post' action="{{route('updatecontact')}}">
          {{csrf_field()}}
            <textarea class="form-control" id="summary-ckeditor" name="contact">{!!$identitas->contact!!}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        {{-- Selesai --}}
      </div>
    </div>
  </div>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection
