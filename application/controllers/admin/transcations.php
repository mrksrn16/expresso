<?php
class Transcations extends User_Controller
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

		$where = "status = 'ok' AND date='$date'";
		$this->db->where($where);
		$res = $this->db->get('salary')->result();
		$this->data['salaries'] = $res;
		$this->data['date'] = $date;
		$this->data['subview'] = 'admin/transactions';
		$this->load->view('main_layout', $this->data);
	}
}

?>
