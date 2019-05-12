<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>uploads/images/admin/<?php echo $this->M_User->get_login_user_accounts()->picture;?>" alt="User profile picture">

              <h5 class="profile-username text-center"><?php echo $this->M_User->get_login_user_details()->name;?></h5>

              <p class="text-muted text-center"><?php echo $this->M_Positions->get_position_name($this->M_User->get_login_user_details()->position);?></p>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- About Me Box -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Address</strong>

              <p class="text-muted">
                <?php echo $this->M_User->get_login_user_accounts()->address;?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Contact Number</strong>

              <p class="text-muted"><?php echo $this->M_User->get_login_user_accounts()->contact;?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Email</strong>

              <p>
                <?php echo $this->M_User->get_login_user_accounts()->email;?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
             
              <!-- /.tab-pane -->

              <div class="tab-pane active" id="settings">
                <!-- <form class="form-horizontal"> -->
                  <?php $attr = array('class' => 'form-horizontal');?>
                  <?php echo form_open('', $attr);?>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $this->M_User->get_login_user_accounts()->name;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $this->M_User->get_login_user_accounts()->address;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contact</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Contact" name="contact" value="<?php echo $this->M_User->get_login_user_accounts()->contact;?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $this->M_User->get_login_user_accounts()->email;?>" required>
                    </div>
                  </div>

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