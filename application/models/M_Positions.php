<?php 
class M_Positions extends MY_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function get_positions(){
		return $this->db->get('positions')->result();
	}
	public function get_position_name($position_id){
		$this->db->where('id', $position_id);
		$res = $this->db->get('positions')->row();
		return $res->name;
	}
	public function check_if_admin(){
		$this->db->where('id', $this->session->userdata('id'));
		$res = $this->db->get('user_accounts')->row();
		if($res->type == 'admin'){
			return true;
		}else{
			return false;
		}
	}

}

?>