@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
        {{-- Mulai dari Sini Gayn --}}
          <form method='post' action="{{route('doupdate_bahasa')}}">
            {{csrf_field()}}
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <input type="hidden" class="form-control" name="id" value="{{$bahasa->id_bahasa}}">
                <div class="col-md-6" style="margin-top: 10px;">
                  <label class="">B Inggris</label>
                    <textarea type="text" name="inggris" rows="3" id="summary-ckeditor2" class="form-control">{{$bahasa->inggris}}</textarea>
                </div>
                <div class="col-md-6" style="margin-top: 10px;">
                  <label>B Indonesia</label>
                    <textarea type="text" name="indonesia" rows="3" id="summary-ckeditor" class="form-control">{{$bahasa->indonesia}}</textarea>
                </div>

                <input type="submit" name="" value="Simpan" class="form-control btn btn-primary" style="margin-top: 20px;">

              </div>
            </div>
            </form>
        {{-- Selesai --}}
      </div>
    </div>
  </div>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
CKEDITOR.replace( 'summary-ckeditor2' );
</script>
@endsection
