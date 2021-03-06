<?php
class Writer_administratorModel extends CI_Model {
/**
 * MODULE NAME   : writer_administratormodel.php
 *
 * DESCRIPTION   : Writer_administrator model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:18 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             writer_administrator
 * @subpackage          Writer_administrator model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $wa_id;
var $admin_id;
var $user_id;
var $access_type;
var $rel_type;


   function __construct()
    {
       
        // ///////////////////////////////////////////////////////////////////////
        // NOTE: Load database libraries and other libraries and helpers. The
        // NOTE: ...generated code loads the database library as it requires it,
        // NOTE: ...but you may prefer to load here or autoload, In this case
        // NOTE: ...remember to delete all explicit load()s.
        // ///////////////////////////////////////////////////////////////////////

        // Initialise or clear class variables.
        // NOTE: Not particularly useful unless you are using model persistence
          $this->db_songsplits_api = $this->load->database('songsplits_api', TRUE);
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
//      return $this->find(array('wa_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

      $results = array();

      // Load the database library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      $this->table_record_count = $this->db_songsplits_api->count_all( 'writer_administrator' );


      // Filter could be an array or filter values or an SQL string.
      $where_clause = '';
      if ($filters) {
         if ( is_string($filters) ) {
            $where_clause = $filters;
         }
         elseif ( is_array($filters) ) {
            // Build your filter rules
            // ///////////////////////////////////////////////////////////////////////
            // NOTE: There are many ways to build the select code. (For example, you
            // NOTE: ...just pass the $filters array to where() like:
            // NOTE: ...   $this->db_songsplits_api->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_api->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_api->limit($start, $count);
         }
         else {
            $this->db_songsplits_api->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_api->limit( 100 );

      $query = $this->db_songsplits_api->get( 'writer_administrator' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['wa_id']		 = $row['wa_id'];
			$query_results['admin_id']		 = $row['admin_id'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['access_type']		 = $row['access_type'];
			$query_results['rel_type']		 = $row['rel_type'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->load->database();

      $this->db_songsplits_api->where( 'wa_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'writer_administrator' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['wa_id']		 = $row['wa_id'];
		$query_results['admin_id']		 = $row['admin_id'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['access_type']		 = $row['access_type'];
		$query_results['rel_type']		 = $row['rel_type'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->insert('writer_administrator', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('wa_id', $keyvalue);
      $this->db_songsplits_api->update('writer_administrator', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('wa_id', $idField);
      // $this->db_songsplits_api->delete('writer_administrator');

      return true;

   }

	function get_Wa_id() {
		return $this->wa_id;	}

	function set_Wa_id($wa_id) {
		$this->wa_id = $wa_id;	}

	function get_Admin_id() {
		return $this->admin_id;	}

	function set_Admin_id($admin_id) {
		$this->admin_id = $admin_id;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Access_type() {
		return $this->access_type;	}

	function set_Access_type($access_type) {
		$this->access_type = $access_type;	}

	function get_Rel_type() {
		return $this->rel_type;	}

	function set_Rel_type($rel_type) {
		$this->rel_type = $rel_type;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Writer_administrator()
      {
		$this->wa_id = "";
		$this->admin_id = "";
		$this->user_id = "";
		$this->access_type = "";
		$this->rel_type = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyWriter_administrator()
      {
		$this->wa_id = "";
		$this->admin_id = "";
		$this->user_id = "";
		$this->access_type = "";
		$this->rel_type = "";

      }

}

?>
