<?php
class UserModel extends CI_Model {
/**
 * MODULE NAME   : usermodel.php
 *
 * DESCRIPTION   : User model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:15 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             user
 * @subpackage          User model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $group_id;
var $alias_1;
var $alias_2;
var $date_joined;
var $email_1;
var $email_2;
var $img_id;
var $language_id;
var $last_login;
var $legal_name;
var $location_id;
var $main_user_type;
var $password;
var $phone;
var $user_id;
var $usr_pwdresettoken;
var $usr_verify_email_token;
var $usr_verified;


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
//      return $this->find(array('user_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_api->count_all( 'user' );


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

      $query = $this->db_songsplits_api->get( 'user' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['group_id']		 = $row['group_id'];
			$query_results['alias_1']		 = $row['alias_1'];
			$query_results['alias_2']		 = $row['alias_2'];
			$query_results['date_joined']		 = $row['date_joined'];
			$query_results['email_1']		 = $row['email_1'];
			$query_results['email_2']		 = $row['email_2'];
			$query_results['img_id']		 = $row['img_id'];
			$query_results['language_id']		 = $row['language_id'];
			$query_results['last_login']		 = $row['last_login'];
			$query_results['legal_name']		 = $row['legal_name'];
			$query_results['location_id']		 = $row['location_id'];
			$query_results['main_user_type']		 = $row['main_user_type'];
			$query_results['password']		 = $row['password'];
			$query_results['phone']		 = $row['phone'];
			$query_results['user_id']		 = $row['user_id'];
			$query_results['usr_pwdresettoken']		 = $row['usr_pwdresettoken'];
			$query_results['usr_verify_email_token']		 = $row['usr_verify_email_token'];
			$query_results['usr_verified']		 = $row['usr_verified'];

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

      $this->db_songsplits_api->where( 'user_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'user' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['group_id']		 = $row['group_id'];
		$query_results['alias_1']		 = $row['alias_1'];
		$query_results['alias_2']		 = $row['alias_2'];
		$query_results['date_joined']		 = $row['date_joined'];
		$query_results['email_1']		 = $row['email_1'];
		$query_results['email_2']		 = $row['email_2'];
		$query_results['img_id']		 = $row['img_id'];
		$query_results['language_id']		 = $row['language_id'];
		$query_results['last_login']		 = $row['last_login'];
		$query_results['legal_name']		 = $row['legal_name'];
		$query_results['location_id']		 = $row['location_id'];
		$query_results['main_user_type']		 = $row['main_user_type'];
		$query_results['password']		 = $row['password'];
		$query_results['phone']		 = $row['phone'];
		$query_results['user_id']		 = $row['user_id'];
		$query_results['usr_pwdresettoken']		 = $row['usr_pwdresettoken'];
		$query_results['usr_verify_email_token']		 = $row['usr_verify_email_token'];
		$query_results['usr_verified']		 = $row['usr_verified'];

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

      $this->db_songsplits_api->insert('user', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('user_id', $keyvalue);
      $this->db_songsplits_api->update('user', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('user_id', $idField);
      // $this->db_songsplits_api->delete('user');

      return true;

   }

	function get_Group_id() {
		return $this->group_id;	}

	function set_Group_id($group_id) {
		$this->group_id = $group_id;	}

	function get_Alias_1() {
		return $this->alias_1;	}

	function set_Alias_1($alias_1) {
		$this->alias_1 = $alias_1;	}

	function get_Alias_2() {
		return $this->alias_2;	}

	function set_Alias_2($alias_2) {
		$this->alias_2 = $alias_2;	}

	function get_Date_joined() {
		return $this->date_joined;	}

	function set_Date_joined($date_joined) {
		$this->date_joined = $date_joined;	}

	function get_Email_1() {
		return $this->email_1;	}

	function set_Email_1($email_1) {
		$this->email_1 = $email_1;	}

	function get_Email_2() {
		return $this->email_2;	}

	function set_Email_2($email_2) {
		$this->email_2 = $email_2;	}

	function get_Img_id() {
		return $this->img_id;	}

	function set_Img_id($img_id) {
		$this->img_id = $img_id;	}

	function get_Language_id() {
		return $this->language_id;	}

	function set_Language_id($language_id) {
		$this->language_id = $language_id;	}

	function get_Last_login() {
		return $this->last_login;	}

	function set_Last_login($last_login) {
		$this->last_login = $last_login;	}

	function get_Legal_name() {
		return $this->legal_name;	}

	function set_Legal_name($legal_name) {
		$this->legal_name = $legal_name;	}

	function get_Location_id() {
		return $this->location_id;	}

	function set_Location_id($location_id) {
		$this->location_id = $location_id;	}

	function get_Main_user_type() {
		return $this->main_user_type;	}

	function set_Main_user_type($main_user_type) {
		$this->main_user_type = $main_user_type;	}

	function get_Password() {
		return $this->password;	}

	function set_Password($password) {
		$this->password = $password;	}

	function get_Phone() {
		return $this->phone;	}

	function set_Phone($phone) {
		$this->phone = $phone;	}

	function get_User_id() {
		return $this->user_id;	}

	function set_User_id($user_id) {
		$this->user_id = $user_id;	}

	function get_Usr_pwdresettoken() {
		return $this->usr_pwdresettoken;	}

	function set_Usr_pwdresettoken($usr_pwdresettoken) {
		$this->usr_pwdresettoken = $usr_pwdresettoken;	}

	function get_Usr_verify_email_token() {
		return $this->usr_verify_email_token;	}

	function set_Usr_verify_email_token($usr_verify_email_token) {
		$this->usr_verify_email_token = $usr_verify_email_token;	}

	function get_Usr_verified() {
		return $this->usr_verified;	}

	function set_Usr_verified($usr_verified) {
		$this->usr_verified = $usr_verified;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_User()
      {
		$this->group_id = "";
		$this->alias_1 = "";
		$this->alias_2 = "";
		$this->date_joined = "";
		$this->email_1 = "";
		$this->email_2 = "";
		$this->img_id = "";
		$this->language_id = "";
		$this->last_login = "";
		$this->legal_name = "";
		$this->location_id = "";
		$this->main_user_type = "";
		$this->password = "";
		$this->phone = "";
		$this->user_id = "";
		$this->usr_pwdresettoken = "";
		$this->usr_verify_email_token = "";
		$this->usr_verified = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyUser()
      {
		$this->group_id = "";
		$this->alias_1 = "";
		$this->alias_2 = "";
		$this->date_joined = "";
		$this->email_1 = "";
		$this->email_2 = "";
		$this->img_id = "";
		$this->language_id = "";
		$this->last_login = "";
		$this->legal_name = "";
		$this->location_id = "";
		$this->main_user_type = "";
		$this->password = "";
		$this->phone = "";
		$this->user_id = "";
		$this->usr_pwdresettoken = "";
		$this->usr_verify_email_token = "";
		$this->usr_verified = "";

      }

}

?>
