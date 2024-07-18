@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
      </div>

      @if(Auth::getUser()->level==6)
      <!-- Dashboar PKM -->
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgOrangeCard">
          <div class="iconCard"><i class="fa fa-file"></i></div>
          <div class="contenCard">
            <div>{{$pending_pkm_count}}</div>
            <div class="Prof"><a href="{{url('data_pengajuan')}}?no=1" style="color: white;text-decoration: underline;">Pengajuan Manunggu</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgGreenCard">
          <div class="iconCard"><i class="fa fa-file"></i></div>
          <div class="contenCard">
            <div>{{$acc_pkm_count}}</div>
            <div class="Prof"><a href="{{url('data_pengajuan')}}?no=2" style="color: white;text-decoration: underline;">Pengajuan Diterima</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgRedCard">
          <div class="iconCard"><i class="fa fa-file"></i></div>
          <div class="contenCard">
            <div>{{$reject_pkm_count}}</div>
            <div class="Prof"><a href="{{url('data_pengajuan')}}?no=3" style="color: white;text-decoration: underline;">Pengajuan Ditolak</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>
      @else
        @if(Auth::getUser()->level==1)
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
            <div class="panel-body-card bgOrangeCard">
              <div class="iconCard"><i class="fa fa-file-text"></i></div>
              <div class="contenCard">
                <div>{{$pending_count_admin}}</div>
                <div class="Prof"><a href="{{url('data_pengajuan')}}?no=1" style="color: white;text-decoration: underline;">Pengajuan Menunggu</a></div>
              </div>
            </div>
            <a href="javascript:void(0)">
            </a>
          </div>
        @else
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
            <div class="panel-body-card bgOrangeCard">
              <div class="iconCard"><i class="fa fa-file-text"></i></div>
              <div class="contenCard">
                <div>{{$pending_count_kasi}}</div>
                <div class="Prof"><a href="{{url('data_pengajuan')}}?no=1" style="color: white;text-decoration: underline;">Pengajuan Menunggu</a></div>
              </div>
            </div>
            <a href="javascript:void(0)">
            </a>
          </div>
        @endif

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgGreenCard">
          <div class="iconCard"><i class="fa fa fa-sticky-note-o"></i></div>
          <div class="contenCard">
            <div>{{$acc_count}}</div>
            <div class="Prof"><a href="{{url('data_pengajuan')}}?no=2" style="color: white;text-decoration: underline;">Pengajuan Diterima</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgRedCard">
          <div class="iconCard"><i class="fa fa-file"></i></div>
          <div class="contenCard">
            <div>{{$reject_count}}</div>
            <div class="Prof"><a href="{{url('data_pengajuan')}}?no=3" style="color: white;text-decoration: underline;">Pengajuan Ditolak</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgBlueCard">
          <div class="iconCard"><i class="fa fa-user"></i></div>
          <div class="contenCard">
            <div>{{$users_count}}</div>
            <div class="Prof"><a href="{{url('owner/identitas/management_users')}}" style="color: white;text-decoration: underline;">Users Active</a></div>
          </div>
        </div>
        <a href="javascript:void(0)">
        </a>
      </div>
      @endif
     <!--  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgBlueCard">
          <div class="iconCard"><i class="fa fa-file-o"></i></div>
          <div class="contenCard">
            <div></div>
            <div class="Prof"><a href="{{url('data_submission/menu/pending')}}" style="color: white;text-decoration: underline;">Submission Pending</a></div>
          </div>
        </div>
            <a href="javascript:void(0)">
            </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgLightBlueCard">
          <div class="iconCard"><i class="fa fa-file-text-o"></i></div>
          <div class="contenCard">
            <div></div>
            <div class="Prof"><a href="{{url('data_submission/menu/review')}}" style="color: white;text-decoration: underline;">Submission in Review</a></div>
          </div>
        </div>
            <a href="javascript:void(0)">
            </a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgRedCard">
          <div class="iconCard"><i class="fa fa-file"></i></div>
          <div class="contenCard">
            <div></div>
            <div class="Prof"><a href="{{url('data_submission/menu/revisi')}}" style="color: white;text-decoration: underline;">Submission in Revisi</a></div>
          </div>
        </div>
            <a href="javascript:void(0)">
            </a>
      </div> -->



   <!--    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgGreenCard">
          <div class="iconCard"><i class="fa fa-users"></i></div>
          <div class="contenCard">
            <div></div>
            <div class="Prof">Author</div>
          </div>
        </div>
            <a href="javascript:void(0)">
            </a>
      </div> -->

      <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 10px">
        <div class="panel-body-card bgGreenCard">
          <div class="iconCard"><i class="fa fa-file-text"></i></div>
          <div class="contenCard">
            <div>{{$supplementary_count}}</div>
            <div class="Prof">File Supplementary</div>
          </div>
        </div>
            <a href="javascript:void(0)">
            </a>
      </div> -->

      <div class="clearfix"></div>
    </div>
  </div>
  <hr>

  <?php

    $upload = DB::table('doc_pendukung')->where('doc_status', 'pending')->count();

    $sub_accept = DB::table('submissions')->where('status', 'accept')->count();
   ?>

  @if(Auth::getUser()->level == 1)
      @if($pending_count_admin > 0)
      <div class="alert alert-danger" style="font-weight:900;">
        <div class="row">
          <div class="col-md-11">
              Pemberitahuan ! ,
              <br>
              Terdapat ({{ $pending_count_admin }}) Pengajuan baru yang masuk, Mohon Periksa Identitas Pemohon dan beberapa dokumen pendukung yang sudah di upload. Silahkan untuk segera melakukan review dokumen pendukung tersebut untuk di validasi.
          </div>
          <div class="col-md-1">
            <a href="{{ route('data_pengajuan') }}?no=1" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif
      <!-- @if($upload > 0)
      <div class="alert alert-warning" style="font-weight:900;">
        <div class="row">
          <div class="col-md-11">
              Pemberitahuan ! ,
              <br>
             Terdapat ({{ $upload }}) beberapa dokumen pendukung yang sudah di upload. Silahkan untuk segera melakukan review dokumen pendukung tersebut untuk di validasi.
          </div>
          <div class="col-md-1">
            <a href="{{ route('data_pengajuan') }}" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif -->
      @if($sub_accept > 0)
      <div class="alert alert-info">
        <div class="row">
          <div class="col-md-11" style="font-weight:900;">
              Pemberitahuan ! ,         
              <br>
              Terdapat ({{ $sub_accept }}) Submission Baru Upload. Periksa details dan publish hasil dari penelitian oleh user peneliti.
          </div>
          <div class="col-md-1">
            <a href="{{ route('accept') }}?no=1" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif
  @elseif(Auth::getUser()->level == 2)
    @if($pending_count_kasi > 0)
      <div class="alert alert-danger" style="font-weight:900;">
        <div class="row">
          <div class="col-md-11">
              Pemberitahuan ! ,
              <br>
              Terdapat ({{ $pending_count_kasi }}) Pengajuan baru yang masuk, Mohon Periksa Identitas Pemohon dan beberapa dokumen pendukung yang sudah di upload. Silahkan untuk segera melakukan review dokumen pendukung tersebut untuk di validasi.
          </div>
          <div class="col-md-1">
            <a href="{{ route('data_pengajuan') }}?no=1" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif
      <!-- @if($upload > 0)
      <div class="alert alert-warning" style="font-weight:900;">
        <div class="row">
          <div class="col-md-11">
              Pemberitahuan ! ,
              <br>
             Terdapat ({{ $upload }}) beberapa dokumen pendukung yang sudah di upload. Silahkan untuk segera melakukan review dokumen pendukung tersebut untuk di validasi.
          </div>
          <div class="col-md-1">
            <a href="{{ route('data_pengajuan') }}" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif -->
      @if($sub_accept > 0)
      <div class="alert alert-info">
        <div class="row">
          <div class="col-md-11" style="font-weight:900;">
              Pemberitahuan ! ,         
              <br>
              Terdapat ({{ $sub_accept }}) Submission Baru Upload. Periksa details dan publish hasil dari penelitian oleh user peneliti.
          </div>
          <div class="col-md-1">
            <a href="{{ route('accept') }}" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
    @endif
  @else
     @if($pending_pkm_count > 0)
      <div class="alert alert-danger" style="font-weight:900;">
        <div class="row">
          <div class="col-md-11">
              Pemberitahuan ! ,
              <br>
              Terdapat ({{ $pending_pkm_count }}) Pengajuan baru yang masuk, Mohon Periksa Identitas Pemohon dan beberapa dokumen pendukung yang sudah di upload. Silahkan untuk segera melakukan review dokumen pendukung tersebut untuk di validasi.
          </div>
          <div class="col-md-1">
            <a href="{{ route('data_pengajuan') }}?no=1" class="btn btn-success btn-sm float-right"><i class="fa fa-reply"></i></a>
          </div>
        </div>
      </div>
      @endif

  @endif



@endsection
