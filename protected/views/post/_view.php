<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">
	<div class="row">
		<div class="col-sm-offset-1 col-sm-10 post">
			<div class="col-sm-2">
				<?=$data->getLogo();?>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="col-sm-12">
						<h4><a href class="date"><?=$data->title?> </a></h4>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-6">Industry  </label>
					<div class="col-sm-6">
						<a class="date" href><?=($data->industry1) ? ($data->industry1->industry ? $data->industry1->industry : '-') : '-';?></a>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-6">Functional Area </label>
					<div class="col-sm-6">
						<a class="date" href><?=($data->functional_area1) ? ($data->functional_area1->functional_area ? $data->functional_area1->functional_area : '-') : '-';?></a>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-6">Experience  </label>
					<div class="col-sm-6">
						<a class="date" href><?=($data->experience) ? $data->experience." years " : '-';?></a>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-6">File  </label>
					<div class="col-sm-6">
						<?=CHtml::link($data->file1, Yii::app()->baseUrl."/uploads/post/".$data->file1)?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<div class="col-sm-12">
						<?php if(!empty($data->email)) : ?>
							&nbsp;<i class='fa fa-envelope'></i> <?=$data->email?>
						<?php endif;?>
						<?php if(!empty($data->telephone)) : ?>
							&nbsp;<i class='fa fa-phone'></i> <?=$data->telephone?>
						<?php endif;?>
						<?php if(!empty($data->mobile)) : ?>
							&nbsp;<i class='fa fa-mobile'></i> <?=$data->mobile?>
						<?php endif;?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">Location  </label>
					<div class="col-sm-9">
						<a class="date" href><?=($data->city) ? $data->city : '-';?></a>
						<a class="date" href><?=($data->district1) ? ($data->district1->district ? $data->district1->district : '-') : '-';?></a>
						<a class="date" href><?=($data->state1) ? ($data->state1->state ? $data->state1->state : '-') : '-';?></a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">Address 1  </label>
					<div class="col-sm-9">
						<?=$data->address1?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3">Address 2  </label>
					<div class="col-sm-9">
						<?=$data->address2?>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<b>Job Details</b>
				<p>
					<?=$this->trimLongText($data->description, 250)?>
					<a href onClick="event.preventDefault();$('#post_<?=$data->id;?>').modal('show');"> Read More</a>
					<?php if(strlen($data->description) > 0) : ?>
						<div id="post_<?=$data->id;?>" class="modal fade" role="dialog">
						  	<div class="modal-dialog">
						        <div class="modal-content">
							      	<div class="modal-header">
							      		<?=$data->title;?>
							        	<button type="button" class="close" data-dismiss="modal">&times;</button>
							      	</div>
							      	<div class="modal-body">
							        	<p><?=$data->description;?></p>
							      	</div>
						    	</div>
						  	</div>
						</div>
					<?php endif;?>
				</p>
			</div>
		</div>
	</div>
</div>