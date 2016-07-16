<?php
class SocietyModel extends CI_Model {
/**
 * MODULE NAME   : societymodel.php
 *
 * DESCRIPTION   : Society model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
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
var $full_name;
var $short_name;
var $contact_name;
var $contact_email;
var $society_type;
var $society_country;
var $territory_code;
var $affiliation_code;


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
//      return $this->find(array('society_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'society' );


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

      $query = $this->db_songsplits_api_new->get( 'society' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['society_id']		 = $row['society_id'];
			$query_results['full_name']		 = $row['full_name'];
			$query_results['short_name']		 = $row['short_name'];
			$query_results['contact_name']		 = $row['contact_name'];
			$query_results['contact_email']		 = $row['contact_email'];
			$query_results['society_type']		 = $row['society_type'];
			$query_results['society_country']		 = $row['society_country'];
			$query_results['territory_code']		 = $row['territory_code'];
			$query_results['affiliation_code']		 = $row['affiliation_code'];

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

      $this->db_songsplits_api_new->where( 'society_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'society' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['society_id']		 = $row['society_id'];
		$query_results['full_name']		 = $row['full_name'];
		$query_results['short_name']		 = $row['short_name'];
		$query_results['contact_name']		 = $row['contact_name'];
		$query_results['contact_email']		 = $row['contact_email'];
		$query_results['society_type']		 = $row['society_type'];
		$query_results['society_country']		 = $row['society_country'];
		$query_results['territory_code']		 = $row['territory_code'];
		$query_results['affiliation_code']		 = $row['affiliation_code'];

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

      $this->db_songsplits_api_new->insert('society', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('society_id', $keyvalue);
      $this->db_songsplits_api_new->update('society', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('society_id', $idField);
      // $this->db_songsplits_api_new->delete('society');

      return true;

   }

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_Full_name() {
		return $this->full_name;	}

	function set_Full_name($full_name) {
		$this->full_name = $full_name;	}

	function get_Short_name() {
		return $this->short_name;	}

	function set_Short_name($short_name) {
		$this->short_name = $short_name;	}

	function get_Contact_name() {
		return $this->contact_name;	}

	function set_Contact_name($contact_name) {
		$this->contact_name = $contact_name;	}

	function get_Contact_email() {
		return $this->contact_email;	}

	function set_Contact_email($contact_email) {
		$this->contact_email = $contact_email;	}

	function get_Society_type() {
		return $this->society_type;	}

	function set_Society_type($society_type) {
		$this->society_type = $society_type;	}

	function get_Society_country() {
		return $this->society_country;	}

	function set_Society_country($society_country) {
		$this->society_country = $society_country;	}

	function get_Territory_code() {
		return $this->territory_code;	}

	function set_Territory_code($territory_code) {
		$this->territory_code = $territory_code;	}

	function get_Affiliation_code() {
		return $this->affiliation_code;	}

	function set_Affiliation_code($affiliation_code) {
		$this->affiliation_code = $affiliation_code;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Society()
      {
		$this->society_id = "";
		$this->full_name = "";
		$this->short_name = "";
		$this->contact_name = "";
		$this->contact_email = "";
		$this->society_type = "";
		$this->society_country = "";
		$this->territory_code = "";
		$this->affiliation_code = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySociety()
      {
		$this->society_id = "";
		$this->full_name = "";
		$this->short_name = "";
		$this->contact_name = "";
		$this->contact_email = "";
		$this->society_type = "";
		$this->society_country = "";
		$this->territory_code = "";
		$this->affiliation_code = "";

      }
      
     
      
      function live_society_to_api_society($the_results) {

//live.society		api.society	
//	society_id		society_id
//	society_name		short_name
//	society_contact		contact_name


        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

        foreach ($the_results['society_list'] as $read_live) 
        {
            //


            $insert_api['society_id'] = $read_live['society_id'];
            
            $insert_api['short_name'] = $read_live['society_name'];
            
            $insert_api['contact_name'] = $read_live['society_contact'];




            $this->add($insert_api);
        }
    }


}
