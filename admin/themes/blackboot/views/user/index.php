<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Users</h1>

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
                array('name'=>'firstname', 'value'=>'CHtml::link($data->firstname, Yii::app()->createUrl("user/update",array("id"=>$data->primaryKey)))', 'type'=>'raw'),
                array('name'=>'lastname', 'value'=>'$data->lastname'),
                array('name'=>'sex', 'value'=>'$data->sex'),
                array('name'=>'age', 'value'=>'$data->age'),
                array('name'=>'functional_area', 'value'=>'$data->functional_area'),
                array('name'=>'city', 'value'=>'$data->city'),
            ),
	    )
	);
?>