<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Attendance</h3>
          <!-- <span class="pull-right">- 10:09 PM</span> -->
          <span class="pull-right" style="margin-right: 5px;"> <?php echo date('M d Y');?></span>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <div class="nav-tabs-custom" style="margin-bottom: 20px;">
            <ul class="nav nav-tabs">
              <li class="<?php if($active_tab == 'timein'){ echo 'active'; }?>"><a href="#timein" data-toggle="tab">Time In</a></li>
              <li class="<?php if($active_tab == 'morningbreakout'){ echo 'active'; }?>"><a href="#morningbreakout" data-toggle="tab">Break Out</a></li>
              <li class="<?php if($active_tab == 'morningbreakin'){ echo 'active'; }?>"><a href="#morningbreakin" data-toggle="tab">Break In</a></li>
              <li class="<?php if($active_tab == 'lunchout'){ echo 'active'; }?>"><a href="#lunchout" data-toggle="tab">Lunch Out</a></li>
              <li class="<?php if($active_tab == 'lunchin'){ echo 'active'; }?>"><a href="#lunchin" data-toggle="tab">Lunch In</a></li>
              <li class="<?php if($active_tab == 'afternoonbreakout'){ echo 'active'; }?>"><a href="#afternoonbreakout" data-toggle="tab">Break Out</a></li>
              <li class="<?php if($active_tab == 'afternoonbreakin'){ echo 'active'; }?>"><a href="#afternoonbreakin" data-toggle="tab">Break In</a></li>
              <li class="<?php if($active_tab == 'timeout'){ echo 'active'; }?>"><a href="#timeout" data-toggle="tab">Time Out</a></li>
            </ul>
            <?php if($error):?>
            <div class="error">
              Employee ID not found.
            </div>
            <?php endif;?>
            <div class="tab-content" style="overflow: auto;">
            	<!-- time in -->
              <div class="<?php if($active_tab == 'timein'){ echo 'active'; }?> tab-pane" id="timein">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/timein');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>
              <!-- time out -->
              <div class="<?php if($active_tab == 'timeout'){ echo 'active'; }?> tab-pane" id="timeout">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/timeout');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>
              <!-- morning break out -->
              <div class="<?php if($active_tab == 'morningbreakout'){ echo 'active'; }?> tab-pane" id="morningbreakout">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/morningbreakout');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>
              <!-- morning break in -->
              <div class="<?php if($active_tab == 'morningbreakin'){ echo 'active'; }?> tab-pane" id="morningbreakin">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/morningbreakin');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>

              <!-- lunch out -->
              <div class="<?php if($active_tab == 'lunchout'){ echo 'active'; }?> tab-pane" id="lunchout">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/lunchout');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>

              <!-- lunch in -->
              <div class="<?php if($active_tab == 'lunchin'){ echo 'active'; }?> tab-pane" id="lunchin">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/lunchin');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>

              <!-- afternoon break out -->
              <div class="<?php if($active_tab == 'afternoonbreakout'){ echo 'active'; }?> tab-pane" id="afternoonbreakout">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/afternoonbreakout');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>

              <!-- afternoon break in -->
              <div class="<?php if($active_tab == 'afternoonbreakin'){ echo 'active'; }?> tab-pane" id="afternoonbreakin">
                <div class="col-md-6" style="padding: 0;">
                  <?php echo form_open('admin/dashboard/afternoonbreakin');?>
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Ok</button>
                      </span>
                      </div>
                  </form>
                </div>
              </div>

            </div>
          <table class="table table-bordered" style="margin-top: 20px;">
            <tr>
              <th>Employee ID</th>
              <th>Time In</th>
              <th>Break Out</th>
              <th>Break In</th>
              <th>Lunch Out</th>
              <th>Lunch In</th>
              <th>Break Out</th>
              <th>Break In</th>
              <th>Time Out</th>
            </tr>
            <!-- get attendance -->
            <?php 
            $date = date('Y-m-d');
            $where = "date = '$date'";
            $this->db->where($where);
            $attendance = $this->db->get('attendance')->result();
            ?>
            <?php if(count($attendance)):?>
            <?php foreach($attendance as $a):?>
            <tr>
              <td>
                <?php echo $this->M_User->generate_id($a->employee_id);?>
              </td>
              <td><?php if($a->time_in){ echo date('h:i A', strtotime($a->time_in));}else{ echo '--:--'; }?></td>
              <td><?php if($a->morning_break_out){ echo date('h:i A', strtotime($a->morning_break_out));}else{ echo '--:--'; }?></td>
              <td><?php if($a->morning_break_in){ echo date('h:i A', strtotime($a->morning_break_in));}else{ echo '--:--'; }?></td>
              <td><?php if($a->lunch_out){ echo date('h:i A', strtotime($a->lunch_out));}else{ echo '--:--'; }?></td>
              <td><?php if($a->lunch_in){ echo date('h:i A', strtotime($a->lunch_in));}else{ echo '--:--'; }?></td>
              <td><?php if($a->afternoon_break_out){ echo date('h:i A', strtotime($a->afternoon_break_out));}else{ echo '--:--'; }?></td>
              <td><?php if($a->afternoon_break_in){ echo date('h:i A', strtotime($a->afternoon_break_in));}else{ echo '--:--'; }?></td>
              <td><?php if($a->time_out){ echo date('h:i A', strtotime($a->time_out));}else{ echo '--:--'; }?></td>
            </tr>
            <tr>
            <?php endforeach;?>
            <?php else:?>
            <tr>
              <td colspan="5">No attendance available.</td>
            </tr>
            <?php endif;?>
          </table>
        </div>
      </div>