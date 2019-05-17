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
        // $data =['users' => $this->user_m->get_all(), 'msg' => 'hello'
        // ] ;

         $this->load->view('user/index');
       
    }


    // public function userTable()
    // {
    //     $data =['result' => $this->user_m->get_all()
    //     ] ;

    //     echo json_encode($data);
    // }

    
public function userTable()
{
header('Content-Type: application/json');
$users_dataTables = $this->input->post(NULL, TRUE);

if(!empty($users_dataTables))
{
$draw = $users_dataTables['draw'];
$offset = (empty($users_dataTables['start'])) ? 0 : $users_dataTables['start'];
$limit = (empty($users_dataTables['length'])) ? 10 : $users_dataTables['length'];
$filter_value = (empty($users_dataTables['search']['value'])) ? "" : trim($users_dataTables['search']['value']);
$sort_col_num = (int)(!isset($users_dataTables['order']) && empty($users_dataTables['order'][0]['column'])) ? 0 : $users_dataTables['order'][0]['column'];
$sort_col	= '';
$sort_dir = (!isset($users_dataTables['order']) && empty($users_dataTables['order'][0]['dir'])) ? 'ASC' : $users_dataTables['order'][0]['dir'];
$columns = array();

foreach($users_dataTables['columns'] as $key => $val)
{
switch ($val['data']) {
case 'id':
case 'firstname':
case 'lastname':
case 'email':
$columns[$key] = 'u.'.$val['data'];
break;
default:
$columns[$key] = $val['data'];
break;
}
}

$sort_col = $columns[$sort_col_num];

$users = $this->user_m->getUserDatatable($limit, $offset, $sort_col, $sort_dir, $filter_value);

$result = array(
"data" => $users,
"recordsTotal" => $this->user_m->datatable_count_all('u.lastname', 'ASC', ""),
"recordsFiltered" => $this->user_m->datatable_count_filtered($sort_col, $sort_dir, $filter_value),
"draw" => (integer) $users_dataTables['draw'],
// 'form_token_name' => $new_form_token_name,
// 'form_token_hash' => $new_form_token_val,
'sorted_col' => $sort_col,
'columns' => $columns
);

echo json_encode($result);
}
else
{
$result = array(
"data" => array(),
"recordsTotal" => 0,
"recordsFiltered" => 0,
"draw" => (integer) $this->input->post('draw')
);

echo json_encode($result);
}
}

    public function create()
    {
        $this->load->view('user/create');
    }

    public function add()
    {
            // print_r($this->input->post());
            // die();
                $this->form_validation->set_rules('firstname', 'Firstname', 'required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|required|matches[password]');


                $new_email =  $this->input->post('email');

                $data = $this->input->post();
                $status_code = '200';

                $response = array('status' => $status_code = 200, 'message' => $new_email.' successfully added.' );


                if ($this->form_validation->run() == FALSE) { //failed
                    // print_r(validation_errors());
                    // die();
                    $status_code = 401;
                    $response = array('status' => $status_code, 'message' => validation_errors() );

                    return $this->output
                    ->set_status_header($status_code)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
                }
                else
                {

                    if($this->user_m->add_data($data)){

                        return $this->output
                        // ->set_header('HTTP/1.1 200 OK')
                        // ->set_status_header($status_code)
                        // ->set_content_type('application/json')
                        ->set_output(json_encode($response, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));


                    }

           }

    }

    public function getUser()
    {
       $id = $this->input->post('id');
       $data =  $this->user_m->get_user_by_id($id);

       echo json_encode($data);
    }

    public function update()
    {


        $new_pass = $this->input->post('changePass');

        if ($new_pass  == '') {
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
        }
        else {
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'trim|required|matches[password]');
        }
        $status_code = '200';
        $response = array('status' => $status_code = 200, 'message' => 'Update successfully' );

        if ($this->form_validation->run() == FALSE) {

            $status_code = 401;
            $response = array('status' => $status_code, 'message' => validation_errors() );

            return $this->output
            ->set_status_header($status_code)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
        }
        else {

            $data = $this->input->post();

            $result = $this->user_m->update($data);
            if($result){
                 return $this->output
                        ->set_header('HTTP/1.1 200 OK')
                        ->set_status_header($status_code)
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
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


            if ($id == $result_id) //inupdate ibang field maliban s sariling email
            {
                
                return TRUE;
                    
            }
            elseif ( $result_id == NULL) //inupdate ibang field maliban s sariling email
            {

                return TRUE;
                    
            }
             else
             {
                 $this->form_validation->set_message('email_check', 'Email is already taken');
                 return FALSE;
                    
             }
    }

    public function remove()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $this->user_m->remove($id);


    }

}