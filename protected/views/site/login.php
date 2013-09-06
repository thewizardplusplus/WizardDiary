<?php
	/* @var $this SiteController */
	/* @var $model LoginForm */
	/* @var $form CActiveForm  */

	$this->pageTitle = Yii::app()->name;
?>

<div class = "form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'login-form',
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
	)); ?>

	<fieldset>
		<legend>Вход:</legend>

		<div class = "row">
			<?php echo $form->labelEx($model, 'password'); ?>
			<?php echo $form->passwordField($model, 'password'); ?>
			<?php echo $form->error($model, 'password'); ?>
		</div>

		<div class="row rememberMe">
			<?php echo $form->checkBox($model,'remember_me'); ?>
			<?php echo $form->label($model,'remember_me'); ?>
			<?php echo $form->error($model,'remember_me'); ?>
		</div>

		<div class="row buttons">
			<?php echo CHtml::submitButton('Вход'); ?>
		</div>
	</fieldset>

	<?php $this->endWidget(); ?>
</div>
