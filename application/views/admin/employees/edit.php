<div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Employees -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Employee - <?php echo $employee->name;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url();?>admin/employees">
                <button class="btn btn-default btn-sm">
                  Back
                </button>
              </a>
              <?php $attr =  array('class' => 'form-horizontal');?>
              <?php echo form_open_multipart('', $attr);?>

              <div class="row" style="margin-top: 10px;">
                <div class="col-lg-12">
                  <p><b>Basic Information</b></p>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <div class="col-md-4" style="padding: 0;">
                          <input type="text" class="form-control" id="" placeholder="Surname" name="surname" required="" value="<?php echo $employee->surname;?>">
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                          <input type="text" class="form-control" id="" placeholder="Firstname" name="firstname" required="" value="<?php echo $employee->firstname;?>">
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                          <input type="text" class="form-control" id="" placeholder="Middle Name" name="middlename" required="" value="<?php echo $employee->middlename;?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Position</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="position">
                          <?php $positions = $this->M_Positions->get_positions();?>
                          <?php if(count($positions)):?>
                            <?php foreach($positions as $position):?>
                              <option value="<?php echo $position->id;?>" <?php if($employee->position == $position->id){ echo 'selected'; }?>><?php echo $position->name;?></option>
                            <?php endforeach;?>
                          <?php endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Birthday</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="" placeholder="" name="dob" required="" value="<?php echo $employee->dob;?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender" required="">
                          <option value="Male" <?php if($employee->gender == 'Male'){ echo 'selected'; }?>>Male</option>
                          <option value="Female" <?php if($employee->gender == 'Female'){ echo 'selected'; }?>>Female</option>
                        </select>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="address" placeholder="Address"><?php echo $employee->address;?></textarea>
                      </div>
                    </div>  

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Marital Status</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="status" required="">
                          <option value="Single" <?php if($employee->status == 'Single'){ echo 'selected'; }?>>Single</option>
                          <option value="Married" <?php if($employee->status == 'Married'){ echo 'selected'; }?>>Married</option>
                          <option value="Widowed" <?php if($employee->status == 'Widowed'){ echo 'selected'; }?>>Widowed</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Contact Number</label>
                      <div class="col-sm-10" required="">
                        <input type="number" class="form-control" id="" placeholder="Contact Number" name="contact" value="<?php echo $employee->contact;?>">
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10" required="">
                        <input type="email" class="form-control" id="" placeholder="Email" name="email" value="<?php echo $employee->email;?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">TIN</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="TIN" name="tin" value="<?php echo $employee->tin;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">SSS ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="SSS ID" name="sss" value="<?php echo $employee->sss;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">HDMF</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="HDMF" name="hdmf" value="<?php echo $employee->hdmf;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">PHILHEALTH</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="PHILHEALTH" name="philhealth" value="<?php echo $employee->philhealth;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Employement Status</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="employment_status" required="">
                          <option value="Regular" <?php if($employee->employment_status == 'Regular'){ echo 'selected'; }?>>Regular</option>
                          <option value="Part Time" <?php if($employee->employment_status == 'Part Time'){ echo 'selected'; }?>>Part Time</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Dependents</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="dependents" placeholder="Name - Birthday"><?php ?><?php echo strip_tags($employee->dependents);?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
                    </div>
                  </div>
                </div>
                </div>
            </form>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>