<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Attendance</b> - <?php echo date('M d Y', strtotime($date))?></h3>
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
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Total Hours</th>
                  <th>OT Pay</th>
                  <th>Subtotal</th>
                  <th></th>
                </tr>
                <?php if(count($attendance)):?>
                  <?php foreach($attendance as $a):?>
                    <?php echo form_open('admin/attendance/pay');?>
                    <tr>
                      <td><?php echo $this->M_User->generate_id($a->employee_id);?></td>
                      <td><?php echo date('h:i A', strtotime($a->time_in));?></td>
                      <td><?php echo date('h:i A', strtotime($a->time_out));?></td>
                      <td><?php echo $a->total_hours;?></td>
                      <td><?php echo $a->overtime_pay;?></td>
                      <td><?php echo $a->subtotal;?></td>
                      <td>
                        <?php 
                          $dateNow = date('Y-m-d');
                          if($date == $dateNow):
                        ?>
                        <!-- check if completed -->
                        <?php 
                          $where = "employee_id = $a->employee_id AND date = '$date'";
                          $this->db->where($where);
                          $result = $this->db->get('salary')->row();
                        ?>
                        <?php if($result):?>
                          <small class="label bg-green">computed</small>
                        <?php else: ?>
                          <button type="submit" class="btn btn-xs btn-primary" onclick="return confirm('Compute Salary?')">Compute Salary</button>
                        <?php endif;?>
                        <input type="hidden" name="date" value="<?php echo $date;?>">
                        <input type="hidden" name="employee_id" value="<?php echo $a->employee_id;?>">
                        <?php endif;?>
                      </td>
                    </tr>
                    </form>
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