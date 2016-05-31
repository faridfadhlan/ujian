<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Tambah Pertanyaan</h3>
            </div>
              <div class="panel-body m">
                  <div>
                      <input type="text" class="tes" />
                  </div>
                  
                  <div><input type="text" class="tes" /></div>
                  
              </div>
          </div>
    </div>
</div>

<?php
$cs=Yii::app()->getClientScript();

$cs->registerScript("ready", '   
    $("input").keypress(function(e) {
        if (e.which == 13) {
            $(this).nextAll("input").focus();
        }
    });
');
?>