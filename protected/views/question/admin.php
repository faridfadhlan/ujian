<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Manage Questions</h3>
            </div>
            <div class="panel-body" style="min-height: 400px;">
              <br />
              <?php echo CHtml::link("Tambah Pertanyaan", array("question/create"), array("class"=>"btn btn-primary"));?>
            <br /><br />
              <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">No</th>
                      <th class="text-center">Pertanyaan</th>
                      <th class="text-center">Option 1</th>
                      <th class="text-center">Option 2</th>
                      <th class="text-center">Option 3</th>
                      <th class="text-center">Option 4</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;?>
                    <?php foreach($models as $data):?>
                      <tr>
                          <td class="text-center"><?php echo $no++;?></td>
                          <td><?php echo $data->question;?></td>
                          <td<?php echo $data->flag_answer=='a'?' style="background-color:#ABEDA5"':''; ?>><?php echo $data->option_a;?></td>
                          <td<?php echo $data->flag_answer=='b'?' style="background-color:#ABEDA5"':''; ?>><?php echo $data->option_b;?></td>
                          <td<?php echo $data->flag_answer=='c'?' style="background-color:#ABEDA5"':''; ?>><?php echo $data->option_c;?></td>
                          <td<?php echo $data->flag_answer=='d'?' style="background-color:#ABEDA5"':''; ?>><?php echo $data->option_d;?></td>
                          <td class="text-center"><a class="fa fa-edit" href="#"></a>&nbsp;<a class="fa fa-trash-o" href="#"></a></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            <div style="float:right;">
            <?php $this->widget('CLinkPager', array(
                    'pages' => $pages,
                    'htmlOptions'=>array("class"=>"pagination"),
                    'header'=>''
                )) ?>
            </div><div class="clearfix"></div>
            </div>
          </div><!-- panel -->
    </div>
</div>
