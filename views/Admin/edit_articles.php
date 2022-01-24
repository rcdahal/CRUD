<?php 
include ('header.php');?>
<div class="container" style="margin-top:20px;">
	<h1>Edit Articles </h1>
    
        
<?php echo form_open('admin/update_article');?>
    <?php echo form_hidden('id',$this->input->post('id'));?>

<div class="row">
	<div class="col-lg-6">
 <div class="form-group">
      <label for="title" >Artical Title</label>
     
    <?php   echo form_input(['class'=>'form-control','placeholder'=>'Artical Title','name'=>'article_title','value'=>set_value('article_title',$article->article_title)]); ?>
    </div></div>
    <div class="col-lg-6">
    <?php echo form_error('article_title');?>

</div>

</div>
   

    <div class="row">
    	<div class="col-lg-6">
   <div class="form-group">
      <label for="body">Article Body</label>
      
    <?php   echo form_textarea(['class'=>'form-control','type'=>'body','placeholder'=>'body','name'=>'article_body','value'=>set_value('article_body',$article->article_body)]); ?>
      
    </div></div>
<div class="col-lg-6">

    <?php  echo form_error('article_body');?>

</div>
</div>
    <div  style="margin-top:10px;">
    	<?php echo form_submit(['class'=>'btn btn-primary','type'=>'submit','value'=>'Update']);?>
    	<?php echo form_reset(['class'=>'btn btn-info','type'=>'reset','value'=>'Reset']);?>

    </div>

</div>
	
    <?php 
include('footer.php');
?>