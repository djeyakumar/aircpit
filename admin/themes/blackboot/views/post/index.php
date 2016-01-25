<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>Posts</h1>

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
                array('name'=>'file1', 'value'=>'CHtml::link($data->file1, Yii::app()->baseUrl."/uploads/post/".$data->file1)', 'type'=>'raw'),
                array('name'=>'status', 
                     'filter'=>array("A" => "Active","I" => "Inactive","D" => "Deleted"),
                     'value'=>'($data->status == "A" ? "Active" : ($data->status == "I" ? "In-Active" : "Deleted"))',
                     'htmlOptions'=>array('style'=>'width:100px;'),
                ),
            ),
	    )
	);
?>
