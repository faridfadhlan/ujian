<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
              <ul class="panel-options">
              <li>
                  <?php echo CHtml::link('<i class="glyphicon glyphicon-plus"></i>', array("question/create"));?>
             </li>
            </ul>
            <div class="panel-heading">
              <h3 class="panel-title">Manage Questions</h3>
            </div>
            <div class="panel-body" style="min-height: 400px;">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-line">
                <li class="active"><a href="#popular11" data-toggle="tab"><strong>Soal Versi 1</strong></a></li>
                <li><a href="#recent11" data-toggle="tab"><strong>Soal Versi 2</strong></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="popular11">
                  <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">No</th>
                      <th class="text-center">Pertanyaan</th>
                      <th class="text-center">Option 1</th>
                      <th class="text-center">Option 2</th>
                      <th class="text-center">Option 3</th>
                      <th class="text-center">Option 4</th>
                      <th class="text-center">Option 5</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    <?php foreach($models as $data):?>
                      <tr>
                          <td class="text-center"><?php echo $no++;?></td>
                          <td><?php echo CHtml::encode($data->question);?></td>
                          <td<?php echo $data->flag_answer=='a'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_a);?></td>
                          <td<?php echo $data->flag_answer=='b'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_b);?></td>
                          <td<?php echo $data->flag_answer=='c'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_c);?></td>
                          <td<?php echo $data->flag_answer=='d'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_d);?></td>
                          <td<?php echo $data->flag_answer=='e'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_e);?></td>
                          <td class="text-center"><?php echo CHtml::link("", array("question/update", "id"=>$data->id), array("class"=>"fa fa-edit"));?>&nbsp;<a class="fa fa-trash-o" href="#"></a></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
                </div>
                <div class="tab-pane" id="recent11">
                  <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">No</th>
                      <th class="text-center">Pertanyaan</th>
                      <th class="text-center">Option 1</th>
                      <th class="text-center">Option 2</th>
                      <th class="text-center">Option 3</th>
                      <th class="text-center">Option 4</th>
                      <th class="text-center">Option 5</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    <?php foreach($models2 as $data):?>
                      <tr>
                          <td class="text-center"><?php echo $no++;?></td>
                          <td><?php echo CHtml::encode($data->question);?></td>
                          <td<?php echo $data->flag_answer=='a'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_a);?></td>
                          <td<?php echo $data->flag_answer=='b'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_b);?></td>
                          <td<?php echo $data->flag_answer=='c'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_c);?></td>
                          <td<?php echo $data->flag_answer=='d'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_d);?></td>
                          <td<?php echo $data->flag_answer=='e'?' style="background-color:#ABEDA5"':''; ?>><?php echo CHtml::encode($data->option_e);?></td>
                          <td class="text-center"><?php echo CHtml::link("", array("question/update", "id"=>$data->id), array("class"=>"fa fa-edit"));?>&nbsp;<a class="fa fa-trash-o" href="#"></a></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
                </div>
              </div>

            
            
              
            <!--<div style="float:right;">-->
            <?php /*$this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'htmlOptions'=>array("class"=>"pagination"),
                    'header'=>''
                ))*/ ?>
            <!--</div><div class="clearfix"></div>-->
            </div>
          </div><!-- panel -->
    </div>
</div>
