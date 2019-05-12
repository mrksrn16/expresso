<?php
class Salary extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		if(isset($_POST['submit'])){
			
			if($this->input->post('start_date')){
				$start_date = $this->input->post('start_date');
			}else{
				$start_date = '';
			}
			$end_date = $this->input->post('end_date');
		}else{
			$start_date = '';
			$end_date = date('Y-m-d');
		}

		$where = "range_start_date >= '$start_date' AND range_end_date <= '$end_date'";
		$this->db->where($where);
		$salary = $this->db->get('salary')->result();
		// var_dump($where);
		$this->data['salaries'] = $salary;
		$this->data['start_date'] = $start_date;
		$this->data['end_date'] = $end_date;
		$this->data['subview'] = 'admin/salary';
		$this->load->view('main_layout', $this->data);
	}
	public function additional(){
		$additional = $this->input->post('additional');
		$salary_id = $this->input->post('salary_id');

		//get compensation then add
		$this->db->where('id', $salary_id);
		$salary = $this->db->get('salary')->row();

		$newCompensation = (float)$additional + (float)$salary->total_compensation;

		$data = array(
			'additional' => $additional,
			'total_compensation' => $newCompensation
		);
		$this->db->where('id', $salary_id);
		if($this->db->update('salary', $data)){
			redirect('admin/salary');
		}
	}
	public function pay($salary_id){
		$data = array(
			'status' => 'ok'
		);
		$this->db->where('id', $salary_id);
		if($this->db->update('salary', $data)){
			redirect('admin/salary');
		}
	}
	public function undo($salary_id){
		$data = array(
			'status' => 'pending'
		);
		$this->db->where('id', $salary_id);
		if($this->db->update('salary', $data)){
			redirect('admin/salary');
		}
	}
}

?>
