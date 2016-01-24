<div class="col-md-12 content-left">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    /* @var $form CActiveForm */
    ?>

    <div class="form">
        <h2>Login</h2>
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

        <!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

        <?php //echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model,'username', array('class'=>'col-sm-offset-2 col-sm-2 text-right')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'password', array('class'=>'col-sm-offset-2 col-sm-2 text-right')); ?>
            <div class="col-sm-4">
                <?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>
        </div>

        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <?php echo CHtml::submitButton('Login'); ?>
            </div>
        </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>