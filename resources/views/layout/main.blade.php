<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $identitas = App\Http\Models\Identitas::find(1);
  ?>
  <title>{{$identitas->nama_web}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('images/logod.png')}}" sizes=""/>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>

  <link rel="stylesheet" href="{{asset('/css/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/bootstrap-datetimepicker.min.css')}}">
  <script src="{{asset('js/datetimepicker.min.js')}}"></script>
  <style>

    .table, th{
      background-color: #7dc0d638;
    }

  .active{
    background: #7ea0d3 !important;
  }

  .containerlogin {
    padding: 16px;
    font-family: Arial, Helvetica, sans-serif;

  }

  .form-login {
    border: 10px solid #f1f1f1;
    background-color: #EFEFEF;
  }

  input[type=text] {
  border: 2px solid #CCCCCC;
  border-radius: 4px;
  font-weight: bold;
  }


.button-login {
  background-color: #5479B8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.button-login:hover {
  opacity: 0.8;
}


/*.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}*/


.btn {
  padding: 10px;
}

.span.psw {
  float: right;
  padding-top: 10px;
}

@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}


  /* Remove the navbar's default margin-bottom and rounded borders */
  .navbar {
    margin-left: 0;
    margin-bottom: 20px;
    width: 100%;
    align: center;
  }

  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {height: 450px}

  /* Set gray background color and 100% height */
  .sidenav {
    padding-top: 20px;
    background-color: #f1f1f1;
    height: 100%;
  }

  /* Set black background color, white text and some padding */
  footer {
    background-image: linear-gradient(#565E90, #547AB8 , #579BD4); /* Standard syntax (must be last) */
    color: white;
    padding: 15px;
  }

  .cover{
    width: 100%;height: 350px;background: url('{{ asset('images/bg2.png') }}');background-size: cover;
  }
  .cover .title{
    color: white;position: absolute;left: 100px;top: 60px;font-size: 60px;
  }
  .cover .search{
    color: white;position: absolute;left: 100px;top: 150px;width: 30%;
  }
  .cover .find-us{
    color: white;position: absolute;left: 100px;top: 200px;width: 30%;
  }
  .body-content{
    background-image: url('{{ asset('images/bgcontent.png') }}');
    background-repeat: no-repeat,no-repeat;
    background-position: 0% -10%,80% 150%;
    background-size: 100%, 500px;
  }

  /* On small screens, set height to 'auto' for sidenav and grid */
  @media screen and (max-width: 767px) {
    .sidenav {
      height: auto;
      padding: 15px;
    }
    .row.content {height:auto;}
    .cover{
      width: 100%;height: 300px;background: url('{{ asset('images/bg.jpg') }}');background-size: cover;
    }
    .cover .title{
      color: white;position: absolute;left: 20px;top: 20px;font-size: 60px;
    }
    .cover .search{
      display: none;
    }
    .cover .find-us{
      display: none;
    }
  }
  #button {
    display: inline-block;
    background-color: #FF9800;
    width: 50px;
    height: 50px;
    text-align: center;
    border-radius: 4px;
    margin: 30px;
    position: fixed;
    bottom: 30px;
    right: 30px;
    transition: background-color .3s;
    z-index: 1000;
  }
  #button:hover {
    cursor: pointer;
    background-color: #333;
  }
  #button:active {
    background-color: #555;
  }
  #button::after {
    content: "\f077";
    font-family: FontAwesome;
    font-weight: normal;
    font-style: normal;
    font-size: 2em;
    line-height: 50px;
    color: #fff;
  }

  .panelIconArch{
    height: 30px;
    width: 30px;
    background: #6496cd;
    border-radius: 15%;
    text-align: center;
    font-size: 25px;
    color: white;
    padding-top: 0px;
    float: left;
    margin: 15px;
    margin-left: 0;
    border: 2px dotted #545b8a;
  }

  .panelArch{
    background-color: #e8e8e8;
  }
  .panelArch:nth-of-type(odd){
    background-color: #c9d9f3;
  }

  .liAbJournal > li {
    padding: 10px 0px;
    border-bottom: solid 1px #ccc;
    list-style: none;
  }
  .liAbJournal > li:last-child {
    border-bottom: none;
  }

  .liAbJournal > li > a{
    color: #59a5c5;
    font-weight: bold;
    font-size: 16px;
  }

  .liAbJournal > li > a > .fa {
    font-size: 22px !important;
    margin-right: 10px;
  }

  .topHeader{
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    position: fixed;
    z-index: 999;
    background: rgba(255,255,255,0);
  }

</style>
</head>


<body>

<div class="topHeader" style="">
  <div class="Hlogo1"><img src="{{asset('images/logob.png')}}" style="float: left;margin-top: 10px;margin-left:30px" width="125px"></div>
  <div class="Hlogo2"><img src="{{asset('images/kemnkes.png')}}" style="float: right;margin-top: 10px;margin-right: 30px" width="60px"></div>
</div>

  <a id="button"></a>
  <div class="col-lg-12 col-md-12" style="padding: 0px">
    <div class="cover">
      <div class="title">
        {{$identitas->nama_web}}
      </div>
      <div class="search">
        <div class="input-group">
          <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
          <span class="input-group-addon"> <i class="fa fa-search"></i> Search </span>
        </div>
      </div>
      <div class="find-us">
        <a href="#" id="find-us" class="btn btn-default">Find Us</a>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
 {{-- menu --}}
  <div class="col=-lg-12 col-md-12" style="padding :0%">
    <nav class="navbar navbar-light" style="background-color: #efefef; font-weight: bold; font-size: 15px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{-- <a class="navbar-brand" href="#">Logo</a> --}}
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav" style="margin-left:20%">
            <?php
            $menus = App\Http\Models\Menu::orderBy('id_menu','ASC')->get();
            if(count($menus)!=0){
              foreach ($menus as $menu) {
                if ($menu->id_menu!=8 && $menu->id_menu!=6){
                  if(Auth::check()){
                    if ($menu->id_menu==3||$menu->id_menu==4) {
                    # code...
                    }else{
                      ?>
                      <li class="@if($menu->id_menu==$id_menu) active @else @endif"><a href="{{url($menu->url)}}">@if(Session::get('bahasa')=='indonesia'){{$menu->nama_menu}}@else{{$menu->name_menu}}@endif</a></li>
                      <?php
                    }
                  }else{
                    if ($menu->id_menu==9) {
                    # code...
                    }else{
                      ?>
                      <li class="@if($menu->id_menu==$id_menu) active @else @endif"><a href="{{url($menu->url)}}">@if(Session::get('bahasa')=='indonesia'){{$menu->nama_menu}}@else{{$menu->name_menu}}@endif</a></li>
                      <?php

                    }
                  }
                }
              }
            }
            ?>  
          </ul>
          {{-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="fa fa-signin"></span> Login</a></li>
          </ul> --}}
        </div>
      </div>
    </nav>
  </div>
  {{-- end menu --}}
  <div class="clearfix" style="margin-bottom: 10px"></div>
  <div class="container-fluid text-center body-content">
    <div class="row content">
      <div class="col-lg-10 col-md-10 text-left">
        @yield('content')
      </div>

      <div class="col-lg-2 col-md-2" style="padding: 0px">

        <div class="col-lg-12 col-md-12" style="margin-bottom: 10px;">
          <p style="color: black; font-weight: bold;float: left;">Select a language : </p>
          <select class="form-control" id="opB">
            <option value="indonesia" @if(Session::get("bahasa") == 'indonesia') selected @endif>Indonesia</option>
            <option value="inggris" @if(Session::get("bahasa") != 'indonesia') selected @endif>Inggris</option>
          </select>
        </div>

        <div class="col-lg-12 col-md-12">
          <div style="width: 100%;height: auto; text-align: left; font-weight: bold;">
            <div class="panel-group">
              <div class="panel panel-default">
                @if(!empty(Auth::id()))
                <div class="panel-heading" style=" color: #547AB8; text-align: center;">USER you're logged as</div>
                <div class="panel-body">
                 ~{{Auth::getUser()->username}}~
                  <ul>
                    <li><a href="{{url('userhome/edit_profil')}}">My Profil</a></li>
                    <li><a href="{{url('/userhome')}}">New Submission</a></li>
                    <li><a href="{{route('update_password')}}">Change Password</a></li>
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                  </ul>
                </div>
                @endif
                <div class="panel-body">
                   <a href="https://info.flagcounter.com/eBe7"><img src="https://s11.flagcounter.com/count2/eBe7/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" border="0"></a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
          <img src="{{asset('uploads/images/download.png')}}" style="width: 200px;">
        </div>

         <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
          <img src="{{asset('uploads/images/sasa.jpg')}}" style="width: 200px;">
        </div>

      </div>


    </div>
  </div>

  <footer class="container-fluid">
    <div class="col-lg-12 col-md-12">
      <h2 class="text-center" id="address">Address</h2>
      <div class="col-lg-4 col-md-4 text-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.2088136450875!2d112.7136768150868!3d-7.44213389463102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6b2d79626bb%3A0x51765a3955bb4a9!2sDinkes+Sidoarjo!5e0!3m2!1sid!2sid!4v1564732589033!5m2!1sid!2sid" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-lg-8 col-md-8">
        <h4 style="font-size: 50px">{{$identitas->nama_web}}</h4>
        <p><i class="fa fa-map-marker"></i> {{$identitas->alamat}}</p>
        <p><i class="fa fa-envelope"></i> {{$identitas->email}}</p>
        <p><i class="fa fa-phone"></i> {{$identitas->telepon}}</p>
        <p><i class="fa fa-fax"></i> {{$identitas->fax}}</p>
      </div>
    </div>
  </footer>

</body>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
<script>
     @if(Session::has('pesan'))
      swal("{{ Session::get('pesan')}}")
    @endif

    @if (!empty(Session::get('message')))
    swal({
      title: "{{Session::get('title')}}",
      text: "{{Session::get('message')}}",
      type: "{{Session::get('type')}}",
      timer: 2000,
      showConfirmButton: false
    });
  @endif

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  jQuery(document).ready(function() {

    var btn = $('#button');
    btn.hide();

    $(window).scroll(function() {
      if ($(window).scrollTop() > 100) {
        btn.show();
      } else {
        btn.hide();
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

    var find = $('#find-us');
    find.click(function(){
      $('html, body').animate({scrollTop: $('#address').offset().top }, 'slow');
      return false;
    })
  });

  function bahasa(bahasa){
    $.post("{{url('bahasa')}}",{bahasa:bahasa},function(data){
      if(data.status=='success'){
        location.reload();
      }
    });
  }
</script>

<script type="text/javascript">
$('#refresh').click(function(){
  $.ajax({
     type:'GET',
     url:'refreshcaptcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});
</script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor2' );
</script>
<script type="text/javascript">
  $('#opB').change(function (data) {
    var valBhs = $('#opB').val();
    bahasa(valBhs);
  })
</script>
<script type="text/javascript">

  function EasyPeasyParallax() {
    var scrollPos = $(document).scrollTop();
    if (scrollPos < 100) {
      $('.topHeader').attr('style','background-color:rgba(255,255,255,0)');
    } else {
      // $('.topHeader').attr('style','background-color:rgba(89, 118, 182,1)');
      $('.topHeader').attr('style','background-color:rgba(255, 255, 255,1)');
    }
};

$(function(){
    $(window).scroll(function() {
        EasyPeasyParallax();
    });
});


</script>
@yield('js')
</html>
