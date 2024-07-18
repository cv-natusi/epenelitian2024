<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis Penelitian</div>
      <div class="panel-body">
        <form method='post' action="{{ route('doupdatelembar_konfir') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="hidden" class="form-control" name="id_lembar" value="{{ $jenis->id_lembar}}">
          <div class="form-group">
            <label>Keterangan*</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $jenis->keterangan}}">
              <textarea type="text" name="form_konfirmasi" rows="3" id="summary-ckeditor10" class="form-control">{{ $jenis->form_konfirmasi }}</textarea>
          </div>
            <hr style="border: 1px solid DimGray;"></hr>
            <button class="btn btn-success btn-submit" type="submit">Save</button>
            <a href="{{ route('lembar_konfirmasi') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('vendor/ckeditor1/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'summary-ckeditor10' );
</script>
