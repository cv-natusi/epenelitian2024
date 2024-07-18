<form method='post' action="{{ route('doup_bahasa') }}" enctype='multipart/form-data'>
  {{ csrf_field() }}
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
      </div>
    </div>
  </div>
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
      <input class="btn btn-success" type="submit" value=Simpan style="margin-top: 10px; width:48%">
      <a href="{{ route('bahasa') }}" class="btn btn-danger" style="margin-top: 10px; width:48%;float:right;">Kembali</a>
    </div>
  </div>
</form>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor2' );
  </script>
