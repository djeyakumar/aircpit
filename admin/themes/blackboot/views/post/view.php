<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php
	$this->widget(
	    'booster.widgets.TbDetailView',
	    array(
	        'data' => $model,
	        'attributes' => array(
	            array('name' => 'title', 'label' => 'Title'),
	            array('name' => 'description', 'label' => 'Description'),
	            array('name' => 'email', 'label' => 'Email'),
	            array('name' => 'telephone', 'label' => 'Tel'),
	            array('name' => 'mobile', 'label' => 'Mobile'),
	            array('name' => 'address1', 'label' => 'Address'),
	        ),
	    )
	);
?>