<?php
class Employees extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['employees'] = $this->M_Employees->get_all();
		$this->data['subview'] = 'admin/employees/index';
		$this->load->view('main_layout', $this->data);
	}
	public function add(){
		if(isset($_POST['submit'])){

			    // Image upload
			    $config = array();
			    $config['upload_path'] = './uploads/images/employees/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $this->load->library('upload', $config, 'imageupload');  // Create custom object for catalog upload
			    $this->imageupload->initialize($config);
			    $upload_picture = $this->imageupload->do_upload('picture');
			    $upload_picture_data = $this->imageupload->data();
			    $picture = $upload_picture_data['file_name'];

			    //generate login account
			    $name = $this->input->post('firstname') . ' ' . $this->input->post('middlename') . ' '. $this->input->post('surname');
			    $account  = array(
			    	'username' => $this->input->post('firstname'),
			    	'password' => $this->M_User->hash($this->input->post('surname')),
			    	'name' => $name,
			    	'type' => 'employee',
			    );
			    $this->db->insert('user_accounts', $account);

			    //get last id
			    $lastId = $this->db->insert_id();

				$employee = array(
					'account_id' => $lastId,
					'surname' => $this->input->post('surname'),
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'name' => $name,
					'position' => $this->input->post('position'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'address' => $this->input->post('address'),
					'status' => $this->input->post('status'),
					'tin' => $this->input->post('tin'),
					'sss' => $this->input->post('sss'),
					'hdmf' => $this->input->post('hdmf'),
					'philhealth' => $this->input->post('philhealth'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email'),
					'employment_status' => $this->input->post('employment_status'),
					'dependents' => nl2br($this->input->post('dependents')),
					// 'picture' => $picture
				);
				if($this->db->insert('employees', $employee)){
					redirect('admin/employees');
			}
		}
		$this->data['subview'] = 'admin/employees/add';
		$this->load->view('main_layout', $this->data);
	}
	public function edit($id){
		if(isset($_POST['submit'])){

				$picture;
				if($_FILES["picture"]["name"]){
					 $config = array();
			    	 $config = array();
				    $config['upload_path'] = './uploads/images/employees/';
				    $config['allowed_types'] = 'gif|jpg|png';
				    $this->load->library('upload', $config, 'imageupload');  // Create custom object for catalog upload
				    $this->imageupload->initialize($config);
				    $upload_picture = $this->imageupload->do_upload('picture');
				    $upload_picture_data = $this->imageupload->data();
				    $picture = $upload_picture_data['file_name'];
				}else{
					$employee = $this->M_Employees->get_employee($id);
					$picture = $employee->picture;
				}


				$name = $this->input->post('firstname') . ' ' . $this->input->post('middlename') . ' '. $this->input->post('surname');

				$employee = array(
					'surname' => $this->input->post('surname'),
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'name' => $name,
					'position' => $this->input->post('position'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'address' => $this->input->post('address'),
					'status' => $this->input->post('status'),
					'tin' => $this->input->post('tin'),
					'sss' => $this->input->post('sss'),
					'hdmf' => $this->input->post('hdmf'),
					'philhealth' => $this->input->post('philhealth'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email'),
					'employment_status' => $this->input->post('employment_status'),
					'dependents' => nl2br($this->input->post('dependents')),
					// 'picture' => $picture
				);
				$this->db->where('id', $id);
				if($this->db->update('employees', $employee)){
					redirect('admin/employees');
				}
		}
		$this->data['employee'] = $this->M_Employees->get_employee($id);
		$this->data['subview'] = 'admin/employees/edit';
		$this->load->view('main_layout', $this->data);
	}
	public function view($id, $active_tab='attendance', $attendance_date=NULL, $salary_date=NULL){
		$this->data['employee'] = $this->M_Employees->get_employee($id);


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
			$salary_date = $this->input->post('filter_salary');
			$active_tab = 'salary';
		}else{
			$salary_date = date('Y-m-d');
			if($attendance_date){
				$salary_date = $attendance_date;
			}else{
				$salary_date = date('Y-m-d');
			}

		}

		$usr_id = $id;
		$where = "employee_id = $usr_id AND date = '$salary_date'";
		$this->db->where($where);
		$this->data['salaries'] = $this->db->get('salary')->result();
		$this->data['active_tab'] = $active_tab;
		$this->data['selected_date'] = $date;
		$this->data['salary_date'] = $salary_date;
		$this->data['subview'] = 'admin/employees/view';
		$this->load->view('main_layout', $this->data);
	}
	public function attendance($employee_id){
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		$where = "date >= '$start' AND date <= '$end' AND employee_id = $employee_id";
		$this->db->where($where);
		$attendance = $this->db->get('attendance')->result();

		$this->db->where($where);
		$this->db->select_sum('subtotal');
	    $this->db->from('attendance');
	    $this->db->where($where);
	    $query = $this->db->get();
	    $total_salary = $query->row()->subtotal;

		$this->data['employee'] = $this->M_Employees->get_employee($employee_id);
		$this->data['active_tab'] = 'attendance';
		$this->data['start'] = $start;
		$this->data['end'] = $end;
		$this->data['attendance'] = $attendance;
		$this->data['total_salary'] = sprintf("%.2f", $total_salary);
		$this->data['main'] = 'employees/view';
		$this->load->view('main_layout', $this->data);
	}
	public function search(){
		$keyword = $this->input->post('keyword');
		$this->data['employees'] = $this->M_Employees->search($keyword);
		$this->data['subview'] = 'admin/employees/index';
		$this->load->view('main_layout', $this->data);
	}
	public function delete($id){
		$this->db->where('id', $id);
		$emp_data = $this->db->get('employees')->row();

		//delete details
		$this->db->where('id', $id);
		$this->db->limit(1);
		$this->db->delete('employees');

		//delete accounts
		$this->db->where('id', $emp_data->account_id);
		$this->db->limit(1);
		$this->db->delete('user_accounts');

		//delete attendance
		$this->db->where('employee_id', $id);
		$this->db->limit(1);
		$this->db->delete('attendance');

		//delete salary
		$this->db->where('employee_id', $id);
		$this->db->limit(1);
		$this->db->delete('salary');

		redirect('admin/employees');
	}

	public function change_attendance($id, $selected_date){

		if(isset($_POST['submit'])){
			$time_in = $this->input->post('time_in');
			if($time_in){
				$time_in = $time_in;
			}else{
				$time_in = NULL;
			}
			$time_out = $this->input->post('time_out');
			if($time_out){
				$time_out = $time_out;
			}else{
				$time_out = NULL;
			}
			$morning_break_out = $this->input->post('morning_break_out');
			if($morning_break_out){
				$morning_break_out = $morning_break_out;
			}else{
				$morning_break_out = NULL;
			}
			$morning_break_in = $this->input->post('morning_break_in');
			if($morning_break_in){
				$morning_break_in = $morning_break_in;
			}else{
				$morning_break_in = NULL;
			}
			$lunch_out = $this->input->post('lunch_out');
			if($lunch_out){
				$lunch_out = $lunch_out;
			}else{
				$lunch_out = NULL;
			}
			$lunch_in = $this->input->post('lunch_in');
			if($lunch_in){
				$lunch_in = $lunch_in;
			}else{
				$lunch_in = NULL;
			}
			$afternoon_break_out = $this->input->post('afternoon_break_out');
			if($afternoon_break_out){
				$afternoon_break_out = $afternoon_break_out;
			}else{
				$afternoon_break_out = NULL;
			}
			$afternoon_break_in = $this->input->post('afternoon_break_in');
			if($afternoon_break_in){
				$afternoon_break_in = $afternoon_break_in;
			}else{
				$afternoon_break_in = NULL;
			}
			$night_diff_hrs = $this->input->post('night_diff_hrs');

			//check if exists to insert
			$where = "employee_id = $id AND date = '$selected_date'";
	        $this->db->where($where);
	        $res = $this->db->get('attendance')->row();
	        if($res){

	        	//compute total hours
	        	$overtime = 0;
				$this->db->where('id', $res->employee_id);
				$usr = $this->db->get('employees')->row();

				$this->db->where('position_id', $usr->position);
				$res = $this->db->get('position_salary')->row();
				$payDay;
				$payNight;

				$day = '';
				$day_in = '';
				$time_out_h = date('H', strtotime($time_out));
				if((int)$time_out_h >= 6 || date('H', strtotime($time_out)) == '00' ){
					$day = 'today';
				}else{
					$day = 'tomorrow';
				}
				if(date('H', strtotime($time_out)) == '00' ){
					$day_in = 'yesterday';
				}else{
					$day_in = 'today';
				}

				$time_in_format = date('H:i', strtotime($time_in));
				$time_out_format = date('H:i', strtotime($time_out));

				$totalHoursDay = day_difference(strtotime("$day_in $time_in_format"),strtotime("$day $time_out_format"));
				$totalHoursNight = night_difference(strtotime("$day_in $time_in_format"),strtotime("$day $time_out_format"));

	        	$totalHoursTmp = $totalHoursDay;
	        	if($totalHoursTmp > 4){
					$totalHoursTmp = $totalHoursTmp - 1;
				}
				$overtimeCount = 0;
				$totalHours = $totalHoursDay;
				if($totalHours > 4){
					$totalHours = $totalHours - 1;
					if($totalHoursNight != 0){
						$totalHours -= $totalHoursNight;
					}
					// $totalHours = $totalHours - $totalHoursNight;
					if($totalHours > 8){
						$totalHours = $totalHours - $totalHoursNight;
						$overtimeCount = $totalHours - 8;
						$totalHours -= 1;

						// $x = new DateTime($time_in);
						// $y = $x->modify('+8 hours');
						
					}
				}

				$payDay = $totalHours * (float)$res->per_hour_rate;
				$payNight = computeNightDiff($usr->position, $totalHoursNight);
				$overtimePay = computeOvertime($usr->position, $overtimeCount);
				$computedSubTotal = $payDay + $payNight + $overtimePay;

				// var_dump($payDay);
				// var_dump($payNight);
				// var_dump($totalHours);
				// var_dump($totalHoursNight);
				// var_dump($overtimeCount);

				$data = array(
					'time_in' => $time_in,
					'time_out' => $this->input->post('time_out'),
					'morning_break_out' => $morning_break_out,
					'morning_break_in' => $morning_break_in,
					'lunch_out' => $lunch_out,
					'lunch_in' => $lunch_in,
					'afternoon_break_out' => $afternoon_break_out,
					'afternoon_break_in' => $afternoon_break_in,
					'total_hours' => $totalHoursTmp,
					'overtime' => $overtimeCount,
					'night_diff_hrs' => $totalHoursNight,
					'night_diff_pay' => $payNight,
					'overtime_pay' => sprintf("%.2f", $overtimePay),
					'subtotal' => $computedSubTotal
				);
		        $where = "employee_id = $id AND date = '$selected_date'";
		        $this->db->where($where);
		        if($this->db->update('attendance', $data)){
		        	redirect('admin/employees/view/' . $id . '/attendance/' . $selected_date);
		        }

	        }else{

	        	//compute total hours
	        	$overtime = 0;
				$this->db->where('id', $res->employee_id);
				$usr = $this->db->get('employees')->row();

				$this->db->where('position_id', $usr->position);
				$res = $this->db->get('position_salary')->row();
				$payDay;
				$payNight;

				$day = '';
				$day_in = '';
				$time_out_h = date('H', strtotime($time_out));
				if((int)$time_out_h >= 6 || date('H', strtotime($time_out)) == '00' ){
					$day = 'today';
				}else{
					$day = 'tomorrow';
				}
				if(date('H', strtotime($time_out)) == '00' ){
					$day_in = 'yesterday';
				}else{
					$day_in = 'today';
				}

				$time_in_format = date('H:i', strtotime($time_in));
				$time_out_format = date('H:i', strtotime($time_out));

				$totalHoursDay = day_difference(strtotime("$day_in $time_in_format"),strtotime("$day $time_out_format"));
				$totalHoursNight = night_difference(strtotime("$day_in $time_in_format"),strtotime("$day $time_out_format"));

	        	$totalHoursTmp = $totalHoursDay;
	        	if($totalHoursTmp > 4){
					$totalHoursTmp = $totalHoursTmp - 1;
				}
				$overtimeCount = 0;
				$totalHours = $totalHoursDay;
				if($totalHours > 4){
					$totalHours = $totalHours - 1;
					if($totalHoursNight != 0){
						$totalHours -= $totalHoursNight;
					}
					// $totalHours = $totalHours - $totalHoursNight;
					if($totalHours > 8){
						$totalHours = $totalHours - $totalHoursNight;
						$overtimeCount = $totalHours - 8;
						$totalHours -= 1;

						// $x = new DateTime($time_in);
						// $y = $x->modify('+8 hours');
						
					}
				}

				$payDay = $totalHours * (float)$res->per_hour_rate;
				$payNight = computeNightDiff($usr->position, $totalHoursNight);
				$overtimePay = computeOvertime($usr->position, $overtimeCount);
				$computedSubTotal = $payDay + $payNight + $overtimePay;

				$this->db->where('id', $id);
				$usr = $this->db->get('employees')->row();

				$this->db->where('position_id', $usr->position);
				$res = $this->db->get('position_salary')->row();
				//compute rate per hour * total hours

				$overtimeCount = (float)$totalHoursTmp - (float)8;
				$overtimePay = 0;
				if($overtimeCount > 0){
					$overtimePay = (float)$overtimeCount * $res->ot_rate;
				}

				$computedSubTotal = ((float)$totalHours * (float)$res->per_hour_rate) + (float)$overtimePay;

	        	$data = array(
	        		'employee_id' => $id,
	        		'date' => $selected_date,
					'time_in' => $time_in,
					'time_out' => $this->input->post('time_out'),
					'morning_break_out' => $morning_break_out,
					'morning_break_in' => $morning_break_in,
					'lunch_out' => $lunch_out,
					'lunch_in' => $lunch_in,
					'afternoon_break_out' => $afternoon_break_out,
					'afternoon_break_in' => $afternoon_break_in,
					'total_hours' => $totalHoursTmp,
					'overtime' => $overtimeCount,
					'night_diff_hrs' => $totalHoursNight,
					'night_diff_pay' => $payNight,
					'overtime_pay' => sprintf("%.2f", $overtimePay),
					'subtotal' => $computedSubTotal
				);
		        if($this->db->insert('attendance', $data)){
		        	redirect('admin/employees/view/' . $id . '/attendance/' . $selected_date);
		        }

	        }

		}
		$this->data['employee'] = $this->M_Employees->get_employee($id);
		$selected_date = $selected_date;

		$date = $selected_date;
        $where = "employee_id = $id AND date = '$selected_date'";
        $this->db->where($where);
        $this->data['attendance'] = $this->db->get('attendance')->row();
        $this->data['employee_id'] = $id;
		$this->data['selected_date'] = $selected_date;
		$this->data['subview'] = 'admin/employees/change_attendance';
		$this->load->view('main_layout', $this->data);
	}
	public function reset_attendance($employee_id, $selected_date){
		$data = array(
			'time_in' => NULL,
			'time_out' => NULL,
			'morning_break_in' => NULL,
			'morning_break_out' => NULL,
			'lunch_out' => NULL,
			'lunch_in' => NULL,
			'afternoon_break_out' => NULL,
			'afternoon_break_in' => NULL,
			'total_hours' => NULL,
			'subtotal' => NULL,
		);
		$where = "employee_id = $employee_id AND date = '$selected_date'";
		$this->db->where($where);
		$this->db->update('attendance', $data);
		redirect('admin/employees/view/' . $employee_id . '/attendance/' . $selected_date);
	}
	public function computeTotalHours($time_in, $time_out){
		// $a = new DateTime($time_in);
	 //    $b = new DateTime($time_out);
	 //    $interval = $b->diff($a);
	 //    $hours = $interval->format("%h");
	 //    $minutes = $interval->format("%i");
	 //    $number = $hours . '.' . $minutes;
	 //    $totalHours = (float)$number;
	 //    return $totalHours;
		$datetime1 = new DateTime($time_in);
        $datetime2 = new DateTime($time_out);
        $diff = $datetime2->diff($datetime1);
        $hours = round($diff->s / 3600 + $diff->i / 60 + $diff->h + $diff->days * 24, 2);
        return $hours;
	}


}

?>
