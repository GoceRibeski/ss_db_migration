<?php
class SocietyModel extends CI_Model {
/**
 * MODULE NAME   : societymodel.php
 *
 * DESCRIPTION   : Society model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:15 PM   - Pradesh Chanderpaul     - Created
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

var $affiliation_code;
var $contact_email;
var $contact_name;
var $full_name;
var $short_name;
var $society_country;
var $society_id;
var $society_type;
var $territory_code;


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
//      return $this->find(array('society_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api->count_all( 'society' );


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

      $query = $this->db_songsplits_api->get( 'society' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['affiliation_code']		 = $row['affiliation_code'];
			$query_results['contact_email']		 = $row['contact_email'];
			$query_results['contact_name']		 = $row['contact_name'];
			$query_results['full_name']		 = $row['full_name'];
			$query_results['short_name']		 = $row['short_name'];
			$query_results['society_country']		 = $row['society_country'];
			$query_results['society_id']		 = $row['society_id'];
			$query_results['society_type']		 = $row['society_type'];
			$query_results['territory_code']		 = $row['territory_code'];

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

      $this->db_songsplits_api->where( 'society_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'society' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['affiliation_code']		 = $row['affiliation_code'];
		$query_results['contact_email']		 = $row['contact_email'];
		$query_results['contact_name']		 = $row['contact_name'];
		$query_results['full_name']		 = $row['full_name'];
		$query_results['short_name']		 = $row['short_name'];
		$query_results['society_country']		 = $row['society_country'];
		$query_results['society_id']		 = $row['society_id'];
		$query_results['society_type']		 = $row['society_type'];
		$query_results['territory_code']		 = $row['territory_code'];

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

      $this->db_songsplits_api->insert('society', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('society_id', $keyvalue);
      $this->db_songsplits_api->update('society', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('society_id', $idField);
      // $this->db_songsplits_api->delete('society');

      return true;

   }

	function get_Affiliation_code() {
		return $this->affiliation_code;	}

	function set_Affiliation_code($affiliation_code) {
		$this->affiliation_code = $affiliation_code;	}

	function get_Contact_email() {
		return $this->contact_email;	}

	function set_Contact_email($contact_email) {
		$this->contact_email = $contact_email;	}

	function get_Contact_name() {
		return $this->contact_name;	}

	function set_Contact_name($contact_name) {
		$this->contact_name = $contact_name;	}

	function get_Full_name() {
		return $this->full_name;	}

	function set_Full_name($full_name) {
		$this->full_name = $full_name;	}

	function get_Short_name() {
		return $this->short_name;	}

	function set_Short_name($short_name) {
		$this->short_name = $short_name;	}

	function get_Society_country() {
		return $this->society_country;	}

	function set_Society_country($society_country) {
		$this->society_country = $society_country;	}

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_Society_type() {
		return $this->society_type;	}

	function set_Society_type($society_type) {
		$this->society_type = $society_type;	}

	function get_Territory_code() {
		return $this->territory_code;	}

	function set_Territory_code($territory_code) {
		$this->territory_code = $territory_code;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Society()
      {
		$this->affiliation_code = "";
		$this->contact_email = "";
		$this->contact_name = "";
		$this->full_name = "";
		$this->short_name = "";
		$this->society_country = "";
		$this->society_id = "";
		$this->society_type = "";
		$this->territory_code = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySociety()
      {
		$this->affiliation_code = "";
		$this->contact_email = "";
		$this->contact_name = "";
		$this->full_name = "";
		$this->short_name = "";
		$this->society_country = "";
		$this->society_id = "";
		$this->society_type = "";
		$this->territory_code = "";

      }
      


}

?>
