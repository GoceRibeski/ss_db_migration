<?php
class WriterModel extends CI_Model {
/**
 * MODULE NAME   : writermodel.php
 *
 * DESCRIPTION   : Writer model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:17 PM   - Pradesh Chanderpaul     - Created
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

var $attorney_control;
var $attorney_notify;
var $attorney_view;
var $cae_ipi;
var $cae_ipi_2;
var $cae_ipi_3;
var $manager_control;
var $manager_notify;
var $manager_view;
var $promo_email;
var $publisher_control;
var $publisher_notify;
var $publisher_view;
var $realtime_email;
var $society_id;
var $user_id;
var $weekly_email;
var $writer_id;


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
//      return $this->find(array('writer_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api->count_all( 'writer' );


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

      $query = $this->db_songsplits_api->get( 'writer' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['attorney_control']		 = $row['attorney_control'];
			$query_results['attorney_notify']		 = $row['attorney_notify'];
			$query_results['attorney_view']		 = $row['attorney_view'];
			$query_results['cae_ipi']		 = $row['cae_ipi'];
			$query_results['cae_ipi_2']		 = $row['cae_ipi_2'];
			$query_results['cae_ipi_3']		 = $row['cae_ipi_3'];
			$query_results['manager_control']		 = $row['manager_control'];
			$query_results['manager_notify']		 = $row['manager_notify'];
			$query_results['manager_view']		 = $row['manager_view'];
			$query_results['promo_email']		 = $row['promo_email'];
			$query_results['publisher_control']		 = $row['publisher_control'];
			$query_results['publisher_notify']		 = $row['publisher_notify'];
			$query_results['publisher_view']		 = $row['publisher_view'];
			$query_results['realtime_email']		 = $row['realtime_email'];
			$query_results['society_id']		 = $row['society_id'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['weekly_email']		 = $row['weekly_email'];
			$query_results['writer_id']		 = $row['writer_id'];

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

      $this->db_songsplits_api->where( 'writer_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'writer' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['attorney_control']		 = $row['attorney_control'];
		$query_results['attorney_notify']		 = $row['attorney_notify'];
		$query_results['attorney_view']		 = $row['attorney_view'];
		$query_results['cae_ipi']		 = $row['cae_ipi'];
		$query_results['cae_ipi_2']		 = $row['cae_ipi_2'];
		$query_results['cae_ipi_3']		 = $row['cae_ipi_3'];
		$query_results['manager_control']		 = $row['manager_control'];
		$query_results['manager_notify']		 = $row['manager_notify'];
		$query_results['manager_view']		 = $row['manager_view'];
		$query_results['promo_email']		 = $row['promo_email'];
		$query_results['publisher_control']		 = $row['publisher_control'];
		$query_results['publisher_notify']		 = $row['publisher_notify'];
		$query_results['publisher_view']		 = $row['publisher_view'];
		$query_results['realtime_email']		 = $row['realtime_email'];
		$query_results['society_id']		 = $row['society_id'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['weekly_email']		 = $row['weekly_email'];
		$query_results['writer_id']		 = $row['writer_id'];

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

      $this->db_songsplits_api->insert('writer', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('writer_id', $keyvalue);
      $this->db_songsplits_api->update('writer', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('writer_id', $idField);
      // $this->db_songsplits_api->delete('writer');

      return true;

   }

	function get_Attorney_control() {
		return $this->attorney_control;	}

	function set_Attorney_control($attorney_control) {
		$this->attorney_control = $attorney_control;	}

	function get_Attorney_notify() {
		return $this->attorney_notify;	}

	function set_Attorney_notify($attorney_notify) {
		$this->attorney_notify = $attorney_notify;	}

	function get_Attorney_view() {
		return $this->attorney_view;	}

	function set_Attorney_view($attorney_view) {
		$this->attorney_view = $attorney_view;	}

	function get_Cae_ipi() {
		return $this->cae_ipi;	}

	function set_Cae_ipi($cae_ipi) {
		$this->cae_ipi = $cae_ipi;	}

	function get_Cae_ipi_2() {
		return $this->cae_ipi_2;	}

	function set_Cae_ipi_2($cae_ipi_2) {
		$this->cae_ipi_2 = $cae_ipi_2;	}

	function get_Cae_ipi_3() {
		return $this->cae_ipi_3;	}

	function set_Cae_ipi_3($cae_ipi_3) {
		$this->cae_ipi_3 = $cae_ipi_3;	}

	function get_Manager_control() {
		return $this->manager_control;	}

	function set_Manager_control($manager_control) {
		$this->manager_control = $manager_control;	}

	function get_Manager_notify() {
		return $this->manager_notify;	}

	function set_Manager_notify($manager_notify) {
		$this->manager_notify = $manager_notify;	}

	function get_Manager_view() {
		return $this->manager_view;	}

	function set_Manager_view($manager_view) {
		$this->manager_view = $manager_view;	}

	function get_Promo_email() {
		return $this->promo_email;	}

	function set_Promo_email($promo_email) {
		$this->promo_email = $promo_email;	}

	function get_Publisher_control() {
		return $this->publisher_control;	}

	function set_Publisher_control($publisher_control) {
		$this->publisher_control = $publisher_control;	}

	function get_Publisher_notify() {
		return $this->publisher_notify;	}

	function set_Publisher_notify($publisher_notify) {
		$this->publisher_notify = $publisher_notify;	}

	function get_Publisher_view() {
		return $this->publisher_view;	}

	function set_Publisher_view($publisher_view) {
		$this->publisher_view = $publisher_view;	}

	function get_Realtime_email() {
		return $this->realtime_email;	}

	function set_Realtime_email($realtime_email) {
		$this->realtime_email = $realtime_email;	}

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Weekly_email() {
		return $this->weekly_email;	}

	function set_Weekly_email($weekly_email) {
		$this->weekly_email = $weekly_email;	}

	function get_Writer_id() {
		return $this->writer_id;	}

	function set_Writer_id($writer_id) {
		$this->writer_id = $writer_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Writer()
      {
		$this->attorney_control = "";
		$this->attorney_notify = "";
		$this->attorney_view = "";
		$this->cae_ipi = "";
		$this->cae_ipi_2 = "";
		$this->cae_ipi_3 = "";
		$this->manager_control = "";
		$this->manager_notify = "";
		$this->manager_view = "";
		$this->promo_email = "";
		$this->publisher_control = "";
		$this->publisher_notify = "";
		$this->publisher_view = "";
		$this->realtime_email = "";
		$this->society_id = "";
		$this->user_id = "";
		$this->weekly_email = "";
		$this->writer_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyWriter()
      {
		$this->attorney_control = "";
		$this->attorney_notify = "";
		$this->attorney_view = "";
		$this->cae_ipi = "";
		$this->cae_ipi_2 = "";
		$this->cae_ipi_3 = "";
		$this->manager_control = "";
		$this->manager_notify = "";
		$this->manager_view = "";
		$this->promo_email = "";
		$this->publisher_control = "";
		$this->publisher_notify = "";
		$this->publisher_view = "";
		$this->realtime_email = "";
		$this->society_id = "";
		$this->user_id = "";
		$this->weekly_email = "";
		$this->writer_id = "";

      }

}

?>
