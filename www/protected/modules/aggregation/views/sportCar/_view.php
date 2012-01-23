<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'name'=>$data->name)); ?>
	<br />

    <b><?php echo CHtml::encode($data->data->getAttributeLabel('power')); ?>:</b>
    <?php echo CHtml::encode($data->data->power); ?>
	<br />


</div>
