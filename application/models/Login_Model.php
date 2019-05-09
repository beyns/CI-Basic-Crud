<?php

class Login_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function validate_login($email, $password)
    {
      $data = $this->db->get_where('users', array('email' => $email, 'password' =>$password));
      return $data->row_array();

    }
}