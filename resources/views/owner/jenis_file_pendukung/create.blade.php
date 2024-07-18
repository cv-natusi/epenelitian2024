 <div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Tambahkan Jenis File Pendukung</div>
      <div class="panel-body">
        <form class="panel-form" method="POST" enctype="multipart/form-data" action="{{ route('docreatejenisfilependukung') }}"
            style="margin-top: 20px;">
            {{ csrf_field() }}          
            {{-- anas --}}
          <div class="form-group">
            <label>Nama Jenis File Pendukung *</label>
            <input type="text" name="nama_jenis" class="form-control" placeholder="masukkan nama jenis file pendukung"  class="form-control" />
          </div>
          <div class="form-group">
            <label>Upload File</label>
            <input type="file" name="doc" id="doc" class="form-control" accept=".doc,.docx" class="form-control" />
          </div>
                  
          {{-- <iframe width="100%" height="550px" id="viewer"></iframe> --}}
          {{-- end anas --}}
          {{-- <div class="form-group">
            <label>Nama Jenis* contoh: form_penelitian </label>
            <input type="text" name="nama_jenis" class="form-control" placeholder="masukkan nama jenis file pendukung (gunakan _ untuk 2 kata atau lebih)"  class="form-control" />
          </div>         --}}
          {{-- <div class="form-group">
            <label>Nama Form*</label>
            <input type="text" name="nama_form" class="form-control" placeholder="nama yang akan di tampilakn pada form isian"  class="form-control" />
          </div> --}}
          <hr style="border: 1px solid DimGray;"></hr>
          <button class="btn btn-success btn-submit" type="submit">Save</button>
          <a href="{{ route('jenis_file_pendukung') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
  <div class="other-page">
  </div>
  <div class="modal-dialog">
  </div>

  <script>
    // $('#doc').change(function(){
    //   pdffile=this.files[0];
    //   pdffile_url=URL.createObjectURL(pdffile);
    //   $('#viewer').attr('src',pdffile_url);
    // })
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
