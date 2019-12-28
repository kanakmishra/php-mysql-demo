<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
  </head>
  <body>
    <div class="container">
        <!-- <span id="regSuccess" style="color:green;"><?php //header("location:login.php"); ?></span> -->
		<h1>Registration Form</h1>
		<br />
		<div class="col-lg-8 m-auto">
	    	<form id="myForm" data-parsley-validate="">
			    <div class="form-group">
			      <label>First Name:</label>
			      <input type="text" id="first_name" class="form-control" required=""
			      name="first_name" value="" data-parsley-minlength="3" data-parsley-maxlength="20">
			    </div>
			    <div class="form-group">
			      <label>Last Name:</label>
			      <input type="text" id="last_name" class="form-control"  required=""
			       name="last_name" value="" data-parsley-minlength="3" data-parsley-maxlength="20">
			    </div>
			    <div class="form-group">
			      <label>Email:</label>
			      <input type="email" id="email" class="form-control"  required="" name="email" value=""
			      data-parsley-maxlength="50">
                  <span id="emailDuplicate" style="color:red;"></span>
			    </div>
			    <div class="form-group">
			    	<label>Password:</label>
	      			<input type="password" id="password" class="form-control"  required="" name="password" data-parsley-minlength="5" data-parsley-maxlength="100" />
	    		</div>
			    <div class="form-group">
			      <label>Confirm Password:</label>
	      		  <input type="password" class="form-control"  required="" name="confirm_password" data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-equalto="#password"  />
			    </div>
			    <input type="button" name="submit" id="btnsubmit" value="submit" class="btn btn-success" />
	    	</form>
    	</div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$(document).on('click','#btnsubmit',function(){
    		// $(document).click('#btnsubmit')function(){
				var firstName =  $("#first_name").val();
				var lastName =  $("#last_name").val();
				var email = $("#email").val();
				var password = $("#password").val()
				$.ajax({
					url: "insert.php",
					type: "POST",
					data:{firstName:firstName,lastName:lastName,email:email,password:password},
					success: function(response){ 
						if (response == 1){
							$('#regSuccess').html("Thank you for registration, Please login to continue.");
							// window.location.assign("login.php");
						}
					}
				});
    		});

    		$(document).on('blur','#email',function(){
				//var firstName =  $("#first_name").val();
				//var lastName =  $("#last_name").val();
				var email = $("#email").val();
				//var password = $("#password").val()
				$.ajax({
					url: "checkEmail.php",
					type: "POST",
					data:{email:email},
					success: function(response){ 
						if (response == 0){
							$('#emailDuplicate').html("");
							$('#formSubmit').attr('disabled',false);
						} else {
							$('#emailDuplicate').html("Email Address already exists.");
							$('#formSubmit').attr('disabled',true);
						}
					}
				});
    		});

    	});
    </script>
  </body>
</html>
