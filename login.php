<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | Spotiplay</title>
  <link rel="stylesheet" href="./css/adminlte.min.css">
  <link rel="stylesheet" href="./css/styles2.css">
  <script src="./js/jquery.min.js"></script>
</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0;
	    background: rgb(77,82,85);
		background: linear-gradient(180deg, rgba(77,82,85,1) 6%, rgba(76,81,84,1) 22%, rgba(33,36,38,1) 91%, rgba(26,28,29,1) 100%);
	}
	main#main{
		width:100%;
		height: calc(100%) !important;
		display: flex;
	}
</style>

<body class="bg-light">
  <main id="main" >	
  	<div class="container">
  		<div class="col-md-8 offset-md-2 d-flex justify-content-center">
  		<div id="login-center" class="row justify-content-center align-self-center w-100">
  			<div class="d-flex justify-content-center align-items-center w-100">
  				<span  class="m-4 p-2">
  				<h1 class="fw-bolder text-center" id="text-title"><b>Spotiplay</b></h1>
				  <h5 class="fw-bolder text-center" id="text-title"><b>Welcome back</b></h5>
  				</span>
  			</div>
  			<div class="card col-sm-7">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<input type="text" id="email" name="email" class="form-control" placeholder="Email">
  						</div>
  						<div class="form-group">
  							<input type="password" id="password" name="password" class="form-control" placeholder="Password">
  						</div>
  						<center><button class="btn btn-block btn-wave btn-primary bg-gradient-primary">Login</button></center>
  						<hr>
  						<center><button class="btn btn-block btn-wave btn-success bg-gradient-success" type="button" id="new_account">Sign Up</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>
  	</div>
  </main>

  <div class="modal fade" id="reg_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
         <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><b>&times;</b></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#reg_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
</body>
<script src="./js/bootstrap.bundle.min.js"></script>

<script>
	 window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	  }
	  window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
	      })
	  }
	  window.reg_modal = function($title = '' , $url='',$size=""){
	      start_load()
	      $.ajax({
	          url:$url,
	          error:err=>{
	              console.log()
	              alert("An error occured")
	          },
	          success:function(resp){
	              if(resp){
	                  $('#reg_modal .modal-title').html($title)
	                  $('#reg_modal .modal-body').html(resp)
	                  if($size != ''){
	                      $('#reg_modal .modal-dialog').addClass($size)
	                  }else{
	                      $('#reg_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
	                  }
	                  $('#reg_modal').modal({
	                    show:true,
	                    backdrop:'static',
	                    keyboard:false,
	                    focus:true
	                  })
	                  end_load()
	              }
	          }
	      })
	  }
	   window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
	   	 var Toast = Swal.mixin({
	      toast: true,
	      position: $pos || 'top-end',
	      showConfirmButton: false,
	      timer: 5000
	    });
	      Toast.fire({
	        icon: $bg,
	        title: $msg
	      })
	  }
	$('#new_account').click(function(){
		reg_modal("<h4>Sign Up</h4><span></span>","signup.php","large")
	})
	$('#login-form').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
				end_load()
			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					end_load()
				}
			}
		})
	})
</script>	
</html>