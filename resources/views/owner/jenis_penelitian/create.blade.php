 <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis Penelitian</div>
      <div class="panel-body">
        <form class="panel-form" method="POST" enctype="multipart/form-data" action="{{ route('docreatejenispenelitian') }}"
            style="margin-top: 20px;">
            {{ csrf_field() }}          
          <div class="form-group">
            <label>Nama Jenis*</label>
            <input type="text" name="nama_jenis" class="form-control"  class="form-control" />
          </div>        
          <div class="form-group">
            <label>Ketarangan*</label>
            <textarea type="text" class="form-control" name="keterangan" class="form-control" row="2"></textarea>
          </div>
          <hr style="border: 1px solid DimGray;"></hr>
          <button class="btn btn-success btn-submit" type="submit">Save</button>
          <a href="{{ route('jenis_penelitian') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <div class="other-page">
  </div>
  <div class="modal-dialog">
  </div>

