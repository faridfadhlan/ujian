<?php
/* @var $this EntriController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entris',
);

$this->menu=array(
	array('label'=>'Create Entri', 'url'=>array('create')),
	array('label'=>'Manage Entri', 'url'=>array('admin')),
);
?>

<h1>Entris</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
