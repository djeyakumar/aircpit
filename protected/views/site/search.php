<?php
/* @var $this SiteController */
/* @var $model SearchForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Search Job';
$this->breadcrumbs=array(
	'Search Job',
);
?>

<h1>Search Job</h1>

<?php if(Yii::app()->user->hasFlash('search')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('search'); ?>
</div>

<?php else: ?>

<div class="form">
	
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'search-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'focus'=>($model->hasErrors()) ? '.error:first' : array($model, 'firstname'),
	        'htmlOptions'=>array(
	            'class'=>'form-inline',
	            'enctype' => 'multipart/form-data',
	            'style' => 'text-align: center'
	        )
		)); 
	?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'keySkills'); ?>
		<?php echo $form->textField($model,'keySkills', array('class'=>'form-control', 'placeholder'=>'keyskills')); ?>
		<?php echo $form->error($model,'keySkills'); ?>
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
                    'url'=>CController::createUrl('districts', array('form'=>'SearchForm')),
                    'update'=>'#SearchForm_district',
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
	<?php echo CHtml::submitButton('Search'); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

<?php if(isset($posts)) : ?>
<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
	<div class="sports-top">
		<div class="s-grid-left">
			<div class="cricket">
				<header>
					<h3 class="title-head"><?=count($posts)?> Jobs found !</h3>
				</header>
				<?php foreach ($posts as $post) : ?>
					<div class="c-sports-main">
						<div class="c-text">
							<h4>
								<?php $img = ($post->employer) ? ($post->employer->logo ? $post->employer->logo : '') : '';?>
								<img src="<?='admin/uploads/employer/'.$img?>?<?=rand(1,32000)?>"  class="img-responsive img-thumbnail" style="width:50px;height:auto;"/>
								<?=$post->title?>
								(<?=$post->experience;?> yrs)
							</h4>
							<p>
								<a class="power" href><?=$post->description;?></a>
							</p>
							<p>
								<a class="date" href><?=($post->industry1) ? ($post->industry1->industry ? $post->industry1->industry : '') : '';?></a>
								 - <a class="date" href><?=($post->functional_area1) ? ($post->functional_area1->functional_area ? $post->functional_area1->functional_area : '') : '';?></a>
							</p>
							<!-- <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a> -->
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="s-grid-right">
			<div class="cricket">
				<header>
					<h3 class="title-popular">&nbsp;</h3>
				</header>
				<?php foreach ($posts as $post) : ?>
					<div class="c-sports-main">
						<div class="c-text">
							<h4>&nbsp;</h4>
							<a class="power" href><?=$post->description;?></a>
							<a class="date" href><?=$post->experience;?> years experience</a>
							<a class="date" href><?=($post->state1) ? ($post->state1->state ? $post->state1->state : '') : '';?></a>
							<p class="date"><?=$post->createdDate;?></p>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
</div>
<?php endif; ?>