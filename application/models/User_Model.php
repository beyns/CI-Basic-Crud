<?php

class User_Model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function add_data($raw_data = [])
    {
        unset($raw_data['confirm-password']);

        $raw_data['password'] = sha1($raw_data['password']);
        
        $data = $raw_data;
        
        if($this->db->insert('users', $data)) {
            return true;
        }
        return false;
    }

    public function get_user_by_id($id)
    {
        $data = $this->db->get_where('users', array('id' => $id));
        return $data->row_array();
    }


    public function update($data = [])
    {
        // $data = array(
        //     'firstname' => $this->input->post('firstname'),
        //     'lastname' => $this->input->post('lastname'),
        //     'email' => $this->input->post('email'),
        //     'password' => sha1($this->input->post('password')),
        // );

        $id = $data['id'];
        
        $query = $this->db->where('id',$id);

        if($this->db->update('users', $data)) {
            return true;
        }
        return false;

    }

    public function remove($id)
    {
        
        $this->db->where('id',$id);
         return $this->db->delete('users');
    }
}