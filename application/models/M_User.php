<?php 
class M_User extends MY_Model
{

	protected $_table_name = 'user_accounts';
	protected $_primary_key = 'id';
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password'))
			), TRUE);
		if(count($user))
		{
			if($user->isActive == 0){
				$data = array(
					'logged_in' => FALSE
					);
				$this->session->set_userdata($data);
			}else{
				$data = array(
					'username' => $user->username,
					'id' => $user->id,
					'name' => $user->name,
					'type' => $user->type,
					// 'position' => $user->position,
					'logged_in' => TRUE
					);
				$this->session->set_userdata($data);
			}
		}
		else
		{
			$data = array(
				'logged_in' => FALSE
				);
			$this->session->set_userdata($data);
		}
	}
	public function loggedin()
	{
		return (bool)$this->session->userdata('logged_in');
	}
	public function logout()
	{
		$this->session->sess_destroy();
	}
	public function hash($string)
	{
		return hash('md5',$string);
	}
	public function generate_id($id){
		$id;
		if(strlen("$id") == 1){
			$id = "18-00" . $id;
		}else if(strlen("$id") == 2){
			$id = "18-0" . $id;
		}else if(strlen("$id") == 3){
			$id = "18-" . $id;
		}
		return $id;
	}
	public function get_login_user_details(){
		$id = $this->session->userdata('id');
		$this->db->where('account_id', $id);
		return $this->db->get('employees')->row();
	}
	public function get_login_user_accounts(){
		$id = $this->session->userdata('id');
		$this->db->where('id', $id);
		return $this->db->get('user_accounts')->row();
	}
}

?>