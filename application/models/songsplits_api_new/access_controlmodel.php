<?php
class Access_controlModel extends CI_Model {
/**
 * MODULE NAME   : access_controlmodel.php
 *
 * DESCRIPTION   : Access_control model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             access_control
 * @subpackage          Access_control model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $ac_id;
var $user_id;
var $resource_id;
var $resource_type;
var $read_access;
var $write_access;
var $role;
var $granted_by;


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
//      return $this->find(array('ac_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'access_control' );


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
            // NOTE: ...   $this->db_songsplits_api_new->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_api_new->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_api_new->limit($start, $count);
         }
         else {
            $this->db_songsplits_api_new->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->orderby();

      $query = $this->db_songsplits_api_new->get( 'access_control' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['ac_id']		 = $row['ac_id'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['resource_id']		 = $row['resource_id'];
			$query_results['resource_type']		 = $row['resource_type'];
			$query_results['read_access']		 = $row['read_access'];
			$query_results['write_access']		 = $row['write_access'];
			$query_results['role']		 = $row['role'];
			$query_results['granted_by']		 = $row['granted_by'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where( 'ac_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'access_control' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['ac_id']		 = $row['ac_id'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['resource_id']		 = $row['resource_id'];
		$query_results['resource_type']		 = $row['resource_type'];
		$query_results['read_access']		 = $row['read_access'];
		$query_results['write_access']		 = $row['write_access'];
		$query_results['role']		 = $row['role'];
		$query_results['granted_by']		 = $row['granted_by'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->insert('access_control', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('ac_id', $keyvalue);
      $this->db_songsplits_api_new->update('access_control', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('ac_id', $idField);
      // $this->db_songsplits_api_new->delete('access_control');

      return true;

   }

	function get_Ac_id() {
		return $this->ac_id;	}

	function set_Ac_id($ac_id) {
		$this->ac_id = $ac_id;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Resource_id() {
		return $this->resource_id;	}

	function set_Resource_id($resource_id) {
		$this->resource_id = $resource_id;	}

	function get_Resource_type() {
		return $this->resource_type;	}

	function set_Resource_type($resource_type) {
		$this->resource_type = $resource_type;	}

	function get_Read_access() {
		return $this->read_access;	}

	function set_Read_access($read_access) {
		$this->read_access = $read_access;	}

	function get_Write_access() {
		return $this->write_access;	}

	function set_Write_access($write_access) {
		$this->write_access = $write_access;	}

	function get_Role() {
		return $this->role;	}

	function set_Role($role) {
		$this->role = $role;	}

	function get_Granted_by() {
		return $this->granted_by;	}

	function set_Granted_by($granted_by) {
		$this->granted_by = $granted_by;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Access_control()
      {
		$this->ac_id = "";
		$this->user_id = "";
		$this->resource_id = "";
		$this->resource_type = "";
		$this->read_access = "";
		$this->write_access = "";
		$this->role = "";
		$this->granted_by = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyAccess_control()
      {
		$this->ac_id = "";
		$this->user_id = "";
		$this->resource_id = "";
		$this->resource_type = "";
		$this->read_access = "";
		$this->write_access = "";
		$this->role = "";
		$this->granted_by = "";

      }

}

?>
