<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
              <ul class="panel-options">
             <li>
                  <?php echo CHtml::link('<i class="fa fa-upload"></i>', array("user/import"));?>
             </li>
              <li>
                  <?php echo CHtml::link('<i class="glyphicon glyphicon-plus"></i>', array("user/create"));?>
             </li>
            </ul>
            <div class="panel-heading">
              <h3 class="panel-title">Manage Pengguna</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Level</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($model as $data):?>
                      <tr>
                          <td class="text-center"><?php echo CHtml::encode($data->kode);?></td>
                          <td><?php echo CHtml::encode($data->nama);?></td>
                          <td><?php echo $data->username; ?></td>
                          <td><?php echo $data->level->level;?></td>
                          <td class="text-center"><?php echo CHtml::link("", array("user/update", "id"=>$data->id), array("class"=>"fa fa-edit"));?>&nbsp;<a class="fa fa-trash-o" href="#"></a></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
