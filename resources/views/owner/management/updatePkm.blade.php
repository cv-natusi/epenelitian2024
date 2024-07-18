<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Data User Tempat Penelitian</div>
      <div class="panel-body">
        <form method='post' action="{{ route('storeUpdatePkm') }}" enctype='multipart/form-data'>
        {{ csrf_field() }}
          <input type="hidden" class="form-control" name="id" value="{{$users->id}}">
         <div class="form-group row">
          <label class="col-sm-4 col-form-label">Username : </label>
          <div class="col-sm-8">
            <input type="text" name="username" value="{{ $users->username }}" class="form-control"  class="form-control" required />
            <small style="color: red; font-weight: 900;">(*Password akan di setting sama dengan Username.)</small>
          </div>
        </div>
         <div class="form-group row">
          <label class="col-sm-4 col-form-label">Email : </label>
          <div class="col-sm-8">
            <input type="text" name="email" class="form-control" value="{{ $users->email }}" class="form-control" required />
          </div>
        </div>       
         <div class="form-group row">
         <label class="col-sm-4 col-form-label"> Pilih Tempat Penelitian :</label>
          <div class="col-sm-8">
            <select class="form-control" name="tempat_penelitian_id" required>
              <option value="" selected style="font-weight: bold;"> .:: Pilih Nama Tempat ::. </option>
              @foreach ($tempat_penelitian as $tp)
                  <option value="{{$tp->id_tempat_penelitian}}">{{$tp->nama_tempat}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <hr style="border: 1px solid DimGray;"></hr>
        <button class="btn btn-success btn-submit" type="submit">Simpan</button>
        <a href="{{ route('management_users') }}" class="btn btn-danger">Kembali</a>
      </form>
    </div>
  </div>
</div>
</div>
<div class="other-page">
</div>
<div class="modal-dialog">
</div>