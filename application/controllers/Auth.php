<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_Model' => 'login_m']);

    }

    public function index()
    {
        if ($this->session_userdata('users')) {
            redirect('welcome');
        }
        else {
            $this->load->view('auth/login');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');    
        }
        else {
            $data = $this->login_m->validate_login($email,$password);
            if ($data) {
                
                $this->session->set_userdata('users',$data);
                redirect('welcome');
            }
            else
            {
                $this->session->set_flashdata('error','<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Invalid login!</strong>User not found  <a href="user/create" class="alert-link">Please Create your account</a> and try submitting again.
            </div> ');
            redirect('login');

            }
        }
    }

    public function logout()
    {
		$this->session->unset_userdata('users');
		redirect('login');
    }
}