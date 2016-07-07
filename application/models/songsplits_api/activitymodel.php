<?php
class ActivityModel extends CI_Model {
/**
 * MODULE NAME   : activitymodel.php
 *
 * DESCRIPTION   : Activity model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:20 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             activity
 * @subpackage          Activity model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $action;
var $activity;
var $activity_id;
var $date_created;
var $user_id;
var $work_id;


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
//      return $this->find(array('activity_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api->count_all( 'activity' );


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

      $query = $this->db_songsplits_api->get( 'activity' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['action']		 = $row['action'];
			$query_results['activity']		 = $row['activity'];
			$query_results['activity_id']		 = $row['activity_id'];
			$query_results['date_created']		 = $row['date_created'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['work_id']		 = $row['work_id'];

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

      $this->db_songsplits_api->where( 'activity_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'activity' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['action']		 = $row['action'];
		$query_results['activity']		 = $row['activity'];
		$query_results['activity_id']		 = $row['activity_id'];
		$query_results['date_created']		 = $row['date_created'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['work_id']		 = $row['work_id'];

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

      $this->db_songsplits_api->insert('activity', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('activity_id', $keyvalue);
      $this->db_songsplits_api->update('activity', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('activity_id', $idField);
      // $this->db_songsplits_api->delete('activity');

      return true;

   }

	function get_Action() {
		return $this->action;	}

	function set_Action($action) {
		$this->action = $action;	}

	function get_Activity() {
		return $this->activity;	}

	function set_Activity($activity) {
		$this->activity = $activity;	}

	function get_Activity_id() {
		return $this->activity_id;	}

	function set_Activity_id($activity_id) {
		$this->activity_id = $activity_id;	}

	function get_Date_created() {
		return $this->date_created;	}

	function set_Date_created($date_created) {
		$this->date_created = $date_created;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Work_id() {
		return $this->work_id;	}

	function set_Work_id($work_id) {
		$this->work_id = $work_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Activity()
      {
		$this->action = "";
		$this->activity = "";
		$this->activity_id = "";
		$this->date_created = "";
		$this->user_id = "";
		$this->work_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyActivity()
      {
		$this->action = "";
		$this->activity = "";
		$this->activity_id = "";
		$this->date_created = "";
		$this->user_id = "";
		$this->work_id = "";

      }

}

?>
