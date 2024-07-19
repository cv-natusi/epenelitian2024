<form class="form-horizontal" method="post" action="{{ route('store_permohonan_b') }}" enctype="multipart/form-data">
  <div class="col-lg-12 col-md-12">
      <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
      <br>
      <br>
      <br>
      <div class="section-header">
          <h4 style="font-weight: bold;">Data Kegiatan</h4>
          <p>Isi data hasil penelitian yang telah dibuat.</p>
          <hr style="  border: 1px solid DimGray;">
      </div>
  </div>
  <div class="col-lg-12 col-md-12">
    {{csrf_field()}}
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group row">
        <div class="col-sm-8">
          
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Judul Kegiatan:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="judul_penelitian" placeholder="Masukkan Judul Kegiatan yang akan anda buat" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tempat Kegiatan:</label>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <textarea name="unit_kerja_b" style="opacity: 0;position: absolute;z-index:-99" required></textarea>
          <input type="text" id="unit_kerja_b" value="" placeholder="Silahkan Ketikkan Kata Kunci..." class="form-control disablecopypaste" autocomplete="off">
          <input type="hidden" id="unit_kerja_hidden_b">
          <div id="tempat-unit">
          </div>
          <div id="hasil-unit">
          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <a href="javascript:void(0)" class="btn btn-success" onclick="tambah_tempat_b()"><i class="fa fa-plus"></i></a>
        </div>
      </div>
       <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Awal:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_awal" autocomplete="off" placeholder="Tanggal Mulai Kegiatan" required autocomplete="off">
        </div>
      </div>

        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Akhir:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_akhir" autocomplete="off" placeholder="Tanggal Selesai Kegiatan" required autocomplete="off">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Pendidikan:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="pendidikan" placeholder="Pendidikan Anda" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">
        </div>
      </div>
      <div class="form-group" style="float: right;">
          <button type="submit" class="btn btn-success">SIMPAN</button>
          <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
      </div>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Surat Pengantar:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_surat_pimpinan" autocomplete="off" placeholder="Tanggal Surat Pimpinan" required autocomplete="off">
          <label class="custom-control-label" style="color: red;">*Tanggal Surat Pengantar dari Universitas/Instansi lain.</label>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Nomor Surat Pengantar:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="nomor_surat_pimpinan" autocomplete="off" placeholder="Nomor Surat Pimpinan" required autocomplete="off">
          <label class="custom-control-label" style="color: red;">*Nomor Surat Pengantar dari Universitas/Instansi lain.</label>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tanggal Surat Rekom:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="tgl_surat_rekom" autocomplete="off" placeholder="Tanggal Surat Rekom" required autocomplete="off">
          <label class="custom-control-label" style="color: red;">*Tanggal Surat rekomendasi Bangkesbangpol Kabupaten Sidoarjo.</label>          
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Nomor Surat Rekom:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="nomor_surat_rekom" autocomplete="off" placeholder="Nomor Surat Rekom" required autocomplete="off">
          <label class="custom-control-label" style="color: red;">*Nomor Surat rekomendasi Bangkesbangpol Kabupaten Sidoarjo.</label>          
        </div>
      </div>      
    </div>
  </div>
</form>