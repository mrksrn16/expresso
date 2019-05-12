<?php
class User_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//Loaded helpers,libraries,models
		$this->load->model('M_User');
		$this->load->model('M_Positions');
		$this->load->model('M_Employees');
		// $this->load->model('M_Jobs');

		//Login Check
		$exception_uris = array(
			'user/login',
			'user/logout',
			);
			if(in_array(uri_string(), $exception_uris) == FALSE)
			{
				if($this->M_User->loggedin() == FALSE)
				{
					redirect('user/login');
				}
		}
	}
}
?>