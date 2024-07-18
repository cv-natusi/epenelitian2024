  <div class="col-lg-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">Details Data Peneliti dan file Pendukung</div>
      <div class="panel-body" style="border: 0px;">
        <table class="table">
          <tbody>
              <tr>
                <th>Nama Lengkap</th>
                  <td>: {{$profile->first_name}} {{$profile->middle_name}} {{$profile->last_name}}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                  <td>: {{$profile->gender}}</td>
              </tr>
              <tr>
                <th>Email</th>
                  <td>: {{$profile->email}}</td>
              </tr>
              <tr>
                <th>Phone</th>
                  <td>: {{$profile->phone}}</td>
              </tr>
              <tr>
                <th>Tanggal Pengajuan</th>
                  <td>: {{$pengajuan->tgl_pengajuan}}</td>
              </tr>
              <tr>
                <th><a href="javascript:void(0)" class="btn btn-sm btn-info m-0" onclick="filePendukung('{{ $pengajuan->id_permohonan }}')"><span class="fa fa-picture-o"></span> &nbsp; Details File Pendukung</a></th>
                <th><a href="" class="btn btn-sm btn-info m-0">BACK</a></th>
              </tr>
          </tbody>
        </table>
        <hr style="border: 1px solid DimGray;"></hr>
      </div>
    </div>
  </div>
<div class="second-page">
</div>
<div class="second-modal">
</div>

<script type="text/javascript">
    function filePendukung(id){
      $.post("{{route('doc_pendukung')}}",{id:id},function(data){
        if(data.status=='success'){
          $('.second-modal').html(data.content);
        }
      });
    }

    // function approve(id_file,doc_status) {
    //   if (doc_status == 'terima') {
    //     var ket ='menerima?';
    //   }else{
    //     var ket ='menolak?';
    //   }
    //   swal({
    //    title:"Apakah anda akan "+ket,
    //    text:"Apakah anda yakin ?",
    //    type:"warning",
    //    showCancelButton: true,
    //    confirmButtonColor: "#DD6B55",
    //    confirmButtonText: "Saya yakin!",
    //    cancelButtonText: "Batal!",
    //    closeOnConfirm: true
    //  },
    //  function(){
    //    $.post('{{ route('approveFile') }}',{id_file:id_file,doc_status:doc_status}).done(function(data){
    //      if(data.doc_status == 'success'){
    //       $('#detail-dialog').modal('hide');
    //       $('#detail-dialog').html('');
    //       $('.second-modal').html('');

    //       filePendukung(data.id_file);
    //        // datagrid.reload();
    //        swal("Success!", "Journal telah dihapus !", "success");
    //      }else if(data.doc_status=='fail'){
    //        // datagrid.reload();
    //        swal("aMaf!", "Anda bukan pemilik berita ini !", "error");
    //      }else{
    //        // datagrid.reload();
    //        swal("Maaf!", "Berita telah dihapus sebelum ini !", "error");
    //      }
    //    });
    //  });
    // }
  </script>
