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
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>
  <script src="{{asset('js/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/sweetalert.min.js')}}"></script>

  <style>

  .contentPub {
    padding: 16px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .form-login {
    border: 0px solid #f1f1f1;
  }

  input[type=text] {
  border: 2px solid #CCCCCC;
  border-radius: 4px;
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

</style>
</head>
<body>


</body>
</html>
