<div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <!-- Employees -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Employees</h3>
              <div class="pull-right col-md-3">
                <?php echo form_open('admin/employees/search');?>
                <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Type keyword here" name="keyword">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat">Search</button>
                    </span>
                </form>
              </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url();?>admin/employees/add">
                <button class="btn btn-primary btn-sm">
                  Add New
                </button>
              </a>
              <table class="table table-bordered" style="margin-top: 10px;">
                <tr>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Position</th>
                  <th></th>
                </tr>
                <?php if(count($employees)):?>
                <?php foreach($employees as $employee):?>
                  <!-- hide if admin -->
                  <?php 
                    $this->db->where('id', $employee->account_id);
                    $res = $this->db->get('user_accounts')->row();
                  ?>
	                <tr style="display: <?php if($res->type == 'admin'){echo 'none';}?>">
                    <!-- <?php echo $res->type;?> -->
	                  <td><?php echo $this->M_User->generate_id($employee->id);?></td>
	                  <td><?php echo $employee->name;?></td>
	                  <td><?php echo $this->M_Positions->get_position_name($employee->position);?></td>
	                  <td>
	                    <a href="<?php echo base_url();?>admin/employees/view/<?php echo $employee->id;?>">
	                      <button class="btn btn-xs btn-info btn-flat">View</button>
	                    </a>
	                    <a href="<?php echo base_url();?>admin/employees/edit/<?php echo $employee->id;?>">
	                      <button class="btn btn-xs btn-primary btn-flat">Edit</button>
	                    </a>
	                    <a href="<?php echo base_url();?>admin/employees/delete/<?php echo $employee->id;?>" onclick="return confirm('Delete this employee?Note: All his/her details will be remove.');">
	                      <button class="btn btn-xs btn-primary btn-danger">Delete</button>
	                    </a>
                      <!-- get active status on user accoutns -->
                      <?php 
                        $this->db->where('id', $employee->account_id);
                        $result = $this->db->get('user_accounts')->row();
                      ?>
                      <?php if($result->isActive == 1):?>
	                    <a href="<?php echo base_url();?>user/deactivate/<?php echo $employee->account_id?>">
	                      <button class="btn btn-xs btn-primary btn-warning">Deactivate</button>
	                    </a>
                      <?php else:?>
                        <a href="<?php echo base_url();?>user/activate/<?php echo $employee->account_id?>">
                        <button class="btn btn-xs btn-primary btn-success">Activate</button>
                      </a>
                      <?php endif;?>
	                  </td>
	                </tr>
	              <?php endforeach;?>
	          	<?php else:?>
	          		<tr>
	          			<td colspan="4">No employees found.s</td>
	          		</tr>
	          	<?php endif;?>
                <tr>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->