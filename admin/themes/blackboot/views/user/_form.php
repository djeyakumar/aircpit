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
            'enctype' => 'multipart/form-data',
        )
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'photo', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo CHtml::activeFileField($model, 'photo', array('class'=>'col-sm-8')); ?>
            <?php if($model->photo) : ?>
                <img src="<?='uploads/user/'.$model->photo?>?<?=rand(1,32000)?>" class="img-responsive img-thumbnail" style="width:125px;height:auto;" />
            <?php endif; ?>
            <?php echo $form->error($model,'photo'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'firstname', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'firstname', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'firstname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'lastname', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'lastname', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'lastname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'sex', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'sex', array('M'=>'Male','F'=>'Female'), array('class'=>'form-control','empty' => 'Select a Gender'));?>
            <?php echo $form->error($model,'sex'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'age', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php echo $form->dropDownList($model, 'age', $this->getAgeList(), array('class'=>'form-control','empty' => 'Select Age'));?>
            <?php echo $form->error($model,'age'); ?>
        </div>
    </div>
    <?php if($model->isNewRecord) : ?>
        <div class="form-group">
            <?php echo $form->labelEx($model,'username', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $form->textField($model,'username', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'username'); ?>
            </div>
        </div>
    
        <div class="form-group">
            <?php echo $form->labelEx($model,'password', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'repeat_password', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $form->passwordField($model,'repeat_password', array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'repeat_password'); ?>
            </div>
        </div>
    <?php endif; ?>

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
                        'url'=>CController::createUrl('districts', array('form'=>'User')),
                        'update'=>'#User_district',
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
                    'url'=>CController::createUrl('functionalAreas', array('form'=>'User')),
                    'update'=>'#User_functional_area',
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
        <?php echo $form->labelEx($model,'biodata', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
        <div class="col-sm-6">
            <?php
                $this->widget(
                    'booster.widgets.TbCKEditor',
                    array(
                        'model'=>$model,
                        'attribute'=>'biodata',
                        'editorOptions' => array(
                            'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
                        )
                    )
                );
            ?>
            <?php echo $form->error($model,'biodata'); ?>
        </div>
    </div>

    <?php if(!$model->isNewRecord) : ?>
        <div class="form-group">
            <?php echo $form->labelEx($model,'showOnSearch', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $form->dropDownList($model, 'showOnSearch', array('Y'=>'Yes', 'N'=>'No'), array('class'=>'form-control','empty' => 'Select Status','style'=>'text-transform: capitalize'));?>
                <?php echo $form->error($model,'showOnSearch'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model,'status', array('class'=>'col-sm-offset-2 col-sm-2')); ?>
            <div class="col-sm-6">
                <?php echo $form->dropDownList($model, 'status', array('A'=>'Active', 'I'=>'InActive', 'D'=>'Delete'), array('class'=>'form-control','empty' => 'Select Status','style'=>'text-transform: capitalize'));?>
                <?php echo $form->error($model,'status'); ?>
            </div>
        </div>
    <?php endif;?>

    <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-6">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Update'); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php if(!$model->isNewRecord) : ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                type: 'POST',
                data: {'User[state]': $('#User_state').val()},
                url: "<?php echo CController::createUrl('districts', array('form'=>'User')) ?>",
                success: function(data){
                    $('#User_district').html(data);
                    $('#User_district').val("<?=$model->district;?>");
                }
            });

            $.ajax({
                type: 'POST',
                data: {'User[industry]': $('#User_industry').val()},
                url: "<?php echo CController::createUrl('functionalAreas', array('form'=>'User')) ?>",
                success: function(data){
                    $('#User_functional_area').html(data);
                    $('#User_functional_area').val("<?=$model->functional_area;?>");
                }
            });
        });
    </script>
<?php endif; ?>