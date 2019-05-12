<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Transactions</b> - <?php echo date('M d Y', strtotime($date))?></h3>
              <div class="pull-right col-md-3">
                <?php echo form_open();?>
                  <input type="date" name="filter_date" class="form-control" value="<?php echo $date;?>" onchange="this.form.submit();">
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Employee ID</th>
                  <th>Subtotal</th>
                  <th>Additional</th>
                  <th>Deductions</th>
                  <th>Total</th>
                  <th>Date</th>
                  <!-- <th>Status</th> -->
                </tr>
                <?php if(count($salaries)):?>
                  <?php foreach($salaries as $salary):?>
                    <tr>
                      <td><?php echo $this->M_User->generate_id($salary->employee_id);?></td>
                      <td><?php echo $salary->total_salary;?></td>
                      <td><?php echo $salary->additional;?></td>
                      <td><?php echo $salary->deductions;?></td>
                      <td><?php echo $salary->total_compensation;?></td>
                      <td>
                        <?php echo date('M d Y', strtotime($salary->date));?>
                      </td>
                      <!-- <td>
                        <?php if($salary->status == 'pending'):?>
                          <a href="<?php echo base_url();?>admin/salary/pay/<?php echo $salary->id;?>" onclick="return confirm('Pay employee?');">
                            <button class="btn btn-primary btn-xs">Pay</button>
                          </a>
                        <?php else:?>
                          <small class="label bg-green">Paid</small>
                          <a href="<?php echo base_url();?>admin/salary/undo/<?php echo $salary->id;?>" onclick="return confirm('Undo transaction?');">
                            <button class="btn btn-default btn-xs">Undo</button>
                          </a>
                        <?php endif;?>
                      </td> -->
                    </tr>
                  <?php endforeach;?>
                <tr>
                <?php else:?>
                <tr>
                  <td colspan="7">No items found.</td>
                </tr>
                <?php endif;?>
              </table>
             <!--  <?php 
                $dateNow = date('Y-m-d');
                if($date == $dateNow):
              ?>
              <div class="col-md-12" style="overflow: auto;display: block;margin-top: 10px;padding: 0" >
                <a href="<?php echo base_url();?>admin/attendance/complete_transaction" onclick="return confirm('Pay employees salary?');">
                  <button class="btn btn-success btn-xs pull-right">Complete Transaction</button>
                </a>
              </div>
              <?php endif;?> -->
            </div>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->