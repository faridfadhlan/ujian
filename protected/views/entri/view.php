<?php
/* @var $this EntriController */
/* @var $model Entri */

$this->breadcrumbs=array(
	'Entris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Entri', 'url'=>array('index')),
	array('label'=>'Create Entri', 'url'=>array('create')),
	array('label'=>'Update Entri', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Entri', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entri', 'url'=>array('admin')),
);
?>

<h1>View Entri #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'teks',
	),
)); ?>
