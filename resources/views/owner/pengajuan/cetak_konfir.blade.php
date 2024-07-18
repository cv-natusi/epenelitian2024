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
                <th>BIO</th>
                  <td>: {!!$profile->bio!!}</td>            
              </tr>             
              <tr>
                <th>Tanggal Pengajuan</th>
                  <td>: {{$pengajuan->tgl_pengajuan}}</td>            
              </tr>
              <div class="clearfix" style="margin-bottom: 10px;"></div>                      
          </tbody>          
        </table>        
        <hr style="border: 1px solid DimGray;"></hr>        
          <div class="form-group">
            <label class="col-sm-12 control-label">Lembar Konfirmasi: </label>
            <div class="col-sm-12">
              <textarea type="text" name="indonesia" rows="3" id="summary-ckeditor10" class="form-control">                
              </textarea>
            </div>
          </div>
      </div>
    </div>
  </div>
<div class="second-page">
</div>
<div class="second-modal">
</div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">    
    CKEDITOR.replace( 'summary-ckeditor10' );
  </script>