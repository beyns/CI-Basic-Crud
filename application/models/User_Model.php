<?php

class User_Model extends CI_Model
{

    public function get_all()
    {
      
        $query = $this->db->get('users');
        return $query->result_array();

    }

    public function add_data($raw_data = [])
    {
        unset($raw_data['confirm-password']);

        //  print_r($raw_data['password'] );
        //  die();
        // $raw_data['password'] = sha1($raw_data['password']);
        
        
        $data = $raw_data;
        
        $data['password'] = sha1($raw_data['password']);

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

        unset($data['confirm-password']);
        unset($data['changePass']);
        $data['password'] = sha1($data['password']);
        
        $id = $data['id'];
        
        
        $this->db->where('id',$data['id']);

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

    public function countAll()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

/**
* Build the datatable's base query.
* @param string $sort_col [description]
* @param string $sort_dir [description]
* @param string $search_value [description]
* @param boolean $headers_only [description]
* @param boolean $raw [description] 
*/

private function _getDataTableUser($sort_col = 'u.lastname', $sort_dir = 'ASC', $search_value = "", $headers_only = FALSE, $raw = FALSE)
{
$search_cols = array(
"u.firstname" => $search_value,
"u.id" => $search_value,
"u.lastname" => $search_value,
"u.email" => $search_value,
);



$this->db->select(
"u.*"
);
$this->db->from("users AS u");

// $this->db->where("u.is_active != '3'", NULL, false);
// $this->db->where('u.created_by', $this->session->user_id);


$this->db->group_start();
$this->db->or_like($search_cols);
$this->db->group_end();
$this->db->order_by($sort_col, $sort_dir);

}

/**
* Get the results, with limit and offset.
* @param integer $limit [description]
* @param integer $offset [description]
* @param string $sort_col [description]
* @param string $sort_dir [description]
* @param string $search_value [description]
* @param boolean $headers_only [description]
* @param boolean $raw [description]
* @return array [description]
*/
public function getUserDatatable($limit = 10, $offset = 0, $sort_col = 'u.lastname', $sort_dir = 'ASC', $search_value = "", $headers_only = FALSE, $raw = FALSE)
{
$this->_getDataTableUser($sort_col, $sort_dir, $search_value, $headers_only, $raw);
if($limit != -1)
$this->db->limit($limit, $offset);
$query = $this->db->get();

if($raw) return $query;

if($headers_only === TRUE)
{
return $query->list_fields();
}
else
{
if($query->num_rows() > 0)
{
return $query->result_array();
}
else
{
return array();
}
}
}

/**
* Get the total count using the previous query. Runs without the limit tag.
* @param string $section_class [description]
* @param boolean $raw [description]
* @return [type] [description]
*/
public function datatable_count_all($sort_col = 's.lastname', $sort_dir = 'ASC', $search_value = "", $headers_only = FALSE, $raw = FALSE)
{
$this->_getDataTableUser($sort_col, $sort_dir, $search_value, $headers_only, $raw);

return $this->db->count_all_results();
}

/**
* Get the filtered count using the previous query. Runs without the limit tag.
* @param [type] $sort_col [description]
* @param [type] $sort_dir [description]
* @param [type] $search_value [description]
* @param boolean $headers_only [description]
* @param boolean $raw [description]
* @return integer returns the number of rows of the searched value without the limit
*/
public function datatable_count_filtered($sort_col = 's.lastname', $sort_dir = 'ASC', $search_value = "", $headers_only = FALSE, $raw = FALSE)
{
$this->_getDataTableUser($sort_col, $sort_dir, $search_value, $headers_only, $raw);

$query = $this->db->get();

return $query->num_rows();
}

}