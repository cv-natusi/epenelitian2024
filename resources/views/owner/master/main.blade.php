<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $identitas = App\Http\Models\Identitas::find(1);
  ?>
  <title>{{$identitas->nama_web}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('images/logod.png')}}" sizes=""/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
  <style>

    .panel-body-card {
      position: relative;
      height: 110px;
    }

    .bgBlueCard{ background: #2196F3 !important; }
    .bgLightBlueCard{ background: #03A9F4 !important; }
    .bgRedCard{ background: #F44336 !important; }
    .bgPinkCard{ background: #E91E63 !important; }
    .bgLimeCard{ background: #CDDC39 !important; }
    .bgOrangeCard{ background: #FF9800 !important; }
    .bgGreenCard{ background: #4CAF50 !important; }
    .bgPurpleCard{ background: #673AB7 !important; }

    .iconCard {
      -webkit-transition: all .3s linear;
      -o-transition: all .3s linear;
      transition: all .3s linear;
      position: absolute;top: -10px;
      right: 10px;z-index: 0;
      font-size: 70px;
      margin-top: 15px;
      color: white;
    }

    .contenCard {
      margin: 0px;
      font-size: 42px;
      font-weight: bold;
      padding-left: 15px;
      color: white;
      padding-top:10px
    }
    .Prof {
      font-size: 14px;
      font-weight: bold;
      color: white;
      padding-left: 5px;
    }
    .panel-title-card {
      background: #6f6b6b;
      color: white;
      text-align: center;
      padding: 5px 5px;
    }
  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {height: 550px}

  /* Set gray background color and 100% height */
  .sidenav {
    background-color: #f1f1f1;
    height: 200%;
    font-weight: Bold;
  }
  div ul .nav{
    background: #ccc;
  }

  /* On small screens, set height to 'auto' for the grid */
  @media screen and (max-width: 767px) {
    .row.content {height: auto;}
  }
  </style>
  @yield('css')
</head>
<body>
  <nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="color: black !important">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">logo</a>
      </div>
      
      <?php
      if (Auth::getUser()->level=='1') {
        $menungguAdmin = DB::table('permohonan')->where('status', 'Menunggu Admin')->count();
        $totalAdmin = $menungguAdmin;
      }elseif (Auth::getUser()->level=='2') {
        $menungguKasi = DB::table('permohonan')->where('status', 'Menunggu Kasi')->count();
        $totalKasi = $menungguKasi;
      }elseif (Auth::getUser()->level=='4') {
        $menungguKabid = DB::table('permohonan')->where('status', 'Menunggu Kabid')->count();
        $totalKabid = $menungguKabid;      
      }elseif (Auth::getUser()->level=='6') {
        $menungguPkm = DB::table('permohonan')->join('verifikasi_tempat_penelitian as vt', 'permohonan.id_permohonan', '=', 'vt.permohonan_id')->where('tempat_penelitian_id',Auth::getUser()->tempat_penelitian_id)->where('status', 'Menunggu Admin')->count();
        $totalPkm = $menungguPkm;
      }else {
        $menungguKadin = DB::table('permohonan')->where('status', 'Menunggu Kadin')->count();
        $totalKadin = $menungguKadin;
      }

        $terima = DB::table('doc_pendukung')->where('doc_status', 'pending')->count();
        $sub_accept = DB::table('submissions')->where('status','accept')->count();
        // $total = $menunggu + $terima;
        // $total = $menunggu;
      ?>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="javascript:void(0)">           
            @if(Auth::getUser()->level==1 || Auth::getUser()->level==2 || Auth::getUser()->level==4 || Auth::getUser()->level==5 )
              {{ $nama_user->username }}
            @else(Auth::getUser()->level==6)
              {{ $nama_pkm->nama_tempat }}
            @endif
          </a></li>
          <li class="{{$mn_dashboard}}"><a href="{{route('dashboard_owner')}}">Dashboard</a></li>

          @if(Auth::getUser()->level==1 || Auth::getUser()->level==2)
            <li class="{{$mn_identitas}}"><a href="{{route('identitas_owner')}}">Identitas Web</a></li>
          @endif

          @if(Auth::getUser()->level==6)
            <li class="{{$mn_identitas_pkm}}"><a href="{{route('identitas_pkm')}}">Identitas Pengguna</a></li>
          @endif

          @if(Auth::getUser()->level==1 || Auth::getUser()->level==2)
          <li class="{{$mn_management}}"><a href="{{route('management_users')}}">Management User</a></li>
          @endif

          <li class="{{$mn_data_pengajuan}}"><a href="{{route('data_pengajuan')}}">Data Pengajuan
              <span class="badge badge-pill badge-danger">
                @if (Auth::getUser()->level=='1')
                  {{ $totalAdmin }}
                @elseif (Auth::getUser()->level=='2')
                  {{ $totalKasi }}
                @elseif (Auth::getUser()->level=='4')
                  {{ $totalKabid }}
                @elseif (Auth::getUser()->level=='6')
                {{ $totalPkm }}
                @else
                  {{ $totalKadin }}
                @endif
              </span>
            </a>
          </li>

          @if(Auth::getUser()->level==1)
          <li class="{{$mn_data_master}}">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#submenumobile">Master Data</a>
            <div class="collapse" id="submenumobile">
              <ul class="nav">
                <li class="active"><a href="{{route('menu_owner')}}">Menu</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('announcement')}}">Announcement</a></li>
                <li><a href="{{route('bahasa')}}">Update Bahasa</a></li>
                {{-- <li><a href="{{route('lembar_konfirmasi')}}">Lembar Konfirmasi</a></li> --}}
                <li><a href="{{route('jenis_penelitian')}}">Tambah Jenis Penelitian</a></li>
                <li><a href="{{route('jenis_file_pendukung')}}">Tambah Jenis File Pendukung</a></li>
              </ul>
            </div>
          </li>
          @endif

          
          {{-- <li class="{{$mn_data_submission}}">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#submenumobile1">File Submission</a>
            <div class="collapse @if($mn_data_submission=='active') in @endif" id="submenumobile1">
              <ul class="nav">
                <li class="active"><a href="{{route('pending')}}">Pending</a></li>
                <li><a href="{{route('review')}}">In Review</a></li>
                <li><a href="{{route('revisi')}}">In Revisi</a></li>
                <li><a href="{{route('accept')}}">Data Penelitian
                  @if($sub_accept > 0)
                  <span class="badge badge-pill badge-danger">
                  {{ $sub_accept }}
                  </span>
                  @endif
                  </a>
                </li>
                <li><a href="{{route('publish')}}">Penelitian in Publish</a></li>
              </ul>
            </div>
          </li> --}}
          
          <li class=""><a href="{{'/logout_admin'}}">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav hidden-xs">
        <h2><img src="{{url('images/logob.png')}}" width="125px;" style="margin-left: 25px">
          <small style="font-size: 15pt"><a href="{{url('/')}}" target="_blank">Home</a></small>
        </h2>
        <ul class="nav nav-pills nav-stacked">
          <li style="background: #0299da;border-radius: 20px;text-align: center"><a href="javascript:void(0)" style="color: #000">
             @if(Auth::getUser()->level==1 || Auth::getUser()->level==2 || Auth::getUser()->level==4 || Auth::getUser()->level==5 )
              {{ $nama_user->username }}
            @else(Auth::getUser()->level==6)
              {{ $nama_pkm->nama_tempat }}
            @endif
          </a></li>
            <li class="{{$mn_dashboard}}"><a href="{{route('dashboard_owner')}}">Dashboard</a></li>

          @if(Auth::getUser()->level==1 || Auth::getUser()->level==2)
            <li class="{{$mn_identitas}}"><a href="{{route('identitas_owner')}}">Identitas Web</a></li>
          @endif

          @if(Auth::getUser()->level==6)
            <li class="{{$mn_identitas_pkm}}"><a href="{{route('identitas_pkm')}}">Identitas Pengguna</a></li>
          @endif

            @if(Auth::getUser()->level==1 || Auth::getUser()->level==2)
            <li class="{{$mn_management}}"><a href="{{route('management_users')}}">Management User</a></li>
            @endif
            
            <li class="{{$mn_data_pengajuan}}"><a href="{{route('data_pengajuan')}}">Data Pengajuan
              <span class="badge badge-pill badge-danger">
                @if (Auth::getUser()->level=='1')
                  {{ $totalAdmin }}
                @elseif (Auth::getUser()->level=='2')
                  {{ $totalKasi }}
                @elseif (Auth::getUser()->level=='4')
                  {{ $totalKabid }}
                @elseif (Auth::getUser()->level=='6')
                {{ $totalPkm }}
                @else
                  {{ $totalKadin }}
                @endif
              </span>
              </a>
            </li>
            
            @if(Auth::getUser()->level==1)
            <li class="{{$mn_data_master}}">
              <a href="javascript:void(0)" data-toggle="collapse" data-target="#submenu">Master Data</a>
              <div class="collapse @if($mn_data_master=='active') in @endif" id="submenu">
                <ul class="nav">
                  <li class="active"><a href="{{route('menu_owner')}}">Menu</a></li>
                  <li><a href="{{route('contact')}}">Contact</a></li>
                  <li><a href="{{route('announcement')}}">Announcement</a></li>
                  <li><a href="{{route('bahasa')}}">Update Bahasa</a></li>
                  {{-- <li><a href="{{route('lembar_konfirmasi')}}">Lembar Konfirmasi</a></li> --}}
                  <li><a href="{{route('tempat_penelitian')}}">Tempat Penelitian</a></li>
                  <li><a href="{{route('jenis_penelitian')}}">Tambah Jenis Penelitian</a></li>
                  <li><a href="{{route('jenis_file_pendukung')}}">Tambah Jenis File Pendukung</a></li>
                </ul>
              </div>
            </li>
            @endif

          {{-- <li class="{{$mn_data_submission}}">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#submenu1">File Submission</a>
            <div class="collapse @if($mn_data_submission=='active') in @endif" id="submenu1">
              <ul class="nav">
                <li class="active"><a href="{{route('pending')}}">Pending</a></li>
                <li><a href="{{route('review')}}">In Review</a></li>
                <li><a href="{{route('revisi')}}">In Revisi</a></li>
               <li><a href="{{route('accept')}}">Data Penelitian
                  @if($sub_accept > 0)
                    <span class="badge badge-pill badge-danger">
                  {{ $sub_accept }}
                    </span>
                  @endif
                  </a>
                </li>
                <li><a href="{{route('publish')}}">Penelitian in Publish</a></li>
              </ul>
            </div>
          </li> --}}

          <li class=""><a href="{{url('/logout_admin')}}">Logout</a></li>
        </ul><br>
      </div>
      <br>

      <div class="col-sm-10">
        @yield('content')
      </div>
    </div>
  </div>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  <script src="{{asset('js/jquery.validate.js')}}"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"></script>
  <script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  @if(Session::has('pesan'))
      swal("{{ Session::get('pesan')}}")
    @endif

  @if(Session::has('message'))
  swal('{{Session::get('title')}}','{{Session::get('message')}}','{{Session::get('type')}}');
  @endif

  </script>
  <script src="{{url('js/datagrid.js')}}"></script>

  @yield('js')
</body>
</html>
