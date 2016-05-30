<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">DETAIL ENTRI PESERTA</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">B4K2</th>
                      <th class="text-center">Jawaban</th>
                      <th class="text-center">B4K3</th>
                      <th class="text-center">Jawaban</th>
                      <th class="text-center">B4K5</th>
                      <th class="text-center">Jawaban</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 0;?>
                    <?php foreach($model as $data):?>
                      <?php $no++;?>
                      <tr>
                          <td class="text-center"><?php echo $no;?></td>
                          <td style="background:<?php echo ($data['s_b4k2']==$data['b4k2'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['s_b4k2'];?></td>
                          <td style="background:<?php echo ($data['s_b4k2']==$data['b4k2'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['b4k2'];?></td>
                          <td style="background:<?php echo ($data['s_b4k3']==$data['b4k3'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['s_b4k3'];?></td>
                          <td style="background:<?php echo ($data['s_b4k3']==$data['b4k3'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['b4k3'];?></td>
                          <td style="background:<?php echo ($data['s_b4k5']==$data['b4k5'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['s_b4k5'];?></td>
                          <td style="background:<?php echo ($data['s_b4k5']==$data['b4k5'])?"#BCD9B4":"#FF8989";?>"><?php echo $data['b4k5'];?></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
