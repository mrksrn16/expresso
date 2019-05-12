<?php
class Reset extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->data['subview'] = 'admin/reset';
		$this->load->view('main_layout', $this->data);
	}
	public function clear(){
		$this->db->empty_table("salary");
		$this->db->empty_table("attendance");
		redirect('admin/dashboard');
	}
}

?>
