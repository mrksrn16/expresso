<?php
class User extends User_Controller
{
	function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->login();
	}
	public function login(){
		// echo $this->M_User->hash('jean');
		// $dashboard = "dashboard";
		if($this->session->userdata('type') == 'admin'){
			$dashboard = 'admin/dashboard';
		}else{
			$dashboard = 'employee/profile';
		}
		$this->M_User->loggedin() == FALSE || redirect($dashboard);
		if(isset($_POST['submit'])){
			if($this->M_User->login() === TRUE) {
				redirect('admin/dashboard');
			}
			if($this->session->userdata('logged_in') == FALSE) {
				echo '<script>alert("Username/Password didn`t exists.");</script>';
			}
			else {
				$this->session->set_flashdata('error', 'Username and Password dont exists');
				redirect('user/login' , 'refresh');
			}
		}
		$this->load->view('login');
	}
	public function activate($id){
		$data = array(
			'isActive' => 1
		);
		$this->db->where('id', $id);
		if($this->db->update('user_accounts', $data)){
			redirect('admin/employees');
		}

	}
	public function deactivate($id){
		$data = array(
			'isActive' => 0
		);
		$this->db->where('id', $id);
		if($this->db->update('user_accounts', $data)){
			redirect('admin/employees');
		}
	}
	
	public function logout(){
		$this->M_User->logout();
		redirect('user/login');
	}
	public function check_pass(){
		
	}
	public function profile(){
		$this->db->where('id', 1);
		$this->data['admin'] = $this->db->get('tbl_admin')->row();
		$this->data['main'] = 'admin/profile';
		$this->load->view('main_layout', $this->data);
	}
	public function editprofile(){

		if(isset($_POST['submit'])){
				$picture;
				if($_FILES["picture"]["name"]){
					$config['upload_path']          = './uploads/images/admin/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $this->load->library('upload', $config);
	                if ( ! $this->upload->do_upload('picture')){
	                	$error = array('error' => $this->upload->display_errors());
	                	var_dump($error);
	                }else{
	                	$picture = $this->upload->data('file_name'); 
	                }
				}else{
					$this->db->where('id', 1);
					$admin_info = $this->db->get('tbl_admin')->row();
					$picture = $admin_info->picture;
				}
				$password;
				if($this->input->post('password')){
					$password = $this->M_User->hash($this->input->post('password'));
				}else{
					$this->db->where('id', 1);
					$admin = $this->db->get('tbl_admin')->row();
					$password  = $admin->password;
				}
				$admin = array(
					'username' => $this->input->post('username'),
					'name' => $this->input->post('name'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'position' => $this->input->post('position'),
					// 'picture' => $this->input->post('name')
					'picture' => $picture,
					'password' => $password,
				);
				$this->db->where('id', 1);
				if($this->db->update('tbl_admin', $admin)){
					redirect('user/profile');
				}
		}


		$this->db->where('id', 1);
		$this->data['admin'] = $this->db->get('tbl_admin')->row();
		$this->data['main'] = 'admin/edit';
		$this->load->view('main_layout', $this->data);
	}
}

?>
