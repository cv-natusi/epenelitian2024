  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">      
        <div class="panel-heading">
            <a href="{{ route('management_users') }}">
              <i class="fa fa-angle-left"></i> <b>{{$title}}</b>
            </a>          
        </div>
        <div class="panel-body">
          <div class="row">
            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
              <h4 style="font-weight: bold; color: #4682B4;">Keterangan Datadiri</h4>
              <hr style="  border: 1px solid DimGray;">
                <div class="form-group">
                  <table class="table">
                    <tbody>
                        <tr>
                          <th>Nama Lengkap</th>
                            <td>: {{$users_id->first_name}} {{$users_id->middle_name}} {{$users_id->last_name}}</td>
                        </tr>
                        <tr>
                          <th>Nomor Telepon</th>
                            <td>: {{$users_id->phone}}</td>
                        </tr>               
                        <tr>
                          <th>Jenis Kelamin</th>
                            <td>: {{$users_id->gender}}</td>
                        </tr>                
                    </tbody>
                  </table>
                </div>
            </div>

            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
              <h4 style="font-weight: bold; color: #4682B4;">Keterangan Alamat</h4>
              <hr style="  border: 1px solid DimGray;">
                <div class="form-group m-t-0 m-b-25">
                  <table class="table">
                    <tbody>
                        <tr>
                          <th>Asal Negara</th>
                            <td>: {{$users_id->country}}</td>
                        </tr>               
                        <tr>
                          <th>Email</th>
                            <td>: {{$users_id->email}}</td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                            <td>: {!! $users_id->mailing_ads !!}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>