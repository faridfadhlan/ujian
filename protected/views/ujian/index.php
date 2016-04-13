<div class="row">
    
    
<div class="col-md-12 col-lg-12 dash-left"><form id="form_soal">
    <div id="wizard-basic">
            <?php 
            $no = 0;
            $hal = 0;
            shuffle($model);
            ?>
            <?php foreach($model as $data):?>
            <?php $no++;?>
            <?php if($no%5==1):?>
            <?php $hal++;?>
            <h3>Hal. <?php echo $hal;?></h3>
            <div>
                <table class="soal">
            <?php endif;
            
            ?>
                    <tr>
                        <td class="depan"><?php echo $no;?>.</td>
                        <td><?php echo $data->question->question;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table class="soal">
                                
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo $data->id;?>]" value="a" <?php echo $data->answer=='a'?'checked':'';?> /></td>
                                    <td class="jawaban"> a.</td>
                                    <td><?php echo $data->question->option_a;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo $data->id;?>]" value="b" <?php echo $data->answer=='b'?'checked':'';?> /></td>
                                    <td class="jawaban"> b.</td>
                                    <td><?php echo $data->question->option_b;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo $data->id;?>]" value="c" <?php echo $data->answer=='c'?'checked':'';?> /></td>
                                    <td class="jawaban"> c.</td>
                                    <td><?php echo $data->question->option_c;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo $data->id;?>]" value="d" <?php echo $data->answer=='d'?'checked':'';?> /></td>
                                    <td class="jawaban"> d.</td>
                                    <td><?php echo $data->question->option_d;?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                <?php if($no%5==0 || $no==count($model)):?>
                </table>
            </div>
            <?php endif;endforeach;?>
          </div>
        
    </form>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align: center;">Saving</h3>
            </div>
          </div>
              <div style="padding:0 20px;">
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="sr-only">100% Complete (success)</span>
                </div>
              </div>
          </div>
              </div>
        </div>
      </div>
    
</div>
  </div><!-- row -->

<?php
$cs=Yii::app()->getClientScript();
$cs->registerCssFile(Yii::app()->request->baseUrl.'/public/lib/jquery.steps/jquery.steps.css');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/public//lib/jquery-toggles/toggles-full.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/lib/bootstrap/js/bootstrap.js',CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/lib/jquery-toggles/toggles.js',CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/public/lib/jquery.steps/jquery.steps.js',CClientScript::POS_END);
$cs->registerScript("ujian", "
$('#wizard-basic').steps({
    headerTag: 'h3',
    bodyTag: 'div',
    transitionEffect: 'slideLeft',
    autoFocus: true,
    showFinishButtonAlways: true,
    onFinishing: simpan, 
    labels: {
        finish: 'Save',
        next: 'Next',
        previous: 'Previous',
    }
  });
");
$cs->registerScript("fungsi", '
function simpan() {
    

    $.ajax({
        type: "POST",
        url: "'.Yii::app()->createUrl("ujian/simpan").'",
        data: $("#form_soal").serialize(),
        beforeSend: function() {
            $(".modal").modal("show"); 
        },
        success: function(data) {
            $(".modal").modal("hide"); 
        },
    });
}
', CClientScript::POS_END);
?>