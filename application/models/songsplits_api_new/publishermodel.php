<?php
class PublisherModel extends CI_Model {
/**
 * MODULE NAME   : publishermodel.php
 *
 * DESCRIPTION   : Publisher model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             publisher
 * @subpackage          Publisher model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $publisher_id;
var $admin_id;
var $user_id;
var $society_id;
var $cae_ipi;
var $cae_ipi_2;


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
//      return $this->find(array('publisher_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'publisher' );


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

      $query = $this->db_songsplits_api_new->get( 'publisher' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['publisher_id']		 = $row['publisher_id'];
			$query_results['admin_id']		 = $row['admin_id'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['society_id']		 = $row['society_id'];
			$query_results['cae_ipi']		 = $row['cae_ipi'];
			$query_results['cae_ipi_2']		 = $row['cae_ipi_2'];

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

      $this->db_songsplits_api_new->where( 'publisher_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'publisher' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['publisher_id']		 = $row['publisher_id'];
		$query_results['admin_id']		 = $row['admin_id'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['society_id']		 = $row['society_id'];
		$query_results['cae_ipi']		 = $row['cae_ipi'];
		$query_results['cae_ipi_2']		 = $row['cae_ipi_2'];

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

      $this->db_songsplits_api_new->insert('publisher', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('publisher_id', $keyvalue);
      $this->db_songsplits_api_new->update('publisher', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('publisher_id', $idField);
      // $this->db_songsplits_api_new->delete('publisher');

      return true;

   }

	function get_Publisher_id() {
		return $this->publisher_id;	}

	function set_Publisher_id($publisher_id) {
		$this->publisher_id = $publisher_id;	}

	function get_Admin_id() {
		return $this->admin_id;	}

	function set_Admin_id($admin_id) {
		$this->admin_id = $admin_id;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_Cae_ipi() {
		return $this->cae_ipi;	}

	function set_Cae_ipi($cae_ipi) {
		$this->cae_ipi = $cae_ipi;	}

	function get_Cae_ipi_2() {
		return $this->cae_ipi_2;	}

	function set_Cae_ipi_2($cae_ipi_2) {
		$this->cae_ipi_2 = $cae_ipi_2;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Publisher()
      {
		$this->publisher_id = "";
		$this->admin_id = "";
		$this->user_id = "";
		$this->society_id = "";
		$this->cae_ipi = "";
		$this->cae_ipi_2 = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyPublisher()
      {
		$this->publisher_id = "";
		$this->admin_id = "";
		$this->user_id = "";
		$this->society_id = "";
		$this->cae_ipi = "";
		$this->cae_ipi_2 = "";

      }

}

?>
