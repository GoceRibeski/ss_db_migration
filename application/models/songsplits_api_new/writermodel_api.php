<?php

class WriterModel_api extends CI_Model {

    /**
     * MODULE NAME   : WriterModel_api.php
     *
     * DESCRIPTION   : Writer model controller
     *
     * MODIFICATION HISTORY
     *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
     *
     * @package             writer
     * @subpackage          Writer model component Class
     * @author              Pradesh Chanderpaul
     * @copyright           Copyright (c) 2006-2007 DataCraft Software
     * @license             http://www.datacraft.co.za/codecrafter/license.html
     * @link                http://www.datacraft.co.za/codecrafter/
     * @since               Version 1.0
     * @filesource
     */
    var $table_record_count;
    var $user_id;
    var $writer_id;
    var $society_id;
    var $cae_ipi;
    var $cae_ipi_2;
    var $cae_ipi_3;
    var $realtime_email;
    var $weekly_email;
    var $promo_email;
    var $manager_control;
    var $manager_notify;
    var $manager_view;
    var $attorney_control;
    var $attorney_notify;
    var $attorney_view;
    var $publisher_control;
    var $publisher_notify;
    var $publisher_view;

    function __construct() {

        // ///////////////////////////////////////////////////////////////////////
        // NOTE: Load database libraries and other libraries and helpers. The
        // NOTE: ...generated code loads the database library as it requires it,
        // NOTE: ...but you may prefer to load here or autoload, In this case
        // NOTE: ...remember to delete all explicit load()s.
        // ///////////////////////////////////////////////////////////////////////
        // Initialise or clear class variables.
        // NOTE: Not particularly useful unless you are using model persistence
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
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
//      return $this->find(array('writer_id' => '$key_value'));
//   }

    function findByFilter($filter_rules, $start = NULL, $count = NULL) {
        return $this->find($filter_rules, $start, $count);
    }

    function find($filters = NULL, $start = NULL, $count = NULL) {

        $results = array();

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        
        // ///////////////////////////////////////////////////////////////////////
        // Make a note of the current table record count
        // ///////////////////////////////////////////////////////////////////////
        $this->table_record_count = $this->db_songsplits_api_new->count_all('writer');

//                   echo '<pre>';
//            print_r($start);
//            echo '<pre>';
//            echo '<pre>';
//            print_r($count);
//            echo '<pre>';
//            die(__FILE__.__LINE__);

        $this->db_songsplits_api_new->limit($count, $start);
        // ///////////////////////////////////////////////////////////////////////
        // NOTE: If you want the results ordered by a specific field, do it here.
        // ///////////////////////////////////////////////////////////////////////
        // $this->db_songsplits_api_new->orderby();

        $query = $this->db_songsplits_api_new->get('writer');

        if ($query->num_rows() > 0) {
            // return $query->result_array();
            foreach ($query->result_array() as $row) {      // Go through the result set
                // Build up a list for each column from the database and place it in
                // ...the result set

                $query_results['user_id'] = $row['user_id'];
                $query_results['writer_id'] = $row['writer_id'];
                $query_results['society_id'] = $row['society_id'];
                $query_results['cae_ipi'] = $row['cae_ipi'];
                $query_results['cae_ipi_2'] = $row['cae_ipi_2'];
                $query_results['cae_ipi_3'] = $row['cae_ipi_3'];
                $query_results['realtime_email'] = $row['realtime_email'];
                $query_results['weekly_email'] = $row['weekly_email'];
                $query_results['promo_email'] = $row['promo_email'];
                $query_results['manager_control'] = $row['manager_control'];
                $query_results['manager_notify'] = $row['manager_notify'];
                $query_results['manager_view'] = $row['manager_view'];
                $query_results['attorney_control'] = $row['attorney_control'];
                $query_results['attorney_notify'] = $row['attorney_notify'];
                $query_results['attorney_view'] = $row['attorney_view'];
                $query_results['publisher_control'] = $row['publisher_control'];
                $query_results['publisher_notify'] = $row['publisher_notify'];
                $query_results['publisher_view'] = $row['publisher_view'];

                $results[] = $query_results;
            }
        }

        return $results;
    }

    // TODO: this won't be possible if there is no primary key for the table.
    function retrieve_by_pkey($idField) {

        $results = array();

        // Load  the db library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->where('writer_id', "$idField");
        $this->db_songsplits_api_new->limit(1);
        $query = $this->db_songsplits_api_new->get('writer');


        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $query_results['user_id'] = $row['user_id'];
            $query_results['writer_id'] = $row['writer_id'];
            $query_results['society_id'] = $row['society_id'];
            $query_results['cae_ipi'] = $row['cae_ipi'];
            $query_results['cae_ipi_2'] = $row['cae_ipi_2'];
            $query_results['cae_ipi_3'] = $row['cae_ipi_3'];
            $query_results['realtime_email'] = $row['realtime_email'];
            $query_results['weekly_email'] = $row['weekly_email'];
            $query_results['promo_email'] = $row['promo_email'];
            $query_results['manager_control'] = $row['manager_control'];
            $query_results['manager_notify'] = $row['manager_notify'];
            $query_results['manager_view'] = $row['manager_view'];
            $query_results['attorney_control'] = $row['attorney_control'];
            $query_results['attorney_notify'] = $row['attorney_notify'];
            $query_results['attorney_view'] = $row['attorney_view'];
            $query_results['publisher_control'] = $row['publisher_control'];
            $query_results['publisher_notify'] = $row['publisher_notify'];
            $query_results['publisher_view'] = $row['publisher_view'];

            $results = $query_results;
        } else {
            $results = false;
        }

        return $results;
    }

    function add($data) {


        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->insert('writer', $data);

        return $this->db_songsplits_api_new->insert_id();
    }

    function modify($keyvalue, $data) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->where('writer_id', $keyvalue);
        $this->db_songsplits_api_new->update('writer', $data);
    }

    function delete_by_pkey($idField) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        // Load  the db library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // ///////////////////////////////////////////////////////////////////////
        // TODO: Just to eliminate nasty mishaps, the delete query has been
        // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
        // TODO: ...the database calls below
        // ///////////////////////////////////////////////////////////////////////
        // $this->db_songsplits_api_new->where('writer_id', $idField);
        // $this->db_songsplits_api_new->delete('writer');

        return true;
    }

    function get_User_id() {
        return $this->user_id;
    }

    function set_User_id($user_id) {
        $this->user_id = $user_id;
    }

    function get_Writer_id() {
        return $this->writer_id;
    }

    function set_Writer_id($writer_id) {
        $this->writer_id = $writer_id;
    }

    function get_Society_id() {
        return $this->society_id;
    }

    function set_Society_id($society_id) {
        $this->society_id = $society_id;
    }

    function get_Cae_ipi() {
        return $this->cae_ipi;
    }

    function set_Cae_ipi($cae_ipi) {
        $this->cae_ipi = $cae_ipi;
    }

    function get_Cae_ipi_2() {
        return $this->cae_ipi_2;
    }

    function set_Cae_ipi_2($cae_ipi_2) {
        $this->cae_ipi_2 = $cae_ipi_2;
    }

    function get_Cae_ipi_3() {
        return $this->cae_ipi_3;
    }

    function set_Cae_ipi_3($cae_ipi_3) {
        $this->cae_ipi_3 = $cae_ipi_3;
    }

    function get_Realtime_email() {
        return $this->realtime_email;
    }

    function set_Realtime_email($realtime_email) {
        $this->realtime_email = $realtime_email;
    }

    function get_Weekly_email() {
        return $this->weekly_email;
    }

    function set_Weekly_email($weekly_email) {
        $this->weekly_email = $weekly_email;
    }

    function get_Promo_email() {
        return $this->promo_email;
    }

    function set_Promo_email($promo_email) {
        $this->promo_email = $promo_email;
    }

    function get_Manager_control() {
        return $this->manager_control;
    }

    function set_Manager_control($manager_control) {
        $this->manager_control = $manager_control;
    }

    function get_Manager_notify() {
        return $this->manager_notify;
    }

    function set_Manager_notify($manager_notify) {
        $this->manager_notify = $manager_notify;
    }

    function get_Manager_view() {
        return $this->manager_view;
    }

    function set_Manager_view($manager_view) {
        $this->manager_view = $manager_view;
    }

    function get_Attorney_control() {
        return $this->attorney_control;
    }

    function set_Attorney_control($attorney_control) {
        $this->attorney_control = $attorney_control;
    }

    function get_Attorney_notify() {
        return $this->attorney_notify;
    }

    function set_Attorney_notify($attorney_notify) {
        $this->attorney_notify = $attorney_notify;
    }

    function get_Attorney_view() {
        return $this->attorney_view;
    }

    function set_Attorney_view($attorney_view) {
        $this->attorney_view = $attorney_view;
    }

    function get_Publisher_control() {
        return $this->publisher_control;
    }

    function set_Publisher_control($publisher_control) {
        $this->publisher_control = $publisher_control;
    }

    function get_Publisher_notify() {
        return $this->publisher_notify;
    }

    function set_Publisher_notify($publisher_notify) {
        $this->publisher_notify = $publisher_notify;
    }

    function get_Publisher_view() {
        return $this->publisher_view;
    }

    function set_Publisher_view($publisher_view) {
        $this->publisher_view = $publisher_view;
    }

    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You may want to add default values here.
    function _init_Writer() {
        $this->user_id = "";
        $this->writer_id = "";
        $this->society_id = "";
        $this->cae_ipi = "";
        $this->cae_ipi_2 = "";
        $this->cae_ipi_3 = "";
        $this->realtime_email = "";
        $this->weekly_email = "";
        $this->promo_email = "";
        $this->manager_control = "";
        $this->manager_notify = "";
        $this->manager_view = "";
        $this->attorney_control = "";
        $this->attorney_notify = "";
        $this->attorney_view = "";
        $this->publisher_control = "";
        $this->publisher_notify = "";
        $this->publisher_view = "";
    }

    // Initialize all your default variables here
    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You could add default values here, but fields are generally set empty
    function _emptyWriter() {
        $this->user_id = "";
        $this->writer_id = "";
        $this->society_id = "";
        $this->cae_ipi = "";
        $this->cae_ipi_2 = "";
        $this->cae_ipi_3 = "";
        $this->realtime_email = "";
        $this->weekly_email = "";
        $this->promo_email = "";
        $this->manager_control = "";
        $this->manager_notify = "";
        $this->manager_view = "";
        $this->attorney_control = "";
        $this->attorney_notify = "";
        $this->attorney_view = "";
        $this->publisher_control = "";
        $this->publisher_notify = "";
        $this->publisher_view = "";
    }
    
    //old
    function migrate_writer_to_writer($the_results) {
        die('old');

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

//      live.writer	api.writer
//      	
//	writer_id	writer_id
//	NEW		user_id
//	society_id	society_id
//	ipi		cae_ipi
//	NEW		cae_ipi_2
//	NEW		cae_ipi_3
//	notification	realtime_email
//	notification	weekly_email
//	NEW		promo_email
//	notifiy_manager	manager_notify
//	NEW		manager_view
//	manager_authorized	manager_control
//	notifiy_attorney	attorney_notify
//	NEW		attorney_view
//	attorney_authorized	attorney_control
//	NEW		publisher_notify
//	NEW		publisher_view
//	NEW		publisher_control   

        foreach ($the_results['writer_list'] as $read_live) {
            $insert_api['writer_id'] = $read_live['writer_id'];

            //new $insert_api['user_id']        = $read_live[''];
            //live.writer.u_id to api.writer.user_id is not defined in the docs, 
            //I dod not map u_id. 
            //There are lot of u_id IS NULL in the live DB. Leve this for later
            //But it can be done with:
            //new $insert_api['user_id']        = $read_live['u_id'];

            $insert_api['society_id'] = $read_live['society_id'];

            $insert_api['cae_ipi'] = $read_live['ipi'];
            //$insert_api['cae_ipi_2']          = $read_live[''];
            //$insert_api['cae_ipi_3']          = $read_live[''];

            $insert_api['realtime_email'] = ($read_live['notification']) ? 'on' : 'off';

            //$insert_api['weekly_email']       = $read_live['notification'];
            $insert_api['weekly_email'] = ($read_live['notification']) ? 'on' : 'off';

            //$insert_api['promo_email']        = $read_live[''];
            //$insert_api['manager_notify']     = $read_live['notifiy_manager'];
            $insert_api['manager_notify'] = ($read_live['notifiy_manager']) ? 'on' : 'off';

            //$insert_api['manager_view']       = $read_live[''];
            //$insert_api['manager_control']    = $read_live['manager_authorized'];
            $insert_api['manager_control'] = ($read_live['manager_authorized']) ? 'on' : 'off';


            //$insert_api['attorney_notify']	= $read_live['notifiy_attorney'];
            $insert_api['attorney_notify'] = ($read_live['notifiy_attorney']) ? 'on' : 'off';

            //$insert_api['attorney_view']	= $read_live[''];
            //$insert_api['attorney_control']	= $read_live['attorney_authorized'];
            $insert_api['attorney_control'] = ($read_live['attorney_authorized']) ? 'on' : 'off';

            //$insert_api['publisher_notify']	= $read_live[''];
            //$insert_api['publisher_view']	= $read_live[''];
            //$insert_api['publisher_control']  = $read_live[''];
//            echo '<pre>';
//            print_r($insert_api);
//            echo '<pre>';
//            die(__FILE__.__LINE__);

            $this->add($insert_api);
        }
    }

    
    //    Migrate live.a_writer_name to api.writer
    //    Migrate live.a_writer_name to api.user
    //    Api.user -(1:1)- api.writer
    function migrate_a_writer_name_to_writer($the_results) {
        
        

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);


        
//        echo '<pre>';
//        print_r($the_results);
//        die(__FILE__.__LINE__);
               


        foreach ($the_results['writer_list'] as $read_live) {
            
            
            //add the data to tbl.api.writer
            $insert_api_writer_data['writer_id'] = $read_live['ida_writer_name'];
            $insert_api_writer_data['user_id']   = $read_live['ida_writer_name'];
            // insert
            $this->add($insert_api_writer_data);
            
            
            //add the data to tbl.api.user ... legal_name
            $insert_api_user_data['user_id']     = $read_live['ida_writer_name'];
            $insert_api_user_data['legal_name']  = $read_live['full_name'];

            $this->db_songsplits_api_new->insert('user', $insert_api_user_data);

        }
    }

}
