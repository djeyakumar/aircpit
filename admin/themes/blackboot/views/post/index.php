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
	    	'dataProvider'=>$model->search(),
    		//'filter'=>$model,
	        //'fixedHeader' => true,
	        'headerOffset' => 40,
	        // 40px is the height of the main navigation at bootstrap
	        'type' => 'striped bordered condensed',
	        'responsiveTable' => true,
	        'template' => "{items}\n{pager}",
	        'columns'=>array(
                array(
                	'name'=>'id',
                	'value'=>'$data->id',
                	'filter'=>false,
                ),
                array(
		            'name'=>'employerSearch',
		            'type'=>'html',
		            'value'=>'(!empty($data->employer->logo))?CHtml::image(Yii::app()->request->baseUrl."/uploads/employer/".$data->employer->logo,"",array("style"=>"width:25px;height:25px;")):"no image"',
		            'filter'=>false,
		        ),
                /*array(
                	'name'=>'employerSearch',
                	'value'=>'CHtml::link(($data->employer ? $data->employer->companyname : ""), Yii::app()->createUrl("employer/view",array("id"=>$data->employer->id)))',
                	'type' => 'raw'
                ),*/
                array(
                	'name'=>'title',
                	'value'=>'CHtml::link($data->title, Yii::app()->createUrl("post/update",array("id"=>$data->primaryKey)))',
                	'type'=>'raw',
                ),
                array(
                	'name'=>'mobile',
                	'value'=>'$data->mobile',
                ),
                array(
                	'name'=>'industry',
                	'value'=>'($data->industry1) ? $data->industry1->industry : ""'
                ),
                array(
                	'name'=>'functional_area',
                	'value'=>'($data->functional_area1) ? $data->functional_area1->functional_area : ""'
                ),
                array(
                	'name'=>'city',
                	'value'=>'$data->city'
                ),
                array(
                	'name'=>'file1',
                	'value'=>'CHtml::link($data->file1, Yii::app()->baseUrl."/uploads/post/".$data->file1)',
                	'type'=>'raw',
                	'filter'=>false,
                ),
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
