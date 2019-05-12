<div class="row">
        <div class="col-md-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>uploads/images/employees/<?php echo $employee->picture;?>" alt="User profile picture">

              <h5 class="profile-username text-center"><?php echo $employee->name;?></h5>

              <p class="text-muted text-center"><?php echo $this->M_Positions->get_position_name($employee->position);?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#change" data-toggle="tab">Change Attendance</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Settings</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="change">
                <a href="<?php echo base_url();?>admin/employees/view/<?php echo $employee_id?>" style="margin-bottom: 10px;overflow: auto;display: block;">
                  <button class="btn btn-default btn-xs">Back</button>
                </a>
                <!-- Attendance -->
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?php echo date('M d Y', strtotime($selected_date));?></h3>
                  </div>
                  <!-- /.box-header -->

                  <!-- get attendance -->
                  <?php 
                    
                  ?>
                  <div class="box-body">
                    <?php echo form_open();?>
                    <table class="table table-bordered" style="margin-top: 10px;">
                      <a href="<?php echo base_url();?>admin/employees/reset_attendance/<?php echo $employee_id?>/<?php echo $selected_date?>" onclick="return confirm('Reset attendance?')" style="overflow: auto;display: block;margin-bottom: 10px;">
                        <button type="button" class="btn btn-danger btn-xs pull-right">Reset</button>
                      </a>
                      <tr>
                        <th>Time In</th>
                        <td><input type="time" name="time_in" class="form-control" value="<?php if($attendance){ echo $attendance->time_in;}?>"></td>
                      </tr>
                      <tr>
                        <th>Break Out</th>
                        <td><input type="time" name="morning_break_out" class="form-control" value="<?php if($attendance){ echo $attendance->morning_break_out;}?>"></td>
                      </tr>
                      <tr>
                        <th>Break In</th>
                        <td><input type="time" name="morning_break_in" class="form-control" value="<?php if($attendance){ echo $attendance->morning_break_in;}?>"></td>
                      </tr>
                      <tr>
                        <th>Lunch Out</th>
                        <td><input type="time" name="lunch_out" class="form-control" value="<?php if($attendance){ echo $attendance->lunch_out;}?>"></td>
                      </tr>
                      <tr>
                        <th>Lunch In</th>
                        <td><input type="time" name="lunch_in" class="form-control" value="<?php if($attendance){ echo $attendance->lunch_in;}?>"></td>
                      </tr>
                      <tr>
                        <th>Break Out</th>
                        <td><input type="time" name="afternoon_break_out" class="form-control" value="<?php if($attendance){ echo $attendance->afternoon_break_out;}?>"></td>
                      </tr>
                      <tr>
                        <th>Break In</th>
                        <td><input type="time" name="afternoon_break_in" class="form-control" value="<?php if($attendance){ echo $attendance->afternoon_break_in;}?>"></td>
                      </tr>
                      <tr>
                        <th>Time Out</th>
                        <td><input type="time" name="time_out" class="form-control" value="<?php if($attendance){ echo $attendance->time_out;}?>"></td>
                      </tr>
                      <!--  <tr>
                        <th>Night Diff Hours</th>
                        <td><input type="number" name="night_diff_hrs" class="form-control" value="<?php if($attendance){ echo $attendance->night_diff_hrs;}?>"></td>
                      </tr> -->
                      <tr>
                        <th></th>
                        <td>
                          <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </td>
                      </tr>
                    </table>
                    </form>
                  </div>
                </div>
                <!-- Attendance -->
              </div>

              <!-- <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Username">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </form>
              </div> -->
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