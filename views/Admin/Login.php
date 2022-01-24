<?php 
include ('header.php');?>
<div class="container" style="margin-top:20px;">
	<h1>Admin Login</h1>
    <?php if($error=$this->session->flashdata('Login_failed')){?>
        <div class="row">
            <div class="col-lg-6">
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            </div>
        </div>
        <?php } ?>
<?php echo form_open('login/index');?>
<div class="row">
	<div class="col-lg-6">
 <div class="form-group">
      <label for="email" >Email address:</label>
     
    <?php   echo form_input(['class'=>'form-control','placeholder'=>'User name','name'=>'uname','value'=>set_value('uname')]); ?>
    </div></div>
    <div class="col-lg-6">
    <?php echo form_error('uname');?>

</div>
</div>
    <div class="row">
    	<div class="col-lg-6">
   <div class="form-group">
      <label for="password">Password:</label>
      
    <?php   echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'password','name'=>'pass','value'=>set_value('pass')]); ?>
      
    </div></div>
<div class="col-lg-6">
    <?php echo form_error('pass');?>

</div>
</div>
    <div  style="margin-top:10px;">
    	<?php echo form_submit(['class'=>'btn btn-primary','type'=>'submit','value'=>'submit']);?>
    	<?php echo form_reset(['class'=>'btn btn-info','type'=>'reset','value'=>'Reset']);?>
    	<?php echo anchor('/Admin/register/','Sign Up?','class="link-class"')?>

    </div>

</div>
	
    <?php 
include('footer.php');
?>