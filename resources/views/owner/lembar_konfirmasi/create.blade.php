 <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis Penelitian</div>
      <div class="panel-body">
        <form class="panel-form" method="POST" enctype="multipart/form-data" action="{{ route('docreatelembar_konfir') }}"
            style="margin-top: 20px;">
            {{ csrf_field() }}
          <div class="form-group">
            <label>Ketarangan*</label>
            <input type="text" name="keterangan" class="form-control" value="">
              <textarea type="text" name="form_konfirmasi" rows="3" id="summary-ckeditor10" class="form-control"></textarea>
          </div>
          <hr style="border: 1px solid DimGray;"></hr>
          <button class="btn btn-success btn-submit" type="submit">Save</button>
          <a href="{{ route('lembar_konfirmasi') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <div class="other-page">
  </div>
  <div class="modal-dialog">
  </div>

<script src="{{ asset('vendor/ckeditor1/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'summary-ckeditor10' );
</script>
