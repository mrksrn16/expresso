<?php
class Dashboard extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index($active_tab='attendance', $attendance_date=NULL, $salary_date=NULL){
		if($this->input->post('filter_attendance')){
			$date = $this->input->post('filter_attendance');
			$active_tab = 'attendance';
		}else{
			if($attendance_date){
				$date = $attendance_date;
			}else{
				$date = date('Y-m-d');
			}
		}

		if($this->input->post('filter_salary')){
			$active_tab = 'salary';
			$salary_date = $this->input->post('filter_salary');
		}else{
			$salary_date = date('Y-m-d');
		}
		$usr_id = $this->session->userdata('id');
		$where = "employee_id = $usr_id AND date = '$salary_date'";
		$this->db->where($where);
		$this->data['salaries'] = $this->db->get('salary')->result();
		$this->data['selected_date'] = $date;
		$this->data['salary_date'] = $salary_date;
		$this->data['active_tab'] = $active_tab;
		$this->data['employee'] = $this->M_Employees->get_employee($this->session->userdata('id'));
		$this->data['subview'] = 'employee/dashboard';
		$this->load->view('main_layout', $this->data);
	}
}

?>
