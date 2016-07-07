<?php

class Writer_splitModel extends CI_Model {

    /**
     * MODULE NAME   : writer_splitmodel.php
     *
     * DESCRIPTION   : Writer_split model controller
     *
     * MODIFICATION HISTORY
     *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
     *
     * @package             writer_split
     * @subpackage          Writer_split model component Class
     * @author              Pradesh Chanderpaul
     * @copyright           Copyright (c) 2006-2007 DataCraft Software
     * @license             http://www.datacraft.co.za/codecrafter/license.html
     * @link                http://www.datacraft.co.za/codecrafter/
     * @since               Version 1.0
     * @filesource
     */
    var $table_record_count;
    var $confirmed;
    var $created;
    var $writer_id;
    var $role;
    var $split;
    var $split_id;
    var $split_type;
    var $status_id;
    var $version;
    var $work_id;

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
//      return $this->find(array('split_id' => '$key_value'));
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
        //$this->table_record_count = $this->db_songsplits_api_new->count_all( 'writer_split' );
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
                // NOTE: ...   $this->db_songsplits_api_new->where($filters);
                // NOTE: ...instead of the foreach loop below. However, it's added to
                // NOTE: ...allow further customisation.
                // ///////////////////////////////////////////////////////////////////////
                if (count($filters) > 0) {
                    foreach ($filters as $field => $value) {
                        $this->db_songsplits_api_new->where($field, $value);
                    }
                }
            }
        }

        if ($start) {
            if ($count) {
                $this->db_songsplits_api_new->limit($start, $count);
            } else {
                $this->db_songsplits_api_new->limit($start);
            }
        }


        // ///////////////////////////////////////////////////////////////////////
        // NOTE: If you want the results ordered by a specific field, do it here.
        // ///////////////////////////////////////////////////////////////////////
        // $this->db_songsplits_api_new->orderby();

        $query = $this->db_songsplits_api_new->get('writer_split');

        if ($query->num_rows() > 0) {
            // return $query->result_array();
            foreach ($query->result_array() as $row) {      // Go through the result set
                // Build up a list for each column from the database and place it in
                // ...the result set

                $query_results['confirmed'] = $row['confirmed'];
                $query_results['created'] = $row['created'];
                $query_results['writer_id'] = $row['writer_id'];
                $query_results['role'] = $row['role'];
                $query_results['split'] = $row['split'];
                $query_results['split_id'] = $row['split_id'];
                $query_results['split_type'] = $row['split_type'];
                $query_results['status_id'] = $row['status_id'];
                $query_results['version'] = $row['version'];
                $query_results['work_id'] = $row['work_id'];

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

        $this->db_songsplits_api_new->where('split_id', "$idField");
        $this->db_songsplits_api_new->limit(1);
        $query = $this->db_songsplits_api_new->get('writer_split');


        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            $query_results['confirmed'] = $row['confirmed'];
            $query_results['created'] = $row['created'];
            $query_results['writer_id'] = $row['writer_id'];
            $query_results['role'] = $row['role'];
            $query_results['split'] = $row['split'];
            $query_results['split_id'] = $row['split_id'];
            $query_results['split_type'] = $row['split_type'];
            $query_results['status_id'] = $row['status_id'];
            $query_results['version'] = $row['version'];
            $query_results['work_id'] = $row['work_id'];

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

        $this->db_songsplits_api_new->insert('writer_split', $data);

        return $this->db_songsplits_api_new->insert_id();
    }

    function modify($keyvalue, $data) {

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        // Load the database library
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        $this->db_songsplits_api_new->where('split_id', $keyvalue);
        $this->db_songsplits_api_new->update('writer_split', $data);
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
        // $this->db_songsplits_api_new->where('split_id', $idField);
        // $this->db_songsplits_api_new->delete('writer_split');

        return true;
    }

    function get_Confirmed() {
        return $this->confirmed;
    }

    function set_Confirmed($confirmed) {
        $this->confirmed = $confirmed;
    }

    function get_Created() {
        return $this->created;
    }

    function set_Created($created) {
        $this->created = $created;
    }

    function get_Writer_id() {
        return $this->writer_id;
    }

    function set_Writer_id($writer_id) {
        $this->writer_id = $writer_id;
    }

    function get_Role() {
        return $this->role;
    }

    function set_Role($role) {
        $this->role = $role;
    }

    function get_Split() {
        return $this->split;
    }

    function set_Split($split) {
        $this->split = $split;
    }

    function get_Split_id() {
        return $this->split_id;
    }

    function set_Split_id($split_id) {
        $this->split_id = $split_id;
    }

    function get_Split_type() {
        return $this->split_type;
    }

    function set_Split_type($split_type) {
        $this->split_type = $split_type;
    }

    function get_Status_id() {
        return $this->status_id;
    }

    function set_Status_id($status_id) {
        $this->status_id = $status_id;
    }

    function get_Version() {
        return $this->version;
    }

    function set_Version($version) {
        $this->version = $version;
    }

    function get_Work_id() {
        return $this->work_id;
    }

    function set_Work_id($work_id) {
        $this->work_id = $work_id;
    }

    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You may want to add default values here.
    function _init_Writer_split() {
        $this->confirmed = "";
        $this->created = "";
        $this->writer_id = "";
        $this->role = "";
        $this->split = "";
        $this->split_id = "";
        $this->split_type = "";
        $this->status_id = "";
        $this->version = "";
        $this->work_id = "";
    }

    // Initialize all your default variables here
    // Function used to initilialise class variables.
    // NOTE: Not particularly useful unless you are using model persistence
    // NOTE: You could add default values here, but fields are generally set empty
    function _emptyWriter_split() {
        $this->confirmed = "";
        $this->created = "";
        $this->writer_id = "";
        $this->role = "";
        $this->split = "";
        $this->split_id = "";
        $this->split_type = "";
        $this->status_id = "";
        $this->version = "";
        $this->work_id = "";
    }

    function migrate_split_to_writer_split($the_results) {

    //    live.split	api.writer_split
    //    	
    //    split_id		split_id
    //    song_id		work_id
    //    writer_id		writer_id
    //    status_id		status_id
    //    percent		split
    //    split_type            split_type
    //    created		created
    //    modified		confirmed
    //    version		version
    //    role_id		role   

        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        foreach ($the_results['split_list'] as $read_live) {
            
            $insert_api['split_id']     = $read_live['split_id'];
            
            $insert_api['work_id']      = $read_live['song_id'];
            
            $insert_api['writer_id']    = $read_live['writer_id'];
            
            $insert_api['status_id']    = $read_live['status_id'];// enum(1, 2) - same in both tables
            
            $insert_api['split']        = $read_live['percent'];
            
            $insert_api['split_type']   = $read_live['split_type']; 
            //live has INT,  all 0s here. 
            //API has enum('original', 'sample', 'translation')
            //Final, make all 'original'
            
            $insert_api['created']      = $read_live['created'];
            
            $insert_api['confirmed']    = $read_live['modified'];
            
            $insert_api['version']      = $read_live['version'];
            
            $insert_api['role']         = $read_live['role_id']; 
            //API: enum('A', 'AR', 'C', 'CA')	
            //live: INT. (NULL, 0 to 7) 
            //How to map this?
            //From the tbl.live.writer_role
            // 1 == C
            // 2, 3, 4 & 6 == CA
            // 5 ==A
            // 7 = AR
            // NULL & 0 will be == ''
            
            

            
            
            if ( '1' == $read_live['role_id'])
            {
                $insert_api['role'] = 'C';
            }
            elseif (    '2' == $read_live['role_id']
                     OR '3' == $read_live['role_id']
                     OR '4' == $read_live['role_id']
                     or '6' == $read_live['role_id']
                   )
            {
                $insert_api['role'] = 'CA';
            }
            elseif ( '5' == $read_live['role_id'])
            {
                $insert_api['role'] = 'A';
            }
            elseif ( '7' == $read_live['role_id'])
            {
                $insert_api['role'] = 'AR';
            }
            else
            {
                $insert_api['role'] = '';
            }
            //$work['work_type'] = $song['is_cue'];$song['is_track'];$song['is_lyrics'];
            
            
        
//            echo '<pre>';
//            print_r($insert_api);
//            echo '<pre>';
//            die(__FILE__.__LINE__);

            $this->add($insert_api);
        }
    }

}

?>
