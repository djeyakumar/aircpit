<div class="col-md-12 content-left">

	<h2>Manage Posts</h2>

	<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</p>

	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'post-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'id',
			'title',
			'description',
			'employer_id',
			'email',
			'mobile',
			/*
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
			*/
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>