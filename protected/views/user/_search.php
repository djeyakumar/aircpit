<?php
/* @var $this SiteController */
/* @var $model SearchForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Search Job';
?>

<?php if(Yii::app()->user->hasFlash('search')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('search'); ?>
</div>

<?php else: ?>

<div class="form">
	
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'search-form',
		'enableClientValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>false,
		),
		'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'industry'),
	        'htmlOptions'=>array(
	            'class'=>'form-inline',
	            'enctype' => 'multipart/form-data',
	            'style' => 'text-align: center'
	        )
		)); 
	?>

	<?php //echo $form->errorSummary($model); ?>
	<div class="form-group">
        <?php //echo $form->labelEx($model,'industry', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <?php $list = CHtml::listData(Industries::model()->findAll(array('order' => 'industry')), 'id', 'industry');?>
        <?php echo $form->dropDownList($model, 'industry', $list, array(
            'class'=>'form-control', 
            'empty' => 'Select Category',
            'style'=>'text-transform: capitalize',
            'ajax' => array(
                'type'=>'POST',
                'url'=>CController::createUrl('functionalAreas', array('form'=>'User')),
                'update'=>'#User_functional_area',
            )
        ));?>
        <?php echo $form->error($model,'industry'); ?>
    </div>

    <div class="form-group">
        <?php //echo $form->labelEx($model,'functional_area', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <?php echo $form->dropDownList($model, 'functional_area', array(), array('class'=>'form-control','empty' => 'Select Sub-Category','style'=>'text-transform: capitalize'));?>
        <?php echo $form->error($model,'functional_area'); ?>
    </div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'experience'); ?>
		<?php echo $form->dropDownList($model, 'experience', $this->getExperienceList(), array('class'=>'form-control','empty' => 'Select Experience'));?>
		<?php echo $form->error($model,'experience'); ?>
	</div>

	<div class="form-group">
        <?php //echo $form->labelEx($model,'state'); ?>
        <?php $list = CHtml::listData(States::model()->findAll(array('order' => 'state')), 'id', 'state');?>
        <?php 
            echo $form->dropDownList($model, 'state', $list, array(
                'class'=>'form-control',
                'empty' => 'Select State',
                'style'=>'text-transform: capitalize',
                'ajax' => array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('districts', array('form'=>'User')),
                    'update'=>'#User_district',
                )
            ));
        ?>
        <?php echo $form->error($model,'state'); ?>
    </div>

    <div class="form-group">
        <?php //echo $form->labelEx($model,'district'); ?>
        <?php echo $form->dropDownList($model, 'district', array(), array('class'=>'form-control','empty' => 'Select District','style'=>'text-transform: capitalize'));?>
        <?php echo $form->error($model,'district'); ?>
    </div>

    <div class="form-group">
        <?php //echo $form->labelEx($model,'city'); ?>
        <?php echo $form->textField($model,'city', array('class'=>'form-control', 'placeholder'=>'City', 'style'=>'text-transform: capitalize')); ?>
        <?php echo $form->error($model,'city'); ?>
    </div>
    <div class="form-group">
		<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-primary', 'style'=>'margin-top: 15px;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>