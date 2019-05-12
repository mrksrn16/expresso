<?php
class Attendance extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){

		if($this->input->post('filter_date')){
			$date = $this->input->post('filter_date');
		}else{
			$date = date('Y-m-d');
		}
		$where = "status='pending' AND date='$date'";
		$this->db->where($where);
		$attendance = $this->db->get('attendance')->result();
		$this->data['attendance'] = $attendance;
		$this->data['date'] = $date;
		$this->data['subview'] = 'admin/attendance';
		$this->load->view('main_layout', $this->data);
	}
	public function pay(){
		$employee_id = $this->input->post('employee_id');
		$date = $this->input->post('date');
		$where = "status='pending'";
		$this->db->where($where);
		$this->db->select_min('date');
		$query = $this->db->get('attendance');
		$min_date = $query->row()->date;
		$max_date = $date;

		$where = "employee_id = $employee_id AND status = 'pending'";
		$this->db->select_sum('subtotal');
	    $this->db->from('attendance');
	    $this->db->where($where);
	    $query = $this->db->get();
	    $total_salary = $query->row()->subtotal;
	    $roundTotalSalary = sprintf("%.2f", $total_salary);

	    //get deductions
	    $d = $this->M_Employees->get_position_salary($employee_id);
	    $deductions = $d->contribution_per_cutoff;

	    $total_compensation = $roundTotalSalary - (float)$deductions;

	    $data = array(
	    	'employee_id' => $employee_id,
	    	'total_salary' => $roundTotalSalary,
	    	'deductions' => $deductions,
	    	'total_compensation' => $total_compensation,
	    	'date' => $date,
	    	'range_start_date' => $min_date,
	    	'range_end_date' => $max_date
	    );
	    if($this->db->insert('salary', $data)){
	    	// $status = array(
	    	// 	'status' => 'ok'
	    	// );
	    	// $this->db->where('employee_id', $employee_id);
	    	// if($this->db->update('attendance', $status)){
	    	// }
	    	redirect('admin/attendance');
	    }

	}
}

?>
