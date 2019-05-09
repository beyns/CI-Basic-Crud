<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_Model' => 'user_m']);

    }

    public function index()
    {
        $data=['users' => $this->user_m->get_all(),
                'msg'=> $this->session->flashdata('msg','Success')
                ];
        $this->load->view('user/view',$data);
    }

    public function create()
    {
        $this->load->view('user/create');    
    }

    public function add()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|required|matches[password]');

         if ($this->form_validation->run() == FALSE) { //failed
              $this->load->view('user/create');    
         }
          else
          {
              $new_email =  $this->input->post('email');

              $data = $this->input->post();
            
              $insert  =$this->user_m->add_data($data);
             if($insert){
                 $this->session->set_flashdata('success','<div class="alert alert-dismissible alert-success">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 Well done! <strong> '. $new_email .'</strong> successfully Added.<a href="login" class="alert-link">Login Here</a></a>.
               </div>');
                 redirect('user/create');
             }
          }
        
    }

    public function edit($id)
    {
       $data['users']  =  $this->user_m->get_user_by_id($id);
        $this->load->view('user/edit',$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
           $this->edit($id);
            // die('failed');
        }
        else {
            
            $data = $this->input->post();

            $result = $this->user_m->update($data);
            if($result){
                redirect('user');
            }
        }
       

    }
    public function email_check($str)
    {
        $id = $this->input->post('id');
        $result = $this->db->get_where('users', array('email' => $str));
        // if ($result->num_rows > 0) {
            
            $result_id = $result->row('id');

            # code...
        // }
            if ($id == $result_id) // inupdate ibang field maliban s sariling email
            {
                // $result = $this->db->get_where('users', array('email' => $str)); 
                // $result_id = $result->row('id');
                // if ($str == $result_id)
                // {

                // }
                // die('test');
                return TRUE;
                    
            }
            else
            {
                $this->form_validation->set_message('email_check', 'Email is already taken');
                return FALSE;
                    
            }
    }

    public function remove($id)
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $this->user_m->remove($id);
        // $this->index();
        $this->session->set_flashdata('item','<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>'. $email .'</strong> successfully Remove</a>.
      </div>');
        redirect('user');

    }

}