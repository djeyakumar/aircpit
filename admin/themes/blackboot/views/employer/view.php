<?php
/* @var $this EmployerController */
/* @var $model Employer */

$this->breadcrumbs=array(
	'Employers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Employer', 'url'=>array('index')),
	array('label'=>'Create Employer', 'url'=>array('create')),
	array('label'=>'Update Employer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Employer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employer', 'url'=>array('admin')),
);
?>

<h1>View Employer #<?php echo $model->id; ?></h1>
<?php
	$this->widget(
	    'booster.widgets.TbDetailView',
	    array(
	        'data' => $model,
	        'attributes' => array(
	            array('name' => 'companyname', 'label' => 'Company name'),
	            array('name' => 'companydescription', 'label' => 'Description'),
	            array('name' => 'email', 'label' => 'Email'),
	            array('name' => 'telephone', 'label' => 'Tel'),
	            array('name' => 'mobile', 'label' => 'Mobile'),
	            array('name' => 'address1', 'label' => 'Address'),
	        ),
	    )
	);
?>