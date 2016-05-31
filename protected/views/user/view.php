<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'kode',
		'nama',
		'username',
		'level_id',
                'alamat',
                'jk',
                'umur',
                'nohp',
                'ttl',
                'pendidikan',
                'jurusan',
                'status_kawin',
                'pekerjaan',
                'pengalaman',
                'shift',
                'rekomendasi'
	),
)); ?>
