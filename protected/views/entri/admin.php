<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
              <ul class="panel-options">
              <li>
                  <?php echo CHtml::link('<i class="glyphicon glyphicon-plus"></i>', array("entri/create"));?>
             </li>
            </ul>
            <div class="panel-heading">
              <h3 class="panel-title">Daftar Teks Simulasi Entri</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">B4K2</th>
                        <th class="text-center">B4K3</th>
                        <th class="text-center">B4K5</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php if(count($dataProvider)>0):?>
                        <?php foreach($dataProvider as $data):?>
                        <tr>
                            <td class="text-center" width="10%"><?php echo CHtml::encode($data->id);?></td>
                            <td><?php echo $data->b4k2;?></td>
                            <td><?php echo $data->b4k3;?></td>
                            <td><?php echo $data->b4k5;?></td>
                        </tr>
                      <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td colspan="2"><?php echo "Data tidak ada";?></td>
                        </tr>
                      <?php endif;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
