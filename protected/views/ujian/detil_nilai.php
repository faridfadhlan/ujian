<div class="row">
    <div class="col-md-12 col-lg-12 dash-left">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">DETAIL NILAI PESERTA</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-primary table-striped nomargin">
                  <thead>
                    <tr>
                        <th class="text-center">No</th>
                      <th class="text-center">Pertanyaan</th>
                      <th class="text-center">Jawaban Benar</th>
                      <th class="text-center">Jawaban Peserta</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 0;?>
                    <?php foreach($model as $data):?>
                      <?php $no++;?>
                      <tr style="background:<?php echo $data['flag_answer']==$data['answer']?"#BCD9B4":"#FF8989"; ?>;">
                          <td class="text-center"><?php echo $no;?></td>
                          <td><?php echo $data['question'];?></td>
                          <td class="text-center"><?php echo $data['jawaban_benar']; ?></td>
                          <td class="text-center"><?php echo $data['jawaban_peserta'];?></td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>
            </div>
          </div><!-- panel -->
    </div>
</div>
