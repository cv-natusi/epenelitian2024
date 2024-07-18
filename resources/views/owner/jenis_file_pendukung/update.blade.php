<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis Penelitian</div>
      <div class="panel-body">
        <form method='post' action="{{ route('doupdatejenisfilependukung') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          {{-- anas --}}
          <input type="hidden" class="form-control" name="id_jenis_file" value="{{ $jenis->id_jenis_file }}">  
          <div class="form-group">
            <label>Nama Jenis File Pendukung *</label>
            <input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}" placeholder="masukkan nama jenis file pendukung"  class="form-control" />
          </div>        
          <div class="form-group">
            <label>Upload File</label>
            <input type="hidden" name="docOld" class="form-control" class="form-control" value="{{ $jenis->doc }}" />
            <input type="file" name="doc" class="form-control" accept=".doc,.docx" class="form-control" />
          </div>
          {{-- <iframe src="{{ asset('lampiran/'.$jenis->doc) }}" width="100%" height="550px"></iframe> --}}
          {{-- end anas --}}
          {{-- <div class="form-group">
            <label>Nama Jenis*</label>
            <input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}"  class="form-control" />
          </div>        
          <div class="form-group">
            <label>Ketarangan*</label>
            <input type="text" name="nama_form" class="form-control" value="{{ $jenis->nama_form }}"  class="form-control" />
          </div> --}}
            <hr style="border: 1px solid DimGray;"></hr>
            <button class="btn btn-success btn-submit" type="submit">Save</button>
            <a href="{{ route('jenis_file_pendukung') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  $('input[type=file]').on('change',function (e) {
    var extValidation = new Array(".doc", ".docx");
    var fileExt = e.target.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (extValidation.indexOf(fileExt) < 0) {
        swal('Extensi File Tidak Valid !','Upload file bertipe .doc atau .docx, untuk dapat melakukan upload data...','warning')
        $(this).val("")
        return false;
    }else{
      return true;
    }
  })
</script>