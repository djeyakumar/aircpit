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
                array(
		            'name'=>'photo',
		            'type'=>'html',
		            'value'=>'(!empty($data->photo))?CHtml::image(Yii::app()->request->baseUrl."/uploads/user/".$data->photo,"",array("style"=>"width:25px;height:25px;")):"no image"',
		        ),
                array('name'=>'firstname', 'value'=>'CHtml::link($data->firstname, Yii::app()->createUrl("user/update",array("id"=>$data->primaryKey)))', 'type'=>'raw'),
                array('name'=>'lastname', 'value'=>'$data->lastname'),
                array('name'=>'sex', 'value'=>'$data->sex'),
                array('name'=>'age', 'value'=>'$data->age'),
                array('name'=>'functional_area', 'value'=>'$data->functional_area'),
                array('name'=>'city', 'value'=>'$data->city'),
                array('name'=>'status', 
                     'filter'=>array("A" => "Active","I" => "Inactive","D" => "Deleted"),
                     'value'=>'($data->status == "A" ? "Active" : ($data->status == "I" ? "In-Active" : "Deleted"))',
                     'htmlOptions'=>array('style'=>'width:100px;'),
                ),
                array(
                    'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{update}{delete}',
                    'afterDelete'=>'function(link,success,data){ if(success){ $("#statusMsg").html(data);} $("#delAlert").animate({opacity: 1.0}, 6000).fadeOut(); }',                
                ),
            ),
	    )
	);
?>