<?php
$this->breadcrumbs=array(
	'Sport Car Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportCarData', 'url'=>array('index')),
	array('label'=>'Manage SportCarData', 'url'=>array('admin')),
);
?>

<h1>Create SportCarData</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>