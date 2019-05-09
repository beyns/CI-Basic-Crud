<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

// You can find dbforge usage examples here: http://ellislab.com/codeigniter/user-guide/database/forge.html


class Migration_Create_users_table extends CI_Migration
{
    public function __construct()
	{
	    parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
	    $fields = array(
            'id' => array(
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment' => TRUE
            ),
            'firstname' => array(
                'type'=>'VARCHAR',
                'constraint'=>100
            ),
            'lastname' => array(
                'type'=>'VARCHAR',
                'constraint'=>100
            ),
            'email' => array(
                'type'=>'VARCHAR',
                'constraint'=>255
            ),
            'password' => array(
                'type'=>'VARCHAR',
                'constraint'=>100
            ),
            'blogs' => array(
                'type'=>'INT',
                'constraint'=>10
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users', TRUE);
    }

	public function down()
	{
	    $this->dbforge->drop_table('users', TRUE);
    }
}
/* End of file '20150804110007_create_users_table' */
/* Location: ./D:\Dropbox\server\CodeIgniter-MY_Model\application\migrations/20150804110007_create_users_table.php */
