
<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style --> 
	<link rel="stylesheet" href="{{asset('logintemp/css/style.css')}}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{url('css/sweetalert.css')}}">
	<script src="{{url('js/sweetalert.min.js')}}"></script>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
	<div class="footer">
	     <p>Copyright &copy; 2019 DInas Kesehatan Kabupaten SIdoarjo. Jl. Mayjend Sungkono 46 Sidoarjo.</p>
	</div>
</body>
<script>
  @if(Session::has('message'))
  	swal('{{Session::get('title')}}','{{Session::get('message')}}','{{Session::get('type')}}');
  @endif
</script>
</html>