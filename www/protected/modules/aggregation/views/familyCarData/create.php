<?php
$this->breadcrumbs=array(
	'Family Car Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FamilyCarData', 'url'=>array('index')),
	array('label'=>'Manage FamilyCarData', 'url'=>array('admin')),
);
?>

<h1>Create FamilyCarData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>