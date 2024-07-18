@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
  <div class="col-lg-8 col-lg-offset-3">
    <a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
	  <div class="section-header">
        <h4>Ubah Password</h4>
        <p>Enter your current and new passwords below to change the password for your account.</p>
        <hr style="  border: 1px solid DimGray;">
    </div>
      <form class="form-horizontal" method="post" action="{{ route('do_password') }}">
	      {{csrf_field()}}
  	    <div class="form-group">
  	      <label class="control-label col-sm-2">Current password :</label>
  	      <div class="col-sm-10">
  	        <input type="password" class="form-control" placeholder="Enter Password" name="old_password">
  	      </div>
  	    </div>
  	    <div class="form-group">
  	      <label class="control-label col-sm-2">New Password:</label>
  	      <div class="col-sm-10">          
  	        <input type="password" class="form-control" placeholder="Enter New password" name="new_password">
  	        <small>The password must be at least 6 characters.</small>
  	      </div>
  	    </div>
	      <div class="form-group">
  	      <label class="control-label col-sm-2">Repeat New Password:</label>
  	      <div class="col-sm-10">          
  	        <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
  	      </div>
  	    </div>
  	    <div class="form-group">
  	      <div class="col-sm-offset-2 col-sm-10">
  	        <div class="checkbox">
  	          <label><input type="checkbox" name="remember"> Remember me</label>
  	        </div>
  	      </div>
  	    </div>
  	    <div class="form-group">
  	      <div class="col-sm-offset-4 col-sm-8">
  	        <button type="submit" class="btn btn-success">SAVE</button>
  	        <button type="submit" class="btn btn-default">CANCEL</button>
  	      </div>	    
  	    </div>
      </form>	  	
  </div>	
</div>
@endsection
@section('js')
<script type="text/javascript">
    $('input[name=new]').keyup(function(){
      var new = $('input[name=new]').val();
      var confirm = $('input[name=confirm]').val();
      var old = $('input[name=old]').val();
      if(new!='' && confirm!=''){
        if(new==confirm){
          if(old==''){
            $('#status').hide();
            $('#simpan').attr('disabled','disabled');
          }else{
            $('#status').hide();
            $('#simpan').removeAttr('disabled');
          }
        }else{
          $('#status').show();
          $('#simpan').attr('disabled','disabled');
        }
      }else{
        $('#status').hide();
        $('#simpan').attr('disabled','disabled');
      }
    });

    $('input[name=confirm]').keyup(function(){
      var new = $('input[name=new]').val();
      var confirm = $('input[name=confirm]').val();
      var old = $('input[name=old]').val();
      if(new!='' && confirm!=''){
        if(new==confirm){
          if(old==''){
            $('#status').hide();
            $('#simpan').attr('disabled','disabled');
          }else{
            $('#status').hide();
            $('#simpan').removeAttr('disabled');
          }
        }else{
          $('#status').show();
          $('#simpan').attr('disabled','disabled');
        }
      }else{
        $('#status').hide();
        $('#simpan').attr('disabled','disabled');
      }
    });

    $('input[name=old]').keyup(function(){
      var new = $('input[name=new]').val();
      var confirm = $('input[name=confirm]').val();
      var old = $('input[name=old]').val();
      if(new!='' && confirm!=''){
        if(new==confirm){
          if(old==''){
            $('#status').hide();
            $('#simpan').attr('disabled','disabled');
          }else{
            $('#status').hide();
            $('#simpan').removeAttr('disabled');
          }
        }else{
          $('#status').show();
          $('#simpan').attr('disabled','disabled');
        }
      }else{
        $('#status').hide();
        $('#simpan').attr('disabled','disabled');
      }
    });
  </script>
@endsection