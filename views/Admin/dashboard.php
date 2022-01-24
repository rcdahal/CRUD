<?php include ('header.php');?>
<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-4">
		<a href ="adduser" class="btn btn-lg btn-primary">Add Articles</a>
	</div>
</div>
<html>
<head>
	<title>dashboard</title>
</head>
<body>
	
	<div class="container" style="margin-top:30px;">
		<?php if($msg=$this->session->flashdata('msg')){
        $msg_class=$this->session->flashdata('msg_class')
        ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="alert <?= $msg_class?>">
                    <?= $msg; ?>
                </div>
            </div>
        </div>
        <?php } ?>
	<div class="table">
		<table class="table table-striped"> 
			<thead>
				<tr>
					<th>S.No.</th>
					<th>Artical Title</th>
					<th>Artical Body</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $count=0; if(count($article)):
					foreach ($article as $art) : ++$count;?>
						
				<tr>
					<td><?=  $count;?></td>
					<td><?= $art->article_title;?></td>
					<td><?= $art->article_body;?></td>
					<td><?=
						form_open('admin/edituser'),
						form_hidden('id',$art->id),
						form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-info']),
						form_close();
						 ?></td>
					<td>
						<?=
						form_open('admin/delarticles'),
						form_hidden('id',$art->id),
						form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
						form_close();
						 ?>
					</td>
				</tr>
			<?php endforeach;?>
			<?php else:?>
				<tr>
					<td colspan="3">No data available</td>
				</tr>
			<?php
		endif;
		?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
<?php include ('footer.php');?>