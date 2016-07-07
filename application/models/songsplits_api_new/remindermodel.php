<?php
class ReminderModel extends CI_Model {
/**
 * MODULE NAME   : remindermodel.php
 *
 * DESCRIPTION   : Reminder model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             reminder
 * @subpackage          Reminder model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $date_created;
var $recieve_user_id;
var $reminder_id;
var $send_user_id;
var $split_id;
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
//      return $this->find(array('reminder_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'reminder' );


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

      $query = $this->db_songsplits_api_new->get( 'reminder' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['date_created']		 = $row['date_created'];
			$query_results['recieve_user_id']		 = $row['recieve_user_id'];
			$query_results['reminder_id']		 = $row['reminder_id'];
			$query_results['send_user_id']		 = $row['send_user_id'];
			$query_results['split_id']		 = $row['split_id'];
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
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where( 'reminder_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'reminder' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['date_created']		 = $row['date_created'];
		$query_results['recieve_user_id']		 = $row['recieve_user_id'];
		$query_results['reminder_id']		 = $row['reminder_id'];
		$query_results['send_user_id']		 = $row['send_user_id'];
		$query_results['split_id']		 = $row['split_id'];
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
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->insert('reminder', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('reminder_id', $keyvalue);
      $this->db_songsplits_api_new->update('reminder', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('reminder_id', $idField);
      // $this->db_songsplits_api_new->delete('reminder');

      return true;

   }

	function get_Date_created() {
		return $this->date_created;	}

	function set_Date_created($date_created) {
		$this->date_created = $date_created;	}

	function get_Recieve_user_id() {
		return $this->recieve_user_id;	}

	function set_Recieve_user_id($recieve_user_id) {
		$this->recieve_user_id = $recieve_user_id;	}

	function get_Reminder_id() {
		return $this->reminder_id;	}

	function set_Reminder_id($reminder_id) {
		$this->reminder_id = $reminder_id;	}

	function get_Send_user_id() {
		return $this->send_user_id;	}

	function set_Send_user_id($send_user_id) {
		$this->send_user_id = $send_user_id;	}

	function get_Split_id() {
		return $this->split_id;	}

	function set_Split_id($split_id) {
		$this->split_id = $split_id;	}

	function get_Work_id() {
		return $this->work_id;	}

	function set_Work_id($work_id) {
		$this->work_id = $work_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Reminder()
      {
		$this->date_created = "";
		$this->recieve_user_id = "";
		$this->reminder_id = "";
		$this->send_user_id = "";
		$this->split_id = "";
		$this->work_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyReminder()
      {
		$this->date_created = "";
		$this->recieve_user_id = "";
		$this->reminder_id = "";
		$this->send_user_id = "";
		$this->split_id = "";
		$this->work_id = "";

      }

}

?>
