<div class="col-md-12 content-left">
    <?php
    /* @var $this SiteController */
    /* @var $model ContactForm */
    /* @var $form CActiveForm */

    $this->pageTitle=Yii::app()->name . ' - Contact Us';
    $this->breadcrumbs=array(
    	'Contact',
    );
    ?>
    <div class="form">
    <h1>Contact Us</h1>

    <?php if(Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
    	<?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

    <?php else: ?>

    <p>
    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'contact-form',
    	'enableAjaxValidation'=>false,
        'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'name'),
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
            'enctype' => 'multipart/form-data',
        )
    )); ?>

    	<p class="note">Fields with <span class="required">*</span> are required.</p>

    	<?php echo $form->errorSummary($model); ?>

    	<div class="form-group">
            <?php echo $form->labelEx($model,'name', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'name', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'email', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'subject', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'subject', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'subject'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'body', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
                <?php echo $form->error($model,'body'); ?>
            </div>
        </div>

    	<div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
    			<?php echo CHtml::submitButton('Submit'); ?>
    		</div>
    	</div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->

    <?php endif; ?>
    </div>
</div>