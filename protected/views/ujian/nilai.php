<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">DAFTAR NILAI PESERTA</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center" rowspan="2">Kode</th>
                        <th class="text-center" rowspan="2">Nama</th>
                        <th class="text-center" rowspan="2">Username</th>
                        <th class="text-center" colspan="2">Jumlah Benar</th>
                    </tr>
                    <tr>
                        <th class="text-center">Tertulis</th>
                        <th class="text-center">Entri</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $v1 = Yii::app()->db->createCommand()->setText("SELECT COUNT(id) FROM questions WHERE versi='1'")->queryScalar();?>
                      <?php $v2 = Yii::app()->db->createCommand()->setText("SELECT COUNT(id) FROM questions WHERE versi='2'")->queryScalar();?>
                    <?php foreach($model as $data):?>
                      <tr>
                          <td class="text-center"><?php echo CHtml::encode($data['kode']);?></td>
                          <td><?php echo CHtml::link($data['nama'], array("user/view", "id"=>$data['id']));?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td class="text-center"><?php echo CHtml::link($data['jum_betul'], array("ujian/detil_nilai", "id"=>$data['id']));?></td>
                          <td class="text-center"><?php echo CHtml::link($data['jum_entribetul'], array("ujian/detil_entri", "id"=>$data['id']));?></td>
                          <!--<td class="text-center"><?php echo round(($data['jum_betul']/$v1*100), 2);?></td>-->
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
