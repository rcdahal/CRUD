<?php 
include ('header.php');?>
<div class="container" style="margin-top:20px;">
    <div class="container">
<a class="btn btn-danger" style="margin-left:500px;" href="<?php echo base_url()?>email"?>Check Email Availability for Registration!!</a>
</div>
	<h1>Registration Login</h1>
<?php echo form_open('admin/sendeml');?>
<div class="row">
	<?php if($user=$this->session->flashdata('user')){
        $user_class=$this->session->flashdata('user_class')
        ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="alert <?= $user_class?>">
                    <?= $user; ?>
                </div>
            </div>
        </div>
        <?php } ?>
	<div class="col-lg-6">
 <div class="form-group">
      <label for="User Name" >User Name:</label>
     
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
<div class="row">
	<div class="col-lg-6">
 <div class="form-group">
      <label for="First Name" >First Name:</label>
     
    <?php   echo form_input(['class'=>'form-control','placeholder'=>'First name','name'=>'fname','value'=>set_value('fname')]); ?>
    </div></div>
    <div class="col-lg-6">
    <?php echo form_error('fname');?>

</div>
</div>
<div class="row">
	<div class="col-lg-6">
 <div class="form-group">
      <label for="Last Name" >Last Name:</label>
     
    <?php   echo form_input(['class'=>'form-control','placeholder'=>'Last name','name'=>'lname','value'=>set_value('lname')]); ?>
    </div></div>
    <div class="col-lg-6">
    <?php echo form_error('lname');?>

</div>
</div>
<div class="row">
	<div class="col-lg-6">
 <div class="form-group">
      <label for="email" >Email address:</label>
     
    <?php   echo form_input(['class'=>'form-control','placeholder'=>'Email Address','name'=>'email','value'=>set_value('email')]); ?>
    </div></div>
    <div class="col-lg-6">
    <?php echo form_error('email');?>

</div>
</div>

    <div  style="margin-top:10px;">
    	<?php echo form_submit(['class'=>'btn btn-primary','type'=>'submit','value'=>'submit']);?>
    	<?php echo form_reset(['class'=>'btn btn-info','type'=>'reset','value'=>'Reset']);?>
    	

    </div>

</div>
	
    <?php 
include('footer.php');
?>