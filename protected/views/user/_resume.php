<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">
	<div class="row">
		<div class="col-sm-offset-1 col-sm-10 post">
			<?php $img = ($data->photo) ? $data->photo  : '';?>
			<div class="col-sm-2">
				<img src="<?='admin/uploads/user/'.$img?>?<?=rand(1,32000)?>"  class="img-rounded" style="width: 140px; height: auto;" />
			</div>
			<div class="col-sm-6">
				<h4><a href class="date"><?=$data->firstname?> <b>(<?=$data->experience?> yrs)</b></a></h4>
				<p><?=$this->trimLongText($data->biodata, 250)?></p>
				<p class="power">
					<?php if(!empty($data->email)) : ?>
						&nbsp;<i class='fa fa-envelope'></i> <?=$data->email?>
					<?php endif;?>
					<?php if(!empty($data->telephone)) : ?>
						&nbsp;<i class='fa fa-phone'></i> <?=$data->telephone?>
					<?php endif;?>
					<?php if(!empty($data->mobile)) : ?>
						&nbsp;<i class='fa fa-mobile'></i> <?=$data->mobile?>
					<?php endif;?>
				</p>
				<p>
					<b>Location : </b><a class="date" href><?=($data->city) ? $data->city : '';?></a>
					<a class="date" href><?=($data->district1) ? ($data->district1->district ? $data->district1->district : '') : '';?></a>
					<a class="date" href><?=($data->state1) ? ($data->state1->state ? $data->state1->state : '') : '';?></a>
				</p>
			</div>
			<div class="col-sm-4">
				<p>
					<b>Industry : </b><a class="date" href><?=($data->industry1) ? ($data->industry1->industry ? $data->industry1->industry : '') : '';?></a>
				</p>
				<p>
					<b>Functional Area : </b><a class="date" href><?=($data->functional_area1) ? ($data->functional_area1->functional_area ? $data->functional_area1->functional_area : '') : '';?></a>
				</p>
				<p>
					<?php if(!empty($data->address1)) : ?>
						<b>Address : </b><?=$data->address1?></p>
					<?php endif;?>
				</p>
			</div>
		</div>
	</div>
</div>