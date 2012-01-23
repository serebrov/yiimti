<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->car_id), array('view', 'id'=>$data->car_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('power')); ?>:</b>
	<?php echo CHtml::encode($data->power); ?>
	<br />


</div>