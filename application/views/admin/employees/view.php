<div class="row">
        <div class="col-md-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>uploads/images/employees/<?php echo $employee->picture;?>" alt="User profile picture">

              <h5 class="profile-username text-center"><?php echo $employee->name;?></h5>

              <p class="text-muted text-center"><?php echo $this->M_Positions->get_position_name($employee->position);?></p>
              <p class="text-muted text-center">
                <b>ID:</b> <?php echo $this->M_User->generate_id($employee->id);?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php if($active_tab == 'attendance'){ echo 'active';}?>"><a href="#attendance" data-toggle="tab">Attendance</a></li>
              <li class="<?php if($active_tab == 'salary'){ echo 'active';}?>"><a href="#salary" data-toggle="tab">Salary</a></li>
              <li class="<?php if($active_tab == 'info'){ echo 'active';}?>"><a href="#info" data-toggle="tab">Info</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="<?php if($active_tab == 'attendance'){ echo 'active';}?> tab-pane" id="attendance">
                <!-- Attendance -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?php echo date('M d Y', strtotime($selected_date));?></h3>
                    <div class="pull-right col-md-3">
                      <?php echo form_open();?>
                        <input type="date" name="filter_attendance" class="form-control" value="<?php echo $selected_date;?>" onchange="this.form.submit();">
                      </form>
                    </div>
                  </div>
                  <!-- /.box-header -->

                  <!-- get attendance -->
                  <?php 
                    $date = $selected_date;
                    $where = "employee_id = $employee->id AND date = '$selected_date'";
                    $this->db->where($where);
                    $attendance = $this->db->get('attendance')->row();
                  ?>
                  <div class="box-body">
                    <a href="<?php echo base_url();?>admin/employees/change_attendance/<?php echo $employee->id;?>/<?php echo $selected_date;?>" style="display: block;overflow: auto;">
                      <button class="btn btn-primary btn-xs pull-right">Edit</button>
                    </a>
                    <?php if(count($attendance)):?>
                    <table class="table table-bordered" style="margin-top: 10px;">
                      <tr>
                        <th>Time In</th>
                        <th>Break Out</th>
                        <th>Break In</th>
                        <th>Lunch Out</th>
                        <th>Lunch In</th>
                        <th>Break Out</th>
                        <th>Break In</th>
                        <th>Time Out</th>
                        <th>Total Hours</th>
                        <th>OT Pay</th>
                        <th>Pay</th>
                      </tr>
                      <tr>
                        <td><?php if($attendance->time_in){ echo date('h:i A', strtotime($attendance->time_in));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->morning_break_out){ echo date('h:i A', strtotime($attendance->morning_break_out));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->morning_break_in){ echo date('h:i A', strtotime($attendance->morning_break_in));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->lunch_out){ echo date('h:i A', strtotime($attendance->lunch_out));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->lunch_in){ echo date('h:i A', strtotime($attendance->lunch_in));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->afternoon_break_out){ echo date('h:i A', strtotime($attendance->afternoon_break_out));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->afternoon_break_in){ echo date('h:i A', strtotime($attendance->afternoon_break_in));}else{ echo '--:--'; }?></td>
              <td><?php if($attendance->time_out){ echo date('h:i A', strtotime($attendance->time_out));}else{ echo '--:--'; }?></td>
                        <td><?php if($attendance && $attendance->total_hours){ echo $attendance->total_hours;}else{ echo '--:--';}?></td>
                        <td>
                          <?php if($attendance && $attendance->overtime_pay){ echo $attendance->overtime_pay;}else{ echo '--:--';}?>
                        </td>
                        <td><?php if($attendance && $attendance->subtotal){ echo $attendance->subtotal;}else{ echo '--:--';}?></td>
                      </tr>
                      <tr>
                    </table>
                  <?php else:?>
                    No attendance found.
                  <?php endif;?>
                  </div>
                </div>
                <!-- Attendance -->
              </div>
              <!-- /.tab-pane -->
              <div class="<?php if($active_tab == 'salary'){ echo 'active';}?> tab-pane" id="salary">
                <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo date('M d  Y', strtotime($salary_date));?></h3>
              <div class="pull-right col-md-3">
                <?php echo form_open();?>
                  <input type="date" name="filter_salary" class="form-control" value="<?php echo $salary_date;?>" onchange="this.form.submit();">
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
                      <td><?php echo $salary->additional;?></td>
                      <td><?php echo $salary->deductions;?></td>
                      <td><?php echo $salary->total_compensation;?></td>
                      <td>
                        <?php echo date('M d', strtotime($salary->range_start_date)) . ' - ' . date('M d Y', strtotime($salary->range_end_date));?>
                      </td>
                      <td>
                        <?php if($salary->status == 'pending'):?>
                          <small class="label bg-orange">Pending</small>
                        <?php else:?>
                          <small class="label bg-green">Paid</small>
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
              <!-- get usr position salary details -->
              <?php 
                $this->db->where('id', $employee->id);
                $usr = $this->db->get('employees')->row();

                $this->db->where('id', $usr->position);
                $position = $this->db->get('position_salary')->row();
              ?>
              <?php if(count($salaries)):?>
              <div class="col-md-12" style="margin-top: 10px;">
                <div class="col-md-6">
                  <!-- get attendance -->
                  <?php
                    $start = $salary->range_start_date;
                    $end = $salary->range_end_date;

                    $where = "employee_id = $employee->id AND date >= '$start' AND date <= '$end'";
                    $this->db->where($where);
                    $attendance = $this->db->get('attendance')->result();
                  ?>
                  <?php if($attendance):?>
                  <table class="table table-bordered">
                    <tr>
                      <th>Date</th>
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>OT Pay</th>
                      <th>Pay</th>
                    </tr>
                    <?php foreach($attendance as $a):?>
                    <tr>
                      <td><?php echo date('M d', strtotime($a->date));?></td>
                      <td><?php echo date('h:i A', strtotime($a->time_in));?></td>
                      <td><?php echo date('h:i A', strtotime($a->time_out));?></td>
                      <td><?php echo $a->overtime_pay;?></td>
                      <td><?php echo $a->subtotal;?></td>
                    </tr>
                    <?php endforeach;?>
                  </table>
                  <?php endif;?>
                </div>
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <tr>
                      <td>SSS</td>
                      <td>
                        <?php echo $position->sss/2;?>
                      </td>
                    </tr>
                   <tr>
                    <td>PAGIBIG</td>
                    <td>
                      <?php echo $position->pagibig/2;?>
                    </td>
                  </tr>
                 <tr>
                  <td>PHILHEALTH</td>
                  <td>
                    <?php echo $position->philhealth/2;?>
                  </td>
                </tr>
                 <tr>
                  <td>TAX</td>
                  <td>
                    <?php echo $position->tax/2;?>
                  </td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>
                    <?php echo $position->contribution_per_cutoff;?>
                  </td>
                </tr>
                  </table>
                </div>
              </div>
              <?php endif;?>
            </div>
          </div>
              </div>
              <!-- /.tab-pane -->

              <div class="<?php if($active_tab == 'info'){ echo 'active';}?> tab-pane" id="info" style="overflow: auto;">
                <div class="col-md-12" style="padding: 0;overflow: auto;display: block;margin-bottom: 10px;">
                  <a href="<?php echo base_url();?>admin/employees/edit/<?php echo $employee->id;?>">
                    <button class="btn btn-info btn-xs pull-right">Edit</button>
                  </a>
                </div>
                <div class="col-md-6" style="padding: 0;">
                  <table class="table table-stripped">
                    <tr>
                      <th>Name</th>
                      <td><?php echo $employee->name;?></td>
                    </tr>
                    <tr>
                      <th>Position</th>
                      <td><?php echo $this->M_Positions->get_position_name($employee->position);?></td>
                    </tr>
                    <tr>
                      <th>Birthday</th>
                      <td><?php echo date('M d Y', strtotime($employee->dob));?></td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td><?php echo $employee->gender;?></td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td><?php echo $employee->address;?></td>
                    </tr>
                    <tr>
                      <th>Marital Status</th>
                      <td><?php echo $employee->status;?></td>
                    </tr>
                    <tr>
                      <th>Contact Number</th>
                      <td><?php echo $employee->contact;?></td>
                    </tr>
                   <tr>
                    <th>Email</th>
                    <td><?php echo $employee->email;?></td>
                  </tr>
                  </table>
                </div>
                <div class="col-md-6" style="padding: 0;">
                  <table class="table table-stripped">
                    <tr>
                      <th>TIN</th>
                      <td><?php echo $employee->tin;?></td>
                    </tr>
                     <tr>
                      <th>SSS ID</th>
                      <td><?php echo $employee->sss;?></td>
                    </tr>
                     <tr>
                      <th>HDMF</th>
                      <td><?php echo $employee->hdmf;?></td>
                    </tr>
                     <tr>
                      <th>PHILHEALTH</th>
                      <td><?php echo $employee->philhealth;?></td>
                    </tr>
                    <tr>
                      <th>Employement Status</th>
                      <td><?php echo $employee->employment_status;?></td>
                    </tr>
                     <tr>
                      <th>Dependents</th>
                      <td><?php echo strip_tags($employee->dependents);?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>