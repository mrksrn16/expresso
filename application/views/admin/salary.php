<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <h3 class="box-title"><?php echo date('M d Y', strtotime($date))?></h3> -->
              <div class="pull-right col-md-8">
                <?php echo form_open();?>
                  <div class="col-md-5" style="padding: 0;">
                    <input type="date" name="start_date" class="form-control" value="<?php echo $start_date;?>">
                  </div>
                  <div class="col-md-5" style="padding: 0;">
                    <input type="date" name="end_date" class="form-control" value="<?php echo $end_date;?>">
                  </div>
                  <div class="col-md-2" style="padding: 0;">
                    <button type="submit" name="submit" class="btn btn-primary">Filter</button>
                  </div>
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
                  <th></th>
                  <th>Status</th>
                </tr>
                <?php if(count($salaries)):?>
                  <?php foreach($salaries as $salary):?>
                    <tr>
                      <td><?php echo $this->M_User->generate_id($salary->employee_id);?></td>
                      <td><?php echo $salary->total_salary;?></td>
                      <td>
                       <?php echo form_open('admin/salary/additional');?>
                          <div class="input-group input-group-sm">
                           <input type="number" name="additional" value="<?php echo $salary->additional;?>" class="form-control">
                           <input type="hidden" name="salary_id" value="<?php echo $salary->id?>">
                              <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Add</button>
                              </span>
                        </div>

                       </form>
                       </td>
                      <td><?php echo $salary->deductions;?></td>
                      <td><?php echo $salary->total_compensation;?></td>
                      <td>
                        <?php echo date('M d', strtotime($salary->range_start_date)) . ' - ' . date('M d Y', strtotime($salary->range_end_date));?>
                      </td>
                      <td>
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
                      </td>
                    </tr>
                  <?php endforeach;?>
                <tr>
                <?php else:?>
                <tr>
                  <td colspan="7">No items found.</td>
                </tr>
                <?php endif;?>
              </table>
            </div>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->