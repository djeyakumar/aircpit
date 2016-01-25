<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php
	$this->widget(
	    'booster.widgets.TbDetailView',
	    array(
	        'data' => $model,
	        'attributes' => array(
	            array('name' => 'firstname', 'label' => 'First Name'),
	            array('name' => 'lastname', 'label' => 'Last Name'),
	            array('name' => 'sex', 'label' => 'Sex'),
	            array('name' => 'age', 'label' => 'Age'),
	            array('name' => 'username', 'label' => 'User Name'),
	            array('name' => 'email', 'label' => 'Email'),
	            array('name' => 'telephone', 'label' => 'Tel'),
	            array('name' => 'mobile', 'label' => 'Mobile'),
	            array('name' => 'address1', 'label' => 'Address'),
	        ),
	    )
	);
?>