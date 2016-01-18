<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">
<h2>Registration</h2>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-registration-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation'=>false,
        'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'firstname'),
        'htmlOptions'=>array(
            'class'=>'form-horizontal',
        )
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'firstname', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'firstname', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'firstname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'lastname', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'lastname', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'lastname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'username', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'mobile', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'mobile', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'mobile'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'telephone', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'telephone', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'telephone'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'current_location', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'current_location', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'current_location'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'experience', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'experience', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'experience'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'skills', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'skills', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'skills'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'address1', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textArea($model,'address1', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'address1'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'address2', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textArea($model,'address2', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'address2'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'biodata', array('class'=>'col-sm-4 text-right')); ?>
        <div class="col-sm-6">
            <?php echo $form->textArea($model,'biodata', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'biodata'); ?>
        </div>
    </div>


    <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-6">
            <?php echo CHtml::submitButton('Register'); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->