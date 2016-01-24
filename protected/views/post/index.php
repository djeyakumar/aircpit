<div class="col-md-12 content-left">

	<h2>Posts</h2>
	<div class="form-group"> 
        <div class="pull-right">
			<?php echo CHtml::button('Create', array(
				'submit' => array('post/create'), 
				'class'=>'btn btn-primary'
				)
			); ?>
		</div>
	</div>
	<?php
		$this->widget(
	    'booster.widgets.TbExtendedGridView',
		    array(
		        'fixedHeader' => true,
		        'headerOffset' => 40,
		        // 40px is the height of the main navigation at bootstrap
		        'type' => 'striped',
		        'dataProvider' => $dataProvider,
		        'responsiveTable' => true,
		        'template' => "{items}",
		        'columns'=>array(
	                array('name'=>'id', 'value'=>'$data->id'),
	                array('name'=>'title', 'value'=>'CHtml::link($data->title, Yii::app()->createUrl("post/update",array("id"=>$data->primaryKey)))', 'type'=>'raw'),
	                array('name'=>'mobile', 'value'=>'$data->mobile'),
	                array('name'=>'industry', 'value'=>'$data->industry'),
	                array('name'=>'functional_area', 'value'=>'$data->functional_area'),
	                array('name'=>'city', 'value'=>'$data->city'),
	                array('name'=>'createdDate', 'value'=>'Yii::app()->dateFormatter->format("dd/MM/y",strtotime($data->createdDate))', 'filter'=>false),
	            ),
		    )
		);
	?>
</div>	