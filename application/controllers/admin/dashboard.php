<?php
class Dashboard extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		// echo computeNightDiffOvertime(3, 2);

		$this->data['error'] = false;
		$this->data['active_tab'] = 'timein';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function timein(){
		date_default_timezone_set('Asia/Manila');
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'time_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'time_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'timein';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function timeout(){
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		//trim
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			$time_now = date('H:i', strtotime('+8 hours'));
			if($res){
				//update
				//compute total hours
				$overtime = 0;
				$totalHoursTmp = $this->computeTotalHours($res->time_in, $time_now);
				if($totalHoursTmp > 4){
					$totalHoursTmp = $totalHoursTmp - 1;
				}

				$totalHours = $this->computeTotalHours($res->time_in, $time_now);
				if($totalHours > 4){
					$totalHours = $totalHours - 1;
					if($totalHours > 8){
						$overtimeHrs = $totalHours - 8;
						$totalHours = $totalHours - $overtimeHrs;
					}
				}
				//get salary per hour
				$this->db->where('id', $res->employee_id);
				$usr = $this->db->get('employees')->row();

				$this->db->where('position_id', $usr->position);
				$res = $this->db->get('position_salary')->row();
				//compute rate per hour * total hour

				$overtimeCount = (float)$totalHoursTmp - (float)8;
				$overtimePay = 0;
				if($overtimeCount > 0){
					$overtimePay = (float)$overtimeCount * $res->ot_rate;
				}

				$computedSubTotal = ((float)$totalHours * (float)$res->per_hour_rate) + (float)$overtimePay;

				$data = array(
					'time_out' => $time_now,
					'total_hours' => $totalHours,
					'overtime' => $overtimeCount,
					'overtime_pay' => sprintf("%.2f", $overtimePay),
					'subtotal' => $computedSubTotal
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'time_out' => $time_now,
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'timeout';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function lunchout(){

		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'lunch_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'lunch_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'lunchout';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function lunchin(){
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'lunch_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'lunch_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'lunchin';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function morningbreakout(){

		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'morning_break_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'morning_break_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'morningbreakout';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function morningbreakin(){
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');
		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'morning_break_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'morning_break_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'morningbreakin';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function afternoonbreakout(){
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');

		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'afternoon_break_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'afternoon_break_out' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}


		$this->data['active_tab'] = 'afternoonbreakout';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}
	public function afternoonbreakin(){
		$emp_input = $this->input->post('emp_id');
		$date = date('Y-m-d');

		if($this->checktrim($emp_input)){
			$trim = ltrim(substr($emp_input, -3), '0');
			$emp_input_id = (int)$trim;
			$where = "date = '$date' AND employee_id = $emp_input_id";
			$this->db->where($where);
			$res = $this->db->get('attendance')->row();
			// var_dump($res);
			if($res){
				//update
				$data = array(
					'afternoon_break_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->where($where);
				$this->db->update('attendance', $data);
			}else{
				$data = array(
					'date' => $date,
					'employee_id' => $emp_input_id,
					'afternoon_break_in' => date('H:i', strtotime('+8 hours'))
				);
				$this->db->insert('attendance', $data);
			}
			$this->data['error'] = false;
		}else{
			$this->data['error'] = true;
		}

		$this->data['active_tab'] = 'afternoonbreakin';
		$this->data['subview'] = 'admin/dashboard';
		$this->load->view('main_layout', $this->data);
	}

	public function checktrim($emp_input){
		//trim
		$trim = ltrim(substr($emp_input, -3), '0');
		$emp_input_id = (int)$trim;
		//check
		$this->db->where('id', $emp_input_id);
		$res = $this->db->get('employees')->row();
		return $res;
	}

	public function computeTotalHours($time_in, $time_out){
		$a = new DateTime($time_in);
	    $b = new DateTime($time_out);
	    $interval = $b->diff($a);
	    $hours = $interval->format("%h");
	    $minutes = $interval->format("%i");
	    $number = $hours . '.' . $minutes;
	    $totalHours = (float)$number;
	    return $totalHours;
	}
}

?>
