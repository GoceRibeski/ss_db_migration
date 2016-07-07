<?php
class SocialModel extends CI_Model {
/**
 * MODULE NAME   : socialmodel.php
 *
 * DESCRIPTION   : Social model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:14 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             social
 * @subpackage          Social model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $facebook_access_token;
var $facebook_id;
var $google_plus_id;
var $social_id;
var $twitter_access_token;
var $twitter_id;
var $twitter_secret;
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
//      return $this->find(array('social_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api->count_all( 'social' );


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

      $query = $this->db_songsplits_api->get( 'social' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['facebook_access_token']		 = $row['facebook_access_token'];
			$query_results['facebook_id']		 = $row['facebook_id'];
			$query_results['google_plus_id']		 = $row['google_plus_id'];
			$query_results['social_id']		 = $row['social_id'];
			$query_results['twitter_access_token']		 = $row['twitter_access_token'];
			$query_results['twitter_id']		 = $row['twitter_id'];
			$query_results['twitter_secret']		 = $row['twitter_secret'];
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
      $this->load->database();

      $this->db_songsplits_api->where( 'social_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'social' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['facebook_access_token']		 = $row['facebook_access_token'];
		$query_results['facebook_id']		 = $row['facebook_id'];
		$query_results['google_plus_id']		 = $row['google_plus_id'];
		$query_results['social_id']		 = $row['social_id'];
		$query_results['twitter_access_token']		 = $row['twitter_access_token'];
		$query_results['twitter_id']		 = $row['twitter_id'];
		$query_results['twitter_secret']		 = $row['twitter_secret'];
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
      $this->load->database();

      $this->db_songsplits_api->insert('social', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('social_id', $keyvalue);
      $this->db_songsplits_api->update('social', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('social_id', $idField);
      // $this->db_songsplits_api->delete('social');

      return true;

   }

	function get_Facebook_access_token() {
		return $this->facebook_access_token;	}

	function set_Facebook_access_token($facebook_access_token) {
		$this->facebook_access_token = $facebook_access_token;	}

	function get_Facebook_id() {
		return $this->facebook_id;	}

	function set_Facebook_id($facebook_id) {
		$this->facebook_id = $facebook_id;	}

	function get_Google_plus_id() {
		return $this->google_plus_id;	}

	function set_Google_plus_id($google_plus_id) {
		$this->google_plus_id = $google_plus_id;	}

	function get_Social_id() {
		return $this->social_id;	}

	function set_Social_id($social_id) {
		$this->social_id = $social_id;	}

	function get_Twitter_access_token() {
		return $this->twitter_access_token;	}

	function set_Twitter_access_token($twitter_access_token) {
		$this->twitter_access_token = $twitter_access_token;	}

	function get_Twitter_id() {
		return $this->twitter_id;	}

	function set_Twitter_id($twitter_id) {
		$this->twitter_id = $twitter_id;	}

	function get_Twitter_secret() {
		return $this->twitter_secret;	}

	function set_Twitter_secret($twitter_secret) {
		$this->twitter_secret = $twitter_secret;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Social()
      {
		$this->facebook_access_token = "";
		$this->facebook_id = "";
		$this->google_plus_id = "";
		$this->social_id = "";
		$this->twitter_access_token = "";
		$this->twitter_id = "";
		$this->twitter_secret = "";
		$this->user_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySocial()
      {
		$this->facebook_access_token = "";
		$this->facebook_id = "";
		$this->google_plus_id = "";
		$this->social_id = "";
		$this->twitter_access_token = "";
		$this->twitter_id = "";
		$this->twitter_secret = "";
		$this->user_id = "";

      }

}

?>
