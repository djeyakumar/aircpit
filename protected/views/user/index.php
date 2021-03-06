<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
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
                array(
		            'name'=>'photo',
		            'type'=>'html',
		            'value'=>'(!empty($data->photo))?CHtml::image(Yii::app()->request->baseUrl."/admin/uploads/user/".$data->photo,"",array("style"=>"width:25px;height:25px;")):"no image"',
		        ),
                array('name'=>'firstname', 'value'=>'CHtml::link($data->firstname, Yii::app()->createUrl("user/view",array("id"=>$data->primaryKey)))', 'type'=>'raw'),
                array('name'=>'lastname', 'value'=>'$data->lastname'),
                array('name'=>'sex', 'value'=>'$data->sex'),
                array('name'=>'age', 'value'=>'$data->age'),
                array('name'=>'experience', 'value'=>'$data->experience'),
                array('name'=>'industry', 'value'=>'$data->industry1->industry'),
                array('name'=>'functional_area', 'value'=>'$data->functional_area1->functional_area'),
                array('name'=>'city', 'value'=>'$data->city'),
            ),
	    )
	);
?>