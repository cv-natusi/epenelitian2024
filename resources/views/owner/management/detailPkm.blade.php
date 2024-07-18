  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">      
        <div class="panel-heading">
            <a href="{{ route('management_users') }}">
              <i class="fa fa-angle-left"></i> <b>{{$title}}</b>
            </a>          
        </div>
        <div class="panel-body">
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <h4 style="font-weight: bold; color: #4682B4;">Detail User</h4>
            <hr style="  border: 1px solid DimGray;">
              <div class="form-group">
                <table class="table">
                  <tbody>
                      <tr>
                        <th>Username</th>
                          <td>: {{$users->username}}</td>
                      </tr>
                      <tr>
                        <th>Email Pengguna</th>
                          <td>: {{$users->email}}</td>
                      </tr>               
                      <tr>
                        <th>Level User</th>
                          <td>: {{$users->level}}</td>
                      </tr>
                      <tr>
                        <th>Nama Tempat Penelitian</th>
                          <td>: {{$users->tempat_penelitian->nama_tempat}} Kategory->{{$users->tempat_penelitian->kategori}}</td>
                      </tr>                
                  </tbody>
                </table>
              </div>
          </div>

          <!--  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
            <h4 style="font-weight: bold; color: #4682B4;">Reset Password </h4>
            <hr style="  border: 1px solid DimGray;">
              <div class="form-group">
                <table class="table">
                  <tbody>
                      <tr>
                        <th>Password Saat ini</th>
                          <td>: {{$users->username}}</td>
                      </tr>
                      <tr>
                        <th>Password Baru</th>
                          <td>: {{$users->email}}</td>
                      </tr>               
                      <tr>
                        <th>Ulangi Password Baru</th>
                          <td>: {{$users->level}}</td>
                      </tr>
                      <tr>
                        <th></th>
                          <td><button>Simpan Password</button></td>
                      </tr>                
                  </tbody>
                </table>
              </div>
          </div>
 -->
        </div>
      </div>
    </div>
  </div>
