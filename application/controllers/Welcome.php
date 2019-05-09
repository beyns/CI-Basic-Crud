<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_Model' => 'users']);
    }

    public function index()
    {
		$this->load->library('session');

		//restrict users to go to home if not logged in
		// if($this->session->userdata('users')){
			$this->load->view('index');
		// }
		// else{
		// 	redirect('login');
		// }
	}
	public function remove()
    {
        $this->user_m->remove();
        $this->create();

    }
}
