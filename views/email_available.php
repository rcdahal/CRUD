<html>
<head>
	<title>Email Check </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
		$(document).ready(function(){
			$('#email').change(function(){
				var email=$('#email').val();

				if(email!=''){

					$.ajax({
						url:"<?php echo base_url();?>email/check_available",
						method:"POST",
						data:{email:email},
						success:function(data){
							$('#email_result').html(data);
						}
					});
				}
			});
		});
	</script>
	</head>
	<body>
		
		<div class="container "><br/><br/><br/>
			<h3 align="center"><?php echo $title;?></h3><br/>
			<div class="col-md-6 " style="margin-left: 30%; color: red;">
			<label>Enter Email</label><br/>
			<input type="text" name="email" id="email" class="form-control">
			<span id="email_result"></span><br/><br/>
		</div>
		</div>
	</body>
	</html>
	