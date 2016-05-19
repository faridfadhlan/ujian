<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary" style="margin-bottom:0;">
            <div class="panel-heading">
              <h3 class="panel-title">Manage Ujian</h3>
            </div>
            <div class="panel-body">
                <div style="height:450px;">
                    <?php if(Yii::app()->user->level_id=='1'):?>
                    <p style="text-align: center;">
                        <?php if($ujian->status == 0):?>
                        <?php echo CHtml::link("<b>MULAI UJIAN</b>", array("ujian/status", "jenis"=>"1"), array("class"=>"btn btn-primary btn-quirk"));?>
                        <?php else:?>
                        <?php echo CHtml::link("<b>HENTIKAN UJIAN</b>", array("ujian/status", "jenis"=>"1"), array("class"=>"btn btn-primary btn-quirk"));?>
                        <?php endif;?>
                    </p>
                    <p style="text-align: center;">
                        <?php if($entri->status == 0):?>
                        <?php echo CHtml::link("<b>MULAI UJIAN ENTRI</b>", array("ujian/status", "jenis"=>"2"), array("class"=>"btn btn-primary btn-quirk"));?>
                        <?php else:?>
                        <?php echo CHtml::link("<b>HENTIKAN UJIAN ENTRI</b>", array("ujian/status", "jenis"=>"2"), array("class"=>"btn btn-primary btn-quirk"));?>
                        <?php endif;?>
                    </p>
                    <?php endif;?>
                </div>
            </div>
          </div><!-- panel -->
    </div>
</div>