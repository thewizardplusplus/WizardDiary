<?php
	/* @var $this ImportController */
	/* @var $model Import */
	/* @var $form CActiveForm */

	Yii::app()->getClientScript()->registerScriptFile(
		Yii::app()->request->baseUrl . '/scripts/ace/ace.js',
		CClientScript::POS_HEAD
	);
	Yii::app()->getClientScript()->registerScriptFile(
		CHtml::asset('scripts/import-editor.js'),
		CClientScript::POS_HEAD
	);

	$this->pageTitle =
		Yii::app()->name
		. ' - Изменить импорт за '
		. $model->getFormattedDate();
?>

<header class = "page-header clearfix header-with-button">
	<a
		class = "btn btn-default pull-right"
		href = "<?=
			$this->createUrl(
				'import/view',
				array('id' => $model->id)
			)
		?>">
		<span class = "glyphicon glyphicon-remove"></span>
		Закрыть
	</a>
	<button
		class = "btn btn-danger pull-right save-and-import-button"
		<?= $model->imported ? 'disabled = "disabled"' : '' ?>>
		<span class = "glyphicon glyphicon-share-alt"></span>
		Сохранить и импортировать
	</button>
	<button class = "btn btn-primary pull-right save-button">
		<span
			class = "glyphicon glyphicon-<?=
				$model->isNewRecord
					? 'plus'
					: 'floppy-disk'
			?>">
		</span>
		Сохранить
	</button>

	<h4>
		Изменить импорт за <time><?= $model->getFormattedDate() ?></time>
		<span
			class = "label label-<?=
				$model->imported
					? 'success'
					: 'danger'
			?>">
			<?= $model->imported ? 'Импортированно' : 'Не импортированно' ?>
		</span>
	</h4>
</header>

<?php
	$form = $this->beginWidget(
		'CActiveForm',
		array(
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'errorMessageCssClass' => 'alert alert-danger',
			'htmlOptions' => array('class' => 'import-form')
		)
	);
?>
	<?= $form->errorSummary(
		$model,
		NULL,
		NULL,
		array('class' => 'alert alert-danger')
	) ?>

	<div class = "form-group">
		<?= $form->labelEx($model, 'points_description') ?>
		<div id = "import-editor"><?=
			CHtml::encode($model->points_description)
		?></div>
		<?= CHtml::hiddenField('Import[points_description]') ?>
		<?= $form->error($model, 'points_description') ?>
	</div>

	<?= CHtml::hiddenField('Import[import]') ?>
<?php $this->endWidget(); ?>