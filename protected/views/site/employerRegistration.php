<div class="col-md-12 content-left">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    /* @var $form CActiveForm */
    ?>

    <div class="form">
    <h2>Employer Registration</h2>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'employer-registration-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // See class documentation of CActiveForm for details on this,
            // you need to use the performAjaxValidation()-method described there.
            'enableAjaxValidation'=>false,
            'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'firstname'),
            'htmlOptions'=>array(
                'class'=>'form-horizontal',
                'enctype' => 'multipart/form-data',
            )
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php //echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model,'logo', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo CHtml::activeFileField($model, 'logo', array('class'=>'col-sm-8')); ?>
                <?php if($model->logo) : ?>
                    <img src="<?='admin/uploads/employer/'.$model->logo?>?<?=rand(1,32000)?>"  class="img-responsive img-thumbnail" style="width:125px;height:auto;" />
                <?php endif; ?>
                <?php echo $form->error($model,'logo'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'companyname', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'companyname', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'companyname'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'companydescription', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php //echo $form->textArea($model,'companydescription', array('rows'=>6, 'class'=>'form-control')); ?>
                <?php
                    $this->widget(
                        'booster.widgets.TbCKEditor',
                        array(
                            'model'=>$model,
                            'attribute'=>'companydescription',
                            'editorOptions' => array(
                                'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
                            )
                        )
                    );
                ?>
                <?php echo $form->error($model,'companydescription'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'username', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
        </div>

        <?php if($model->isNewRecord) : ?>
            <div class="form-group">
                <?php echo $form->labelEx($model,'password', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
                <div class="col-sm-4">
                    <?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'repeat_password', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
                <div class="col-sm-4">
                    <?php echo $form->passwordField($model,'repeat_password', array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'repeat_password'); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="form-group">
            <?php echo $form->labelEx($model,'email', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'mobile', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'mobile', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'mobile'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'telephone', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'telephone', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'telephone'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'country', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php $list = CHtml::listData(Countries::model()->findAll(array('order' => 'country')), 'id', 'country');?>
                <?php echo $form->dropDownList($model, 'country', $list, array('class'=>'form-control','empty' => 'Select Country','style'=>'text-transform: capitalize'));?>
                <?php echo $form->error($model,'country'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'state', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php $list = CHtml::listData(States::model()->findAll(array('order' => 'state')), 'id', 'state');?>
                <?php 
                    echo $form->dropDownList($model, 'state', $list, array(
                        'class'=>'form-control',
                        'empty' => 'Select State',
                        'style'=>'text-transform: capitalize',
                        'ajax' => array(
                            'type'=>'POST',
                            'url'=>CController::createUrl('districts', array('form'=>'Employer')),
                            'update'=>'#Employer_district',
                        )
                    ));
                ?>
                <?php echo $form->error($model,'state'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'district', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->dropDownList($model, 'district', array(), array('class'=>'form-control','empty' => 'Select District','style'=>'text-transform: capitalize'));?>
                <?php echo $form->error($model,'district'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'city', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textField($model,'city', array('class'=>'form-control','style'=>'text-transform: capitalize')); ?>
                <?php echo $form->error($model,'city'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'address1', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textArea($model,'address1', array('rows'=>6, 'class'=>'form-control')); ?>
                <?php echo $form->error($model,'address1'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'address2', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-4">
                <?php echo $form->textArea($model,'address2', array('rows'=>6, 'class'=>'form-control')); ?>
                <?php echo $form->error($model,'address2'); ?>
            </div>
        </div>

        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-4">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Update'); ?>
            </div>
        </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>