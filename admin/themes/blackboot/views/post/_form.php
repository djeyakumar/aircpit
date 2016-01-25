<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'post-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'enableAjaxValidation'=>false,
	        'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'title'),
	        'htmlOptions'=>array(
	            'class'=>'form-horizontal',
	            'enctype' => 'multipart/form-data',
	        )
		)); 
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'employer_id', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php $list = CHtml::listData(Employer::model()->findAll(array('order' => 'username')), 'id', 'username');?>
            <?php echo $form->dropDownList($model, 'employer_id', $list, array('class'=>'form-control','empty' => 'Select Employer','style'=>'text-transform: capitalize'));?>
            <?php echo $form->error($model,'employer_id'); ?>
        </div>
    </div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'title', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'title', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'description', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php
                $this->widget(
                    'booster.widgets.TbCKEditor',
                    array(
                        'model'=>$model,
                        'attribute'=>'description',
                        'editorOptions' => array(
                            'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
                        )
                    )
                );
            ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'email', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'mobile', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'mobile', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'mobile'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'telephone', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'telephone', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'telephone'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'country', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php $list = CHtml::listData(Countries::model()->findAll(array('order' => 'country')), 'id', 'country');?>
            <?php echo $form->dropDownList($model, 'country', $list, array('class'=>'form-control','empty' => 'Select Country','style'=>'text-transform: capitalize'));?>
            <?php echo $form->error($model,'country'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'state', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php $list = CHtml::listData(States::model()->findAll(array('order' => 'state')), 'id', 'state');?>
            <?php 
                echo $form->dropDownList($model, 'state', $list, array(
                    'class'=>'form-control',
                    'empty' => 'Select State',
                    'style'=>'text-transform: capitalize',
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>$this->createUrl('districts', array('form'=>'Post')),
                        'update'=>'#Post_district',
                    )
                ));
            ?>
            <?php echo $form->error($model,'state'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'district', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'district', array(), array('class'=>'form-control','empty' => 'Select District','style'=>'text-transform: capitalize'));?>
            <?php echo $form->error($model,'district'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'city', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'city', array('class'=>'form-control','style'=>'text-transform: capitalize')); ?>
            <?php echo $form->error($model,'city'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'experience', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'experience', $this->getExperienceList(), array('class'=>'form-control','empty' => 'Select Experience'));?>
            <?php echo $form->error($model,'experience'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'industry', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php $list = CHtml::listData(Industries::model()->findAll(array('order' => 'industry')), 'id', 'industry');?>
            <?php echo $form->dropDownList($model, 'industry', $list, array(
                'class'=>'form-control', 
                'empty' => 'Select Category',
                'style'=>'text-transform: capitalize',
                'ajax' => array(
                    'type'=>'POST',
                    'url'=>CController::createUrl('functionalAreas', array('form'=>'Post')),
                    'update'=>'#Post_functional_area',
                )
            ));?>
            <?php echo $form->error($model,'industry'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'functional_area', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'functional_area', array(), array('class'=>'form-control','empty' => 'Select Sub-Category','style'=>'text-transform: capitalize'));?>
            <?php echo $form->error($model,'functional_area'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'address1', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textArea($model,'address1', array('rows'=>6, 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'address1'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'address2', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textArea($model,'address2', array('rows'=>6, 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'address2'); ?>
        </div>
    </div>

	<div class="form-group">
        <?php echo $form->labelEx($model,'file1', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo CHtml::activeFileField($model, 'file1', array('class'=>'col-sm-8')); ?>
            <?php echo $form->error($model,'file1'); ?>
        </div>
    </div>

	<div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-6">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->