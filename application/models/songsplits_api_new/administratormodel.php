<?php
class AdministratorModel extends CI_Model {
/**
 * MODULE NAME   : administratormodel.php
 *
 * DESCRIPTION   : Administrator model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             administrator
 * @subpackage          Administrator model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $administrator_id;
var $cae_ipi;
var $company_name;
var $location_id;
var $parent_name;
var $user_id;


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
//      return $this->find(array('administrator_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'administrator' );


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

      $query = $this->db_songsplits_api_new->get( 'administrator' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['administrator_id']		 = $row['administrator_id'];
			$query_results['cae_ipi']		 = $row['cae_ipi'];
			$query_results['company_name']		 = $row['company_name'];
			$query_results['location_id']		 = $row['location_id'];
			$query_results['parent_name']		 = $row['parent_name'];
			$query_results['user_id']		 = $row['user_id'];

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

      $this->db_songsplits_api_new->where( 'administrator_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'administrator' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['administrator_id']		 = $row['administrator_id'];
		$query_results['cae_ipi']		 = $row['cae_ipi'];
		$query_results['company_name']		 = $row['company_name'];
		$query_results['location_id']		 = $row['location_id'];
		$query_results['parent_name']		 = $row['parent_name'];
		$query_results['user_id']		 = $row['user_id'];

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

      $this->db_songsplits_api_new->insert('administrator', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('administrator_id', $keyvalue);
      $this->db_songsplits_api_new->update('administrator', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('administrator_id', $idField);
      // $this->db_songsplits_api_new->delete('administrator');

      return true;

   }

	function get_Administrator_id() {
		return $this->administrator_id;	}

	function set_Administrator_id($administrator_id) {
		$this->administrator_id = $administrator_id;	}

	function get_Cae_ipi() {
		return $this->cae_ipi;	}

	function set_Cae_ipi($cae_ipi) {
		$this->cae_ipi = $cae_ipi;	}

	function get_Company_name() {
		return $this->company_name;	}

	function set_Company_name($company_name) {
		$this->company_name = $company_name;	}

	function get_Location_id() {
		return $this->location_id;	}

	function set_Location_id($location_id) {
		$this->location_id = $location_id;	}

	function get_Parent_name() {
		return $this->parent_name;	}

	function set_Parent_name($parent_name) {
		$this->parent_name = $parent_name;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Administrator()
      {
		$this->administrator_id = "";
		$this->cae_ipi = "";
		$this->company_name = "";
		$this->location_id = "";
		$this->parent_name = "";
		$this->user_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyAdministrator()
      {
		$this->administrator_id = "";
		$this->cae_ipi = "";
		$this->company_name = "";
		$this->location_id = "";
		$this->parent_name = "";
		$this->user_id = "";

      }

}

?>
