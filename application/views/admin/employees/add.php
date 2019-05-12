<div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Employees -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Employee</h3>
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
                          <input type="text" class="form-control" id="" placeholder="Surname" name="surname" required="">
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                          <input type="text" class="form-control" id="" placeholder="Firstname" name="firstname" required="">
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                          <input type="text" class="form-control" id="" placeholder="Middle Name" name="middlename" required="">
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
                              <option value="<?php echo $position->id;?>"><?php echo $position->name;?></option>
                            <?php endforeach;?>
                          <?php endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Birthday</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="" placeholder="" name="dob" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender" required="">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="address" placeholder="Address"></textarea>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Marital Status</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="status" required="">
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Contact Number</label>
                      <div class="col-sm-10" required="">
                        <input type="number" class="form-control" id="" placeholder="Contact Number" name="contact">
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10" required="">
                        <input type="email" class="form-control" id="" placeholder="Email" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">TIN</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="TIN" name="tin">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">SSS ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="SSS ID" name="sss">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">HDMF</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="HDMF" name="hdmf">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">PHILHEALTH</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="PHILHEALTH" name="philhealth">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Employement Status</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="employment_status" required="">
                          <option value="Regular">Regular</option>
                          <option value="Part Time">Part Time</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Dependents</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="dependents" placeholder="Name - Birthday"></textarea>
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