<?php 
class M_Employees extends MY_Model
{

	protected $_table_name = 'employees';
	protected $_primary_key = 'id';
	function __construct()
	{
		parent::__construct();
	}
	public function get_all(){
		return $this->db->get($this->_table_name)->result();
	}
	public function get_employee($id){
		$this->db->where('id', $id);
		return $this->db->get($this->_table_name)->row();	
	}
	public function search($search){
		 $this->db->like('name', $search);
         $this->db->or_like('contact', $search);
         $this->db->or_like('email', $search);
         $this->db->or_like('dob', $search);
         $this->db->or_like('address', $search);
         $this->db->or_like('gender', $search);
         $this->db->or_like('tin', $search);
         $this->db->or_like('sss', $search);
         $this->db->or_like('hdmf', $search);
         $this->db->or_like('philhealth', $search);
         $this->db->or_like('dependents', $search);
         $this->db->or_like('employment_status', $search);
         $query = $this->db->get($this->_table_name);
         return $query->result();
	}
	public function get_position_salary($employee_id){
		$this->db->where('id', $employee_id);
        $usr = $this->db->get('employees')->row();
        $this->db->where('position_id', $usr->position);
        $res = $this->db->get('position_salary')->row();
        return $res;
	}
}

?>