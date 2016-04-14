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
                        <th class="text-center">Kode</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Versi Soal</th>
                      <th class="text-center">Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $v1 = Yii::app()->db->createCommand()->setText("SELECT COUNT(id) FROM questions WHERE versi='1'")->queryScalar();?>
                      <?php $v2 = Yii::app()->db->createCommand()->setText("SELECT COUNT(id) FROM questions WHERE versi='2'")->queryScalar();?>
                    <?php foreach($model as $data):?>
                      <tr>
                          <td class="text-center"><?php echo CHtml::encode($data['kode']);?></td>
                          <td><?php echo CHtml::encode($data['nama']);?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td class="text-center"><?php echo $data['versi'];?></td>
                          <td class="text-center"><?php echo $data['versi']=='1'?  round(($data['jum_betul']/$v1*100), 2):round(($data['jum_betul']/$v2*100), 2);?></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
