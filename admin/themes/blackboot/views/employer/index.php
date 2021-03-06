<?php
/* @var $this EmployerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Employers',
);

$this->menu=array(
	array('label'=>'Create Employer', 'url'=>array('create')),
	array('label'=>'Manage Employer', 'url'=>array('admin')),
);
?>

<h1>Employers</h1>

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
	        'template' => "{items}{delete}",
	        'columns'=>array(
                array('name'=>'id', 'value'=>'$data->id'),
                array(
		            'name'=>'logo',
		            'type'=>'html',
		            'value'=>'(!empty($data->logo))?CHtml::image(Yii::app()->request->baseUrl."/uploads/employer/".$data->logo,"",array("style"=>"width:25px;height:25px;")):"no image"',
		        ),
                array('name'=>'companyname', 'value'=>'CHtml::link($data->companyname, Yii::app()->createUrl("employer/update",array("id"=>$data->primaryKey)))', 'type'=>'raw'),
                array('name'=>'companydescription', 'value'=>'$data->companydescription'),
                array('name'=>'username', 'value'=>'$data->username'),
                array('name'=>'email', 'value'=>'$data->email'),
                array('name'=>'mobile', 'value'=>'$data->mobile'),
                array('name'=>'city', 'value'=>'$data->city'),
                array('name'=>'address1', 'value'=>'$data->address1'),
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