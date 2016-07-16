<?php

class Work_historyModel extends CI_Model {

    /**
     * MODULE NAME   : work_historymodel.php
     *
     * DESCRIPTION   : Work_history model controller
     *
     * MODIFICATION HISTORY
     *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
     *
     * @package             work_history
     * @subpackage          Work_history model component Class
     * @author              Pradesh Chanderpaul
     * @copyright           Copyright (c) 2006-2007 DataCraft Software
     * @license             http://www.datacraft.co.za/codecrafter/license.html
     * @link                http://www.datacraft.co.za/codecrafter/
     * @since               Version 1.0
     * @filesource
     */
    var $table_record_count;
    var $work_history_id;
    var $work_id;
    var $user_id;
    var $note;
    var $date_created;
    var $version;

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
//      return $this->find(array('work_history_id' => '$key_value'));
//   }

    function findByFilter($filter_rules, $start = NULL, $count = NULL) {
        return $this->find($filter_rules, $start, $count);
    }

    function find($filters = NULL, $start = NULL, $count = NULL) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $results = array();

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // ///////////////////////////////////////////////////////////////////////
        // Make a note of the current table record count
        // ///////////////////////////////////////////////////////////////////////
        $this->table_record_count = $this->db_songsplits_api_new->count_all('work_history');




        // ///////////////////////////////////////////////////////////////////////
        // NOTE: If you want the results ordered by a specific field, do it here.
        // ///////////////////////////////////////////////////////////////////////
        // $this->db_songsplits_api_new->orderby();

        $query = $this->db_songsplits_api_new->get('work_history');

        if ($query->num_rows() > 0) {
            // return $query->result_array();
            foreach ($query->result_array() as $row) {      // Go through the result set
                // Build up a list for each column from the database and place it in
                // ...the result set
                $query_results['work_history_id'] = $row['work_history_id'];
                $query_results['work_id'] = $row['work_id'];
                $query_results['user_id'] = $row['user_id'];
                $query_results['note'] = $row['note'];
                $query_results['date_created'] = $row['date_created'];
                $query_results['version'] = $row['version'];

                $results[] = $query_results;
            }
        }

        return $results;
    }

    // TODO: this won't be possible if there is no primary key for the table.
    function retrieve_by_pkey($idField) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $results = array();

        // Load  the db library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->where('work_history_id', "$idField");
        $this->db_songsplits_api_new->limit(1);
        $query = $this->db_songsplits_api_new->get('work_history');


        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $query_results['work_history_id'] = $row['work_history_id'];
            $query_results['work_id'] = $row['work_id'];
            $query_results['user_id'] = $row['user_id'];
            $query_results['note'] = $row['note'];
            $query_results['date_created'] = $row['date_created'];
            $query_results['version'] = $row['version'];

            $results = $query_results;
        } else {
            $results = false;
        }

        return $results;
    }

    function add($data) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->insert('work_history', $data);

        return $this->db_songsplits_api_new->insert_id();
    }

    function modify($keyvalue, $data) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->where('work_history_id', $keyvalue);
        $this->db_songsplits_api_new->update('work_history', $data);
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
        // $this->db_songsplits_api_new->where('work_history_id', $idField);
        // $this->db_songsplits_api_new->delete('work_history');

        return true;
    }

    function get_Work_history_id() {
        return $this->work_history_id;
    }

    function set_Work_history_id($work_history_id) {
        $this->work_history_id = $work_history_id;
    }

    function get_Work_id() {
        return $this->work_id;
    }

    function set_Work_id($work_id) {
        $this->work_id = $work_id;
    }

    function get_User_id() {
        return $this->user_id;
    }

    function set_User_id($user_id) {
        $this->user_id = $user_id;
    }

    function get_Note() {
        return $this->note;
    }

    function set_Note($note) {
        $this->note = $note;
    }

    function get_Date_created() {
        return $this->date_created;
    }

    function set_Date_created($date_created) {
        $this->date_created = $date_created;
    }

    function get_Version() {
        return $this->version;
    }

    function set_Version($version) {
        $this->version = $version;
    }

    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You may want to add default values here.
    function _init_Work_history() {
        $this->work_history_id = "";
        $this->work_id = "";
        $this->user_id = "";
        $this->note = "";
        $this->date_created = "";
        $this->version = "";
    }

    // Initialize all your default variables here
    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You could add default values here, but fields are generally set empty
    function _emptyWork_history() {
        $this->work_history_id = "";
        $this->work_id = "";
        $this->user_id = "";
        $this->note = "";
        $this->date_created = "";
        $this->version = "";
    }

    function migrate_versions_to_work_history($the_results) {

//        live.versions		api.work_history
//        	
//	version_id		work_history_id
//	song_id                 work_id
//	writer_id		user_id
//	version                 version
//	additional_info		note
//	old_song_title		
//	date_added		date_created


        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        foreach ($the_results['versions_list'] as $read_live) {
            //


            $insert_api['work_history_id'] = $read_live['version_id'];








            /////////////////////////////////////////////////
            //check if this song_id already exists in api.work.work_id
            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
            //From the api.work, check if work_id exists:
            $this->load->model('songsplits_api_new/workmodel', 'workmodelmodel_api');
            $p_key_value = $read_live['song_id'];
            $api_work = $this->workmodelmodel_api->retrieve_by_pkey($p_key_value);

            if (!$api_work['work_id']) {
                continue; //skip the record.
            } else {
                //$insert_api['work_id']      = $api_work['work_id'];
                //same as
                $insert_api['work_id'] = $read_live['song_id'];
            }
            /////////////////////////////////////////////////
            /////////////////////////////////////////////////
            //Use the new keys for writer:
            // live.split.writer_id (f_key) 
            // replace by new
            // live.a_writer_name.ida_writer_name (p_key)
            //
    // 
            //
    //Find the new key of the Writer by the old key $song['create_by_id']
            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
            //From the live.a_writer_keys, get ida_writer_name 
            //where writer_id = $split['writer_id']
            $this->load->model('songsplits_live/writermodel');
            $field = 'writer_id';
            $value = $read_live['writer_id'];
            $a_writer_keys = $this->writermodel->retrieve_by_fkey_a_writer_keys($field, $value);
            //set the new key: live.ida_writer_name is p_key for table writer now.
            ////////////////////////////////////////////
            //Some records of tbl.live.split do net reference to any writer record.
            //What to do with this records, skip?
            //Example:
            //live.split.split_id = 19
            //live.split.work_id = 9
            // insert writer_id = NULL
            //Error cant insert NULL.
            if ($a_writer_keys['ida_writer_name']) {
                // $insert_api['user_id']               = $read_live['writer_id'];
                $insert_api['user_id'] = $a_writer_keys['ida_writer_name'];
            } else {
                continue; //skip the record.
            }
            /////////////////////////////////////////////////


            $insert_api['version'] = $read_live['version'];

            $insert_api['note'] = $read_live['additional_info'];

            //$insert_api['split_id']            = $read_live['old_song_title'];

            $insert_api['date_created'] = $read_live['date_added'];


//            echo '<pre>';
//            print_r($read_live);
//            echo '<pre>';
//            echo '<pre>';
//            print_r($insert_api);
//            echo '<pre>';
//            die(__FILE__ . __LINE__);


            $this->add($insert_api);
        }
    }

}
