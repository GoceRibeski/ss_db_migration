<?php

class AdminModel extends CI_Model {

    /**
     * MODULE NAME   : adminmodel.php
     *
     * DESCRIPTION   : Admin model controller
     *
     * MODIFICATION HISTORY
     *   V1.0   2016-06-16 05:21 PM   - Pradesh Chanderpaul     - Created
     *
     * @package             admin
     * @subpackage          Admin model component Class
     * @author              Pradesh Chanderpaul
     * @copyright           Copyright (c) 2006-2007 DataCraft Software
     * @license             http://www.datacraft.co.za/codecrafter/license.html
     * @link                http://www.datacraft.co.za/codecrafter/
     * @since               Version 1.0
     * @filesource
     */
    var $table_record_count;
    var $admin_id;
    var $admin_name;
    var $adminParent_id;
    var $street;
    var $country;
    var $phone;
    var $email;
    var $password;
    var $last_login;

    function __construct() {

        // ///////////////////////////////////////////////////////////////////////
        // NOTE: Load database libraries and other libraries and helpers. The
        // NOTE: ...generated code loads the database library as it requires it,
        // NOTE: ...but you may prefer to load here or autoload, In this case
        // NOTE: ...remember to delete all explicit load()s.
        // ///////////////////////////////////////////////////////////////////////
        // Initialise or clear class variables.
        // NOTE: Not particularly useful unless you are using model persistence
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
        parent::__construct();
    }

    // //////////////////////////////////////////////////////////////////////////
    // Function: findAll()
    //
   // Description: Retrieves and returns data listing from the database
    //
   // //////////////////////////////////////////////////////////////////////////
    function findAll($start = NULL, $count = NULL) {
        return $this->find(NULL, $start, $count);
    }

//   function findById($key_value) {
//      return $this->find(array('admin_id' => '$key_value'));
//   }

    function findByFilter($filter_rules, $start = NULL, $count = NULL) {
        return $this->find($filter_rules, $start, $count);
    }

    function find($filters = NULL, $start = NULL, $count = NULL) {

        $results = array();

        // Load the database library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        // ///////////////////////////////////////////////////////////////////////
        // Make a note of the current table record count
        // ///////////////////////////////////////////////////////////////////////
        $this->table_record_count = $this->db_songsplits_live->count_all('admin');


        // Filter could be an array or filter values or an SQL string.
        $where_clause = '';
        if ($filters) {
            if (is_string($filters)) {
                $where_clause = $filters;
            } elseif (is_array($filters)) {
                // Build your filter rules
                // ///////////////////////////////////////////////////////////////////////
                // NOTE: There are many ways to build the select code. (For example, you
                // NOTE: ...just pass the $filters array to where() like:
                // NOTE: ...   $this->db_songsplits_live->where($filters);
                // NOTE: ...instead of the foreach loop below. However, it's added to
                // NOTE: ...allow further customisation.
                // ///////////////////////////////////////////////////////////////////////
                if (count($filters) > 0) {
                    foreach ($filters as $field => $value) {
                        $this->db_songsplits_live->where($field, $value);
                    }
                }
            }
        }

        if ($start) {
            if ($count) {
                $this->db_songsplits_live->limit($start, $count);
            } else {
                $this->db_songsplits_live->limit($start);
            }
        }


        // ///////////////////////////////////////////////////////////////////////
        // NOTE: If you want the results ordered by a specific field, do it here.
        // ///////////////////////////////////////////////////////////////////////
        //$this->db_songsplits_live->limit( 100 );

        $query = $this->db_songsplits_live->get('admin');

        if ($query->num_rows() > 0) {
            // return $query->result_array();
            foreach ($query->result_array() as $row) {      // Go through the result set
                // Build up a list for each column from the database and place it in
                // ...the result set
                $query_results['admin_id'] = $row['admin_id'];
                $query_results['admin_name'] = $row['admin_name'];
                $query_results['adminParent_id'] = $row['adminParent_id'];
                $query_results['street'] = $row['street'];
                $query_results['country'] = $row['country'];
                $query_results['phone'] = $row['phone'];
                $query_results['email'] = $row['email'];
                $query_results['password'] = $row['password'];
                $query_results['last_login'] = $row['last_login'];

                $results[] = $query_results;
            }
        }

        return $results;
    }

    // TODO: this won't be possible if there is no primary key for the table.
    function retrieve_by_pkey($idField) {

        $results = array();

        // Load  the db library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->db_songsplits_live->where('admin_id', "$idField");
        $this->db_songsplits_live->limit(1);
        $query = $this->db_songsplits_live->get('admin');


        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $query_results['admin_id'] = $row['admin_id'];
            $query_results['admin_name'] = $row['admin_name'];
            $query_results['adminParent_id'] = $row['adminParent_id'];
            $query_results['street'] = $row['street'];
            $query_results['country'] = $row['country'];
            $query_results['phone'] = $row['phone'];
            $query_results['email'] = $row['email'];
            $query_results['password'] = $row['password'];
            $query_results['last_login'] = $row['last_login'];

            $results = $query_results;
        } else {
            $results = false;
        }

        return $results;
    }

    function retrieve_by_field_a_admin($field, $value) {


        $results = array();

        // Load  the db library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->db_songsplits_live->where($field, "$value");
        $this->db_songsplits_live->limit(1);
        $query = $this->db_songsplits_live->get('a_admin');


        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $query_results['ida_admin'] = $row['ida_admin'];
            $query_results['admin_id'] = $row['admin_id'];
            $query_results['api_user_insert_id'] = $row['api_user_insert_id'];

            $results = $query_results;
        } else {
            $results = false;
        }

        return $results;
    }

    function add($data) {

        // Load the database library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->db_songsplits_live->insert('admin', $data);

        return $this->db_songsplits_live->insert_id();
    }

    function modify($keyvalue, $data) {

        // Load the database library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->db_songsplits_live->where('admin_id', $keyvalue);
        $this->db_songsplits_live->update('admin', $data);
    }

    function delete_by_pkey($idField) {
        // Load  the db library
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        // ///////////////////////////////////////////////////////////////////////
        // TODO: Just to eliminate nasty mishaps, the delete query has been
        // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
        // TODO: ...the database calls below
        // ///////////////////////////////////////////////////////////////////////
        // $this->db_songsplits_live->where('admin_id', $idField);
        // $this->db_songsplits_live->delete('admin');

        return true;
    }

    function get_Admin_id() {
        return $this->admin_id;
    }

    function set_Admin_id($admin_id) {
        $this->admin_id = $admin_id;
    }

    function get_Admin_name() {
        return $this->admin_name;
    }

    function set_Admin_name($admin_name) {
        $this->admin_name = $admin_name;
    }

    function get_AdminParent_id() {
        return $this->adminParent_id;
    }

    function set_AdminParent_id($adminParent_id) {
        $this->adminParent_id = $adminParent_id;
    }

    function get_Street() {
        return $this->street;
    }

    function set_Street($street) {
        $this->street = $street;
    }

    function get_Country() {
        return $this->country;
    }

    function set_Country($country) {
        $this->country = $country;
    }

    function get_Phone() {
        return $this->phone;
    }

    function set_Phone($phone) {
        $this->phone = $phone;
    }

    function get_Email() {
        return $this->email;
    }

    function set_Email($email) {
        $this->email = $email;
    }

    function get_Password() {
        return $this->password;
    }

    function set_Password($password) {
        $this->password = $password;
    }

    function get_Last_login() {
        return $this->last_login;
    }

    function set_Last_login($last_login) {
        $this->last_login = $last_login;
    }

    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You may want to add default values here.
    function _init_Admin() {
        $this->admin_id = "";
        $this->admin_name = "";
        $this->adminParent_id = "";
        $this->street = "";
        $this->country = "";
        $this->phone = "";
        $this->email = "";
        $this->password = "";
        $this->last_login = "";
    }

    // Initialize all your default variables here
    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You could add default values here, but fields are generally set empty
    function _emptyAdmin() {
        $this->admin_id = "";
        $this->admin_name = "";
        $this->adminParent_id = "";
        $this->street = "";
        $this->country = "";
        $this->phone = "";
        $this->email = "";
        $this->password = "";
        $this->last_login = "";
    }

//1.Migrate live.admin TO api.user AND live.a_admin(new helper table)
//  AND to api.administrator, Administration,Publisher
//  live.a_admin.api_user_insert_id is insert ID when live.admins are inserted in api.user
    function migrate_admin_to_api_user_and_live_a_admin() {


        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/adminmodel', 'adminmodel_live');


        $the_results['admin_list'] = $this->adminmodel_live->find();  // Send the retrievelist msg



        $this->load->model('songsplits_api_new/administratormodel', 'administratormodel_api');
        $this->administratormodel_api->migrate_admin_to_api_user_and_live_a_admin($the_results);

        echo '<pre>';
        //print_r($start);
        echo '<pre>';
        //print_r($count_all);
        echo '<pre>';
        //print_r($the_results);
        echo '<pre>';
        //print_r($the_results);
        echo '<pre>';
        die(__FILE__ . __LINE__);
    }

    function migrate_admin_contact_to_api_user() {


        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/admin_contactmodel', 'admin_contact_live');


        $the_results['admin_contact_list'] = $this->admin_contact_live->find();  // Send the retrievelist msg



        $this->load->model('songsplits_api_new/administratormodel', 'administratormodel_api');
        $this->administratormodel_api->migrate_admin_contact_to_api_user($the_results);

        echo '<pre>';
        //print_r($start);
        echo '<pre>';
        //print_r($count_all);
        echo '<pre>';
        //print_r($the_results);
        echo '<pre>';
        //print_r($the_results);
        echo '<pre>';
        die(__FILE__ . __LINE__);
    }

    function add_live_administration_company_name_as_api_users_publishers() {



        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/administrationmodel', 'administration_live');


        $the_results['administration_list'] = $this->administration_live->find();  // Send the retrievelist msg



        $this->load->model('songsplits_api_new/administratormodel', 'administratormodel_api');
        $this->administratormodel_api->add_live_administration_company_name_as_api_users_publishers($the_results);
    }

    function live_administration_to_api_publisher_split() {

        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/administrationmodel', 'administration_live');


        $the_results['administration_list'] = $this->administration_live->find();  // Send the retrievelist msg



        $this->load->model('songsplits_api_new/administratormodel', 'administratormodel_api');
        $this->administratormodel_api->live_administration_to_api_publisher_split($the_results);
    }

    function live_administration_to_api_publisher_split_2() {

        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/administrationmodel', 'administration_live');


        $the_results['administration_list'] = $this->administration_live->find();  // Send the retrievelist msg



        $this->load->model('songsplits_api_new/administratormodel', 'administratormodel_api');
        $this->administratormodel_api->live_administration_to_api_publisher_split_2($the_results);
    }

}
