<form class="form-horizontal" method="post" action="{{ route('store_permohonan') }}" enctype="multipart/form-data">
  <div class="col-lg-12 col-md-12">
      <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
      <div class="section-header">
          <h4 style="font-weight: bold;">Form Permohonan</h4>
          <p>Buat Permohonan Pengajuan Kegiatan.</p>
          <hr style="  border: 1px solid DimGray;">
      </div>
  </div>
  <div class="col-lg-12 col-md-12">
    {{csrf_field()}}
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Pilih Jenis Kegiatan:</label>
        <div class="col-sm-8">
          <select class="form-control" name="jenis_penelitian_id" required="" id="getVal">
            <option value="" selected style="font-weight: bold;"> .:: Pilih Jenis Kegiatan ::. </option>
            @foreach ($jenis_penelitian as $jp)
                <option value="{{$jp->id_jenis_penelitian}}">{{$jp->nama_jenis}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Judul Kegiatan:</label>
        <div class="col-sm-8">
        <textarea type="text" rows="3" id="judul_penelitian" class="form-control disablecopypaste" name="judul_penelitian" placeholder="Masukkan Judul Kegiatan yang akan anda buat" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">            
        </textarea>          
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Tempat Kegiatan:</label>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <textarea name="unit_kerja" style="opacity: 0;position: absolute;z-index:-99" required></textarea>
          <input type="text" id="unit_kerja" value="" placeholder="Silahkan Ketikkan Kata Kunci..." class="form-control disablecopypaste" autocomplete="off">
          <input type="hidden" id="unit_kerja_hidden">
          <div id="tempat-unit">

          </div>
          <div id="hasil-unit">

          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <a href="javascript:void(0)" class="btn btn-success" onclick="tambah_tempat()"><i class="fa fa-plus"></i></a>
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
          <label class="custom-control-label" style="color: red;">*sesuai dengan surat rekomendasi dari Bakesbanpol.</label>
        </div>
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

      <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Pendidikan:</label>
        <div class="col-sm-8">
          <input type="text" class="form-control disablecopypaste" name="pendidikan" placeholder="Pendidikan Anda" required onkeypress=" return cekAngkaHuruf(event)" autocomplete="off">
        </div>
      </div>

    </div>
  </div>

  <div class="col-lg-12 col-md-12">
    <div class="section-header">
        <h4 style="font-weight: bold;">Form Upload Persyaratan</h4>
        <p>Buat Formulir Permohonan Persyaratan.</p>
        <hr style="  border: 1px solid DimGray;">
    </div>
  </div>
  <div class="col-lg-12 col-md-12">
    <div class="col-lg-12 col-md-12 col-sm-12">
        {{-- anas --}}
        @foreach($jenis_file_pendukung as $file)
          <div class="form-group row">
            <label class="col-sm-4 col-form-label"> {{$file->nama_jenis}}</label>
            <div class="col-sm-8">
                <input type=hidden name="id_jenis_file[]" value="{{ $file->id_jenis_file }}">
                <input type="file" class="form-control" accept="application/pdf" name="upload_doc_pendukung[]" placeholder="Upload {{$file->nama_jenis}}">
            </div>
          </div>
        @endforeach

        @foreach($jenis_file_pendukung_statis as $statis)
          <div class="form-group row">
            <label class="col-sm-4 col-form-label"> {{$statis->nama_jenis}}:</label>
            {{-- LAMPIRAN_01_LEMBAR_PERSETUJUAN_PEMEGANG_PROGRAM_YG_AKAN_DITELITI.docx --}}
            <div class="col-sm-2">
              <a class="btn btn-primary col-sm-12" href="{{asset('lampiran/'.$statis->doc)}}" download="{{$statis->doc}}">Download</a>
            </div>
            <div class="col-sm-6">
              <input type=hidden name="id_jenis_file_statis[]" value="{{ $statis->id_jenis_file }}">
              <input type="file" class="form-control" accept="application/pdf" name="upload_doc_pendukung_statis[]" placeholder="Upload {{$statis->nama_jenis}}" required>
              <label class="custom-control-label" style="color: red;">*download dulu file aslinya.</label>
            </div>
          </div>
        @endforeach
        {{-- end anas --}}       
        <div class="form-group" style="float: right;">
            <button type="submit" class="btn btn-success">SIMPAN</button>
            <a href="{{ route('userhome') }}" class="btn btn-danger">BATAL</a>
        </div>
    </div>
  </div>
</form>