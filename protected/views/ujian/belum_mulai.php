<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary" style="margin-bottom:0;">
            <div class="panel-heading">
              <h3 class="panel-title">UJIAN BISA DIMULAI SETELAH ADA ABA-ABA DARI PANITIA</h3>
            </div>
            <div class="panel-body" style="margin-bottom:0;">
                <p style="text-align: center;"><img src="<?php echo Yii::app()->baseUrl;?>/public/images/menunggu.png" align="middle" /></p>
              <?php if(Yii::app()->user->level_id=='2'):?>
              <p style="text-align: center;"><?php echo CHtml::link("Mulai Ujian", array("ujian/mulai"), array("class"=>"btn btn-primary"));?></p>
              <?php endif;?>
              
              
            </div>
          </div><!-- panel -->
    </div>
</div>