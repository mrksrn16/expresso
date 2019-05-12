<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>uploads/images/employees/<?php echo $this->M_User->get_login_user_details()->picture;?>" alt="User profile picture">
              <h5 class="profile-username text-center"><?php echo $this->M_User->get_login_user_details()->name;?></h5>

              <p class="text-muted text-center"><?php echo $this->M_Positions->get_position_name($this->M_User->get_login_user_details()->position);?></p>
              <p class="text-muted text-center">
              	<b>ID:</b> <?php echo $this->M_User->generate_id($employee->id);?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>

          

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            	<li class="active"><a href="#info" data-toggle="tab">Information</a></li>
              <li class=""><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content" style="overflow: auto;display: block;">
              <!-- /.tab-pane -->
             
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="info">
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
              <div class="tab-pane" id="settings">
                <!-- <form class="form-horizontal"> -->
                  <?php $attr = array('class' => 'form-horizontal');?>
                  <?php echo form_open('', $attr);?>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $this->M_User->get_login_user_accounts()->username;?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" placeholder="Password" name="password" value="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                  </div>
                </form>
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