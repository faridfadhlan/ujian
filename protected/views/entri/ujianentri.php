<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Ujian Entri</h3>
            </div>
            <div class="panel-body" oncopy="return false" oncut="return false" onpaste="return false">
                <div class="panel panel-danger panel-weather">
                    <div class="panel-heading">
                      <h4 class="panel-title" style="text-align: center;">WAKTU TERSISA</h4>
                    </div>
                    <div class="panel-body inverse" style="padding:5px;">
                      <div class="row mb10">
                          <h1 class="today-day" style="text-align: center;font-weight:bold;"></h1>
                      </div>
                        <p style="text-align: center;text-transform: uppercase;">PERHATIAN : Jika membuka halaman yang lain, timer terus berjalan.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form">
                    <form id="form_entri">
                    <?php foreach($soals as $soal):?>
                    <div class="form-group">
                        <?php echo CHtml::label($soal->entrinya->teks, NULL); ?>
                        <?php echo CHtml::textField('q['.$soal->id.']', $soal->entri, array('class'=>'form-control')); ?>                        
                    </div>
                    <?php endforeach;?>
                    <?php echo CHtml::htmlButton("Simpan", array("onClick"=>"confirm_simpan()", "class"=>"btn btn-primary"));?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript("entri", '
//setInterval(cekujian, 10000);
//setInterval(simpan, 300000);


function cekujian() {
    $.ajax({
        type: "POST",
        url: "'.Yii::app()->createUrl("ujian/cekentri").'",
        success: function(data) {
            if(data=="0"){
                simpan();
                location.reload();
            }
        },
    });
}

function confirm_simpan() {
    var answer = confirm ("Semakin cepat mengentri, poin Anda semakin besar. Jika sebelumnya pernah menyimpan, durasi pengerjaan akan diubah berdasarkan waktu sekarang. Setuju?");
    if (answer){
        simpan();
    }
    else{
      return false;
    }
}

function simpan() {
    $.ajax({
        type: "POST",
        url: "'.Yii::app()->createUrl("entri/simpan").'",
        data: $("#form_entri").serialize(),
        beforeSend: function() {
            $(".modal").modal("show"); 
        },
        success: function(data) {
            //alert(data);
            $(".modal").modal("hide"); 
        }
    });
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var tes = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            clearInterval(tes);
            location.reload();
        }
    }, 1000);
}

', CClientScript::POS_END);

$cs->registerScript("ready", '
    var durasi = 600-'.$durasi.', display = $(".today-day");
    startTimer(durasi, display);
');
?>