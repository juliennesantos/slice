<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'userID' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => false,
                                'auto_increment' => TRUE
                        ),
                        'typeID' => array(
                                'type' => 'int',
                                'constraint' => '11',
                                'null' => FALSE,
                                'default' => 1,
                                'unsigned' => TRUE,
                        ),
                        'firstName' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 80,
                        ),
                        'lastName' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 50,
                        ),
                        'middleName' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 50,
                        ),
                        'emailAddress' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 100,
                        ),
                        'contactNo' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 15,
                        ),
                ));
                $this->dbforge->add_key('userID', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}