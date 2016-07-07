<?php
class SocietyModel extends CI_Model {
/**
 * MODULE NAME   : societymodel.php
 *
 * DESCRIPTION   : Society model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:25 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             society
 * @subpackage          Society model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $society_id;
var $society_name;
var $society_contact;
var $stated_writers;
var $actual_writers;
var $stated_publishers;
var $actual_publishers;


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
//      return $this->find(array('society_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'society' );


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
            // NOTE: ...   $this->db_songsplits_live->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_live->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_live->limit($start, $count);
         }
         else {
            $this->db_songsplits_live->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 100 );

      $query = $this->db_songsplits_live->get( 'society' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['society_id']		 = $row['society_id'];
			$query_results['society_name']		 = $row['society_name'];
			$query_results['society_contact']		 = $row['society_contact'];
			$query_results['stated_writers']		 = $row['stated_writers'];
			$query_results['actual_writers']		 = $row['actual_writers'];
			$query_results['stated_publishers']		 = $row['stated_publishers'];
			$query_results['actual_publishers']		 = $row['actual_publishers'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( 'society_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'society' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['society_id']		 = $row['society_id'];
		$query_results['society_name']		 = $row['society_name'];
		$query_results['society_contact']		 = $row['society_contact'];
		$query_results['stated_writers']		 = $row['stated_writers'];
		$query_results['actual_writers']		 = $row['actual_writers'];
		$query_results['stated_publishers']		 = $row['stated_publishers'];
		$query_results['actual_publishers']		 = $row['actual_publishers'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->insert('society', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('society_id', $keyvalue);
      $this->db_songsplits_live->update('society', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('society_id', $idField);
      // $this->db_songsplits_live->delete('society');

      return true;

   }

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_Society_name() {
		return $this->society_name;	}

	function set_Society_name($society_name) {
		$this->society_name = $society_name;	}

	function get_Society_contact() {
		return $this->society_contact;	}

	function set_Society_contact($society_contact) {
		$this->society_contact = $society_contact;	}

	function get_Stated_writers() {
		return $this->stated_writers;	}

	function set_Stated_writers($stated_writers) {
		$this->stated_writers = $stated_writers;	}

	function get_Actual_writers() {
		return $this->actual_writers;	}

	function set_Actual_writers($actual_writers) {
		$this->actual_writers = $actual_writers;	}

	function get_Stated_publishers() {
		return $this->stated_publishers;	}

	function set_Stated_publishers($stated_publishers) {
		$this->stated_publishers = $stated_publishers;	}

	function get_Actual_publishers() {
		return $this->actual_publishers;	}

	function set_Actual_publishers($actual_publishers) {
		$this->actual_publishers = $actual_publishers;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Society()
      {
		$this->society_id = "";
		$this->society_name = "";
		$this->society_contact = "";
		$this->stated_writers = "";
		$this->actual_writers = "";
		$this->stated_publishers = "";
		$this->actual_publishers = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySociety()
      {
		$this->society_id = "";
		$this->society_name = "";
		$this->society_contact = "";
		$this->stated_writers = "";
		$this->actual_writers = "";
		$this->stated_publishers = "";
		$this->actual_publishers = "";

      }

}

?>
