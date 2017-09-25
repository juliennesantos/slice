<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'typeID' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'null' => false,
                                'auto_increment' => TRUE
                        ),
                        'userType' => array(
                                'type' => 'VARCHAR',
                                'null' => FALSE,
                                'constraint' => 25,
                        ),

                ));
                $this->dbforge->add_key('typeID', TRUE);
                $this->dbforge->create_table('usertypes');
        }

        public function down()
        {
                $this->dbforge->drop_table('usertypes');
        }
}