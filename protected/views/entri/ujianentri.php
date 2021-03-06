<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Ujian Entri</h3>
            </div>
            <div class="panel-body" oncopy="return false" oncut="return false" onpaste="return false">
                <div class="panel panel-danger panel-weather">
                    <div class="panel-heading">
                      <h4 class="panel-title" style="text-align: center;">PERHATIAN</h4>
                    </div>
                    <div class="panel-body inverse" style="padding:5px;">
                        <p style="text-align: center;text-transform: uppercase;">PERHATIAN : Jika membuka halaman yang lain, timer terus berjalan. Simpan dulu sebelum membuka halaman lain.<br /><span style="color:yellow;">Tekan (Enter) untuk menyimpan. Tekan (TAB) untuk pindah isian.</span></p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form">
                    <form id="form_entri">
                        <?php $i = 1;$row = 1;?>
                    <?php foreach($soals as $soal):?>
                        
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label($soal->entrinya->b4k2, NULL); ?>
                            <?php echo CHtml::textField('q['.$soal->id.'][b4k2]', $soal->b4k2, array('class'=>'form-control entri',"tabindex"=>$i++, "spellcheck"=>"false", "disabled"=>"disabled", "roworder"=>$row)); ?>                        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label($soal->entrinya->b4k3, NULL); ?>
                            <?php echo CHtml::textField('q['.$soal->id.'][b4k3]', $soal->b4k3, array('class'=>'form-control entri',"tabindex"=>$i++, "spellcheck"=>"false", "disabled"=>"disabled", "roworder"=>$row)); ?>                        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo CHtml::label($soal->entrinya->b4k5, NULL); ?>
                            <?php echo CHtml::textField('q['.$soal->id.'][b4k5]', $soal->b4k5, array('class'=>'form-control entri',"tabindex"=>$i++, "spellcheck"=>"false", "disabled"=>"disabled", "roworder"=>$row)); ?>                        
                        </div>
                    </div>
                        <div class="clearfix"></div>
                        <hr>
                        <?php $row++;?>
                    <?php endforeach;?>
                    
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

<div id="fixed-timer">
    
    
    
    <div class="panel panel-danger panel-weather" style="margin-bottom:5px;">
                    <div class="panel-heading" style="padding-top:10px;padding-bottom: 10px;">
                      <h4 class="panel-title" style="text-align: center;">WAKTU TERSISA</h4>
                    </div>
                    <div class="panel-body inverse" style="padding:5px;">
                      <div class="row mb10">
                          <h1 class="today-day" style="text-align: center;font-weight:bold;"></h1>
                      </div>
                    </div>
                </div>
    <?php echo CHtml::htmlButton("Simpan", array("onClick"=>"confirm_simpan()", "class"=>"btn btn-primary btn-block", "tabindex"=>$i++));
                    ?>
</div>

<?php
$cs=Yii::app()->getClientScript();
$cs->registerScript("entri", '
//setInterval(cekujian, 10000);
setInterval(simpan_tanpa_animasi, 60000);


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
    simpan();
    //var answer = confirm ("Semakin cepat mengentri, poin Anda semakin besar. Jika sebelumnya pernah menyimpan, durasi pengerjaan akan diubah berdasarkan waktu sekarang. Setuju?");
    //if (answer){
    //    simpan();
    //}
    //else{
    //  return false;
    //}
}

function ceksimpan() {
    $.ajax({
        type: "POST",
        url: "'.Yii::app()->createUrl("entri/pernahsimpan").'",
        success: function(data) {
            if(data == "belum"){
                simpan();
            }
            else location.reload();
        }
    });
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
            location.reload();
        }
    });
}

function simpan_tanpa_animasi() {
    $.ajax({
        type: "POST",
        url: "'.Yii::app()->createUrl("entri/simpan").'",
        data: $("#form_entri").serialize(),
        success: function(data) {
            //location.reload();
        }
    });
}

function cek_complete(i) {
    if($("input[tabindex="+(i*3+1)+"]").val().length > 0 && $("input[tabindex="+(i*3+2)+"]").val().length > 0 && $("input[tabindex="+(i*3+3)+"]").val().length >0) return true;
    return false;
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
            ceksimpan();
        }
    }, 1000);
}

', CClientScript::POS_END);

$cs->registerScript("ready", '
    var durasi = '.$durasi.', display = $(".today-day");
    startTimer(durasi, display);
    var currentindex;
    $("input").keyup(function(e) {
        //alert($(this).val().length);
        if (e.which == 13) {
            //confirm_simpan();
            currentindex = parseInt($(this).attr("tabindex"));
            nextindex = currentindex+1;
            //alert(nextindex);
            $("*[tabindex="+nextindex+"]").focus();
        }
        
        current = parseInt($(this).attr("roworder"));
        if(cek_complete(current-1)) {
            $("input[roworder="+(current+1)+"]").removeAttr( "disabled" );
        }
        else {
            $("input[roworder="+(current+1)+"]").attr( "disabled", "disabled" );
        }
    });
    $("input[roworder=1]").removeAttr( "disabled" );
    for(i=0;i<100;i++){
        if(cek_complete(i)){
            $("input[roworder="+(i+2)+"]").removeAttr( "disabled" );
        }
    }
    
');
?>