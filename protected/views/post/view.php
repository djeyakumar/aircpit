<div class="col-md-12 content-left">

	<h2>View Post #<?php echo $model->id; ?></h2>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'title',
			'description',
			'employer_id',
			'email',
			'mobile',
			'telephone',
			'country',
			'state',
			'district',
			'city',
			'experience',
			'industry',
			'functional_area',
			'address1',
			'address2',
			'file1',
			'createdBy',
			'createdDate',
			'modifiedBy',
			'modifiedDate',
			'status',
		),
	)); ?>
</div>