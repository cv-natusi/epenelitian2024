<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis Penelitian</div>
      <div class="panel-body">
        <form method='post' action="{{ route('doupdatejenispenelitian') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="hidden" class="form-control" name="id_jenis_penelitian" value="{{ $jenis->id_jenis_penelitian}}">
          <div class="form-group">
            <label>Nama Jenis*</label>
            <input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}"  class="form-control" />
          </div>        
          <div class="form-group">
            <label>Ketarangan*</label>
            <textarea type="text" class="form-control" name="keterangan" class="form-control" row="2">{{ $jenis->keterangan }}</textarea>
          </div>
            <hr style="border: 1px solid DimGray;"></hr>
            <button class="btn btn-success btn-submit" type="submit">Save</button>
            <a href="{{ route('jenis_penelitian') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>