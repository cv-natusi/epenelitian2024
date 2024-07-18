 <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Tempat Penelitian</div>
      <div class="panel-body">
        <form class="panel-form" method="POST" enctype="multipart/form-data" action="{{ route('docreatetempatpenelitian') }}"
        style="margin-top: 20px;">
        {{ csrf_field() }}          
        <div class="form-group">
          <label>Kategori Surat Ijin Penelitian : </label>
          <label class="radio-inline">
            <input type="radio" name="category" value="Internal" {{ (old("category")=="Internal")? "checked" : "" }} required><b>Internal</b>
          </label>
          <label class="radio-inline">
            <input type="radio" name="category" value="External" {{ (old("category")=="External")? "checked" : "" }} ><b>External</b>
          </label>
        </div>
        <div class="form-group">
          <label>Nama Tempat*</label>
          <input type="text" name="nama_tempat" class="form-control"  class="form-control" required />
        </div>
        <hr style="border: 1px solid DimGray;"></hr>
        <button class="btn btn-success btn-submit" type="submit">Save</button>
        <a href="{{ route('tempat_penelitian') }}" class="btn btn-danger">Kembali</a>
      </form>
    </div>
  </div>
</div>
</div>
<div class="other-page">
</div>
<div class="modal-dialog">
</div>

