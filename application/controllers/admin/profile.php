<?php
class Profile extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		if(isset($_POST['submit'])){
			$password;
			$cur_user = $this->session->userdata('id');
			if($this->input->post('password')){
				$password = $this->M_User->hash($this->input->post('password'));
			}else{
				$this->db->where('id', $cur_user);
				$res = $this->db->get('user_accounts')->row();
				$password = $res->password;
			}
			$details = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'password' => $password
			);
			$this->db->where('id', $cur_user);
			$this->db->update('user_accounts', $details);
		}
		$this->data['subview'] = 'admin/profile';
		$this->load->view('main_layout', $this->data);
	}
}

?>
