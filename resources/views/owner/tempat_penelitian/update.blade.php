<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Ubah Tempat Penelitian</div>
      <div class="panel-body">
        <form method='post' action="{{ route('doupdatetempatpenelitian') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="hidden" class="form-control" name="id_tempat_penelitian" value="{{ $tempat->id_tempat_penelitian}}">
          <div class="form-group">
            <label>Kategori Surat Ijin Penelitian : </label>
            <label class="radio-inline">
              <input type="radio" name="category" value="Internal" @if ($tempat->kategori == "Internal") {{ 'checked' }} @endif required ><b>Internal</b>
            </label>
            <label class="radio-inline">
              <input type="radio" name="category" value="External" @if ($tempat->kategori == "External") {{ 'checked' }} @endif ><b>External</b>
            </label>
          </div>
          <div class="form-group">
            <label>Nama Tempat*</label>
            <input type="text" name="nama_tempat" class="form-control" value="{{ $tempat->nama_tempat }}"  class="form-control" required/>
          </div>
          <hr style="border: 1px solid DimGray;"></hr>
          <button class="btn btn-success btn-submit" type="submit">Save</button>
          <a href="{{ route('tempat_penelitian') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>