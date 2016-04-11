<div class="row">
    
    
<div class="col-md-12 col-lg-12 dash-left">
    <div id="wizard-basic">
            <?php 
            $no = 0;
            $hal = 0;
            ?>
            <?php foreach($model as $data):?>
            <?php $no++;?>
            <?php if($no%2==1):?>
            <?php $hal++;?>
            <h3>Hal. <?php echo $hal;?></h3>
            <div>
                <table class="soal">
            <?php endif;
            
            ?>
                    <tr>
                        <td class="depan"><?php echo $no;?>.</td>
                        <td><?php echo $data->question;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table class="soal">
                                
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo ($no-1);?>]" /></td>
                                    <td class="jawaban"> a.</td>
                                    <td><?php echo $data->option_a;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo ($no-1);?>]" /></td>
                                    <td class="jawaban"> b.</td>
                                    <td><?php echo $data->option_b;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo ($no-1);?>]" /></td>
                                    <td class="jawaban"> c.</td>
                                    <td><?php echo $data->option_c;?></td>
                                </tr>
                                <tr>
                                    <td class="jawaban"><input type="radio" name="q[<?php echo ($no-1);?>]" /></td>
                                    <td class="jawaban"> d.</td>
                                    <td><?php echo $data->option_d;?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                <?php if($no%2==0 || $no==count($model)):?>
                </table>
            </div>
            <?php endif;endforeach;?>
          </div>
        

</div>
  </div><!-- row -->

</div><!-- col-md-3 -->
</div><!-- row -->