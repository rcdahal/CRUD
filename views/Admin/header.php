<html>
<head>
	<title>Article List </title>

	<link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Pannel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    if($this->session->userdata('id')){ ?>
    	<li><a href="<?= base_url('admin/logout');?>" class="btn btn-danger" style="">LogOut</a></li>
    	<?php 
    }
?>
   
      
  </div>
</nav>