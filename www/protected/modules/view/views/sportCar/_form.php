<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-car-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php if (!$model->isNewRecord): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <?php endif; ?>

    <?php if (!$model->isNewRecord): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'power'); ?>
		<?php echo $form->textField($model,'power'); ?>
		<?php echo $form->error($model,'power'); ?>
	</div>
    <?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
