<?php
/* @var $this EmployerController */
/* @var $model Employer */

$this->breadcrumbs=array(
	'Employers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Employer', 'url'=>array('index')),
	array('label'=>'Manage Employer', 'url'=>array('admin')),
);
?>

<h1>Create Employer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>