<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiListView.update('jobslistview', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
    return false;
});
");
?>
 
<h2>Jobs</h2>
<p> 
	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
</p>
<div class="search-form" style="display:none">
<?php  $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>

<?php
	$this->widget('zii.widgets.CListView', array(
	    'id'=>'jobslistview',
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'_view',   // refers to the partial view named '_post'
	    'sortableAttributes'=>array(
	        'title',
	        //'created_at'=>'Date',
	    ),
	));
?>