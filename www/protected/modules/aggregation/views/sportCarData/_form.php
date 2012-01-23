<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-car-data-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'power'); ?>
		<?php echo $form->textField($model,'power'); ?>
		<?php echo $form->error($model,'power'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->