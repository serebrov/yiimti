<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-car-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
        <?php echo $form->labelEx($model->data,'power'); ?>
        <?php echo $form->textField($model->data,'power'); ?>
        <?php echo $form->error($model->data,'power'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
