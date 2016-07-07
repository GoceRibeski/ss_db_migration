<?php
class ManagerModel extends CI_Model {
/**
 * MODULE NAME   : managermodel.php
 *
 * DESCRIPTION   : Manager model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:25 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             manager
 * @subpackage          Manager model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $manager_id;
var $full_name;
var $alias;
var $language_id;
var $notification;
var $email;
var $password;
var $alt_email;
var $phone;
var $super;
var $locations;
var $company;
var $notifiy_client;
var $notifiy_attorney;
var $notifiy_admin;
var $notifiy_society;
var $u_id;
var $access_token;
var $t_id;
var $t_oauth_token;
var $t_oauth_token_secret;
var $date_joined;
var $last_login;


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
//      return $this->find(array('manager_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'manager' );


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

      $query = $this->db_songsplits_live->get( 'manager' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['manager_id']		 = $row['manager_id'];
			$query_results['full_name']		 = $row['full_name'];
			$query_results['alias']		 = $row['alias'];
			$query_results['language_id']		 = $row['language_id'];
			$query_results['notification']		 = $row['notification'];
			$query_results['email']		 = $row['email'];
			$query_results['password']		 = $row['password'];
			$query_results['alt_email']		 = $row['alt_email'];
			$query_results['phone']		 = $row['phone'];
			$query_results['super']		 = $row['super'];
			$query_results['locations']		 = $row['locations'];
			$query_results['company']		 = $row['company'];
			$query_results['notifiy_client']		 = $row['notifiy_client'];
			$query_results['notifiy_attorney']		 = $row['notifiy_attorney'];
			$query_results['notifiy_admin']		 = $row['notifiy_admin'];
			$query_results['notifiy_society']		 = $row['notifiy_society'];
			$query_results['u_id']		 = $row['u_id'];
			$query_results['access_token']		 = $row['access_token'];
			$query_results['t_id']		 = $row['t_id'];
			$query_results['t_oauth_token']		 = $row['t_oauth_token'];
			$query_results['t_oauth_token_secret']		 = $row['t_oauth_token_secret'];
			$query_results['date_joined']		 = $row['date_joined'];
			$query_results['last_login']		 = $row['last_login'];

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

      $this->db_songsplits_live->where( 'manager_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'manager' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['manager_id']		 = $row['manager_id'];
		$query_results['full_name']		 = $row['full_name'];
		$query_results['alias']		 = $row['alias'];
		$query_results['language_id']		 = $row['language_id'];
		$query_results['notification']		 = $row['notification'];
		$query_results['email']		 = $row['email'];
		$query_results['password']		 = $row['password'];
		$query_results['alt_email']		 = $row['alt_email'];
		$query_results['phone']		 = $row['phone'];
		$query_results['super']		 = $row['super'];
		$query_results['locations']		 = $row['locations'];
		$query_results['company']		 = $row['company'];
		$query_results['notifiy_client']		 = $row['notifiy_client'];
		$query_results['notifiy_attorney']		 = $row['notifiy_attorney'];
		$query_results['notifiy_admin']		 = $row['notifiy_admin'];
		$query_results['notifiy_society']		 = $row['notifiy_society'];
		$query_results['u_id']		 = $row['u_id'];
		$query_results['access_token']		 = $row['access_token'];
		$query_results['t_id']		 = $row['t_id'];
		$query_results['t_oauth_token']		 = $row['t_oauth_token'];
		$query_results['t_oauth_token_secret']		 = $row['t_oauth_token_secret'];
		$query_results['date_joined']		 = $row['date_joined'];
		$query_results['last_login']		 = $row['last_login'];

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

      $this->db_songsplits_live->insert('manager', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('manager_id', $keyvalue);
      $this->db_songsplits_live->update('manager', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('manager_id', $idField);
      // $this->db_songsplits_live->delete('manager');

      return true;

   }

	function get_Manager_id() {
		return $this->manager_id;	}

	function set_Manager_id($manager_id) {
		$this->manager_id = $manager_id;	}

	function get_Full_name() {
		return $this->full_name;	}

	function set_Full_name($full_name) {
		$this->full_name = $full_name;	}

	function get_Alias() {
		return $this->alias;	}

	function set_Alias($alias) {
		$this->alias = $alias;	}

	function get_Language_id() {
		return $this->language_id;	}

	function set_Language_id($language_id) {
		$this->language_id = $language_id;	}

	function get_Notification() {
		return $this->notification;	}

	function set_Notification($notification) {
		$this->notification = $notification;	}

	function get_Email() {
		return $this->email;	}

	function set_Email($email) {
		$this->email = $email;	}

	function get_Password() {
		return $this->password;	}

	function set_Password($password) {
		$this->password = $password;	}

	function get_Alt_email() {
		return $this->alt_email;	}

	function set_Alt_email($alt_email) {
		$this->alt_email = $alt_email;	}

	function get_Phone() {
		return $this->phone;	}

	function set_Phone($phone) {
		$this->phone = $phone;	}

	function get_Super() {
		return $this->super;	}

	function set_Super($super) {
		$this->super = $super;	}

	function get_Locations() {
		return $this->locations;	}

	function set_Locations($locations) {
		$this->locations = $locations;	}

	function get_Company() {
		return $this->company;	}

	function set_Company($company) {
		$this->company = $company;	}

	function get_Notifiy_client() {
		return $this->notifiy_client;	}

	function set_Notifiy_client($notifiy_client) {
		$this->notifiy_client = $notifiy_client;	}

	function get_Notifiy_attorney() {
		return $this->notifiy_attorney;	}

	function set_Notifiy_attorney($notifiy_attorney) {
		$this->notifiy_attorney = $notifiy_attorney;	}

	function get_Notifiy_admin() {
		return $this->notifiy_admin;	}

	function set_Notifiy_admin($notifiy_admin) {
		$this->notifiy_admin = $notifiy_admin;	}

	function get_Notifiy_society() {
		return $this->notifiy_society;	}

	function set_Notifiy_society($notifiy_society) {
		$this->notifiy_society = $notifiy_society;	}

	function get_U_id() {
		return $this->u_id;	}

	function set_U_id($u_id) {
		$this->u_id = $u_id;	}

	function get_Access_token() {
		return $this->access_token;	}

	function set_Access_token($access_token) {
		$this->access_token = $access_token;	}

	function get_T_id() {
		return $this->t_id;	}

	function set_T_id($t_id) {
		$this->t_id = $t_id;	}

	function get_T_oauth_token() {
		return $this->t_oauth_token;	}

	function set_T_oauth_token($t_oauth_token) {
		$this->t_oauth_token = $t_oauth_token;	}

	function get_T_oauth_token_secret() {
		return $this->t_oauth_token_secret;	}

	function set_T_oauth_token_secret($t_oauth_token_secret) {
		$this->t_oauth_token_secret = $t_oauth_token_secret;	}

	function get_Date_joined() {
		return $this->date_joined;	}

	function set_Date_joined($date_joined) {
		$this->date_joined = $date_joined;	}

	function get_Last_login() {
		return $this->last_login;	}

	function set_Last_login($last_login) {
		$this->last_login = $last_login;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Manager()
      {
		$this->manager_id = "";
		$this->full_name = "";
		$this->alias = "";
		$this->language_id = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->alt_email = "";
		$this->phone = "";
		$this->super = "";
		$this->locations = "";
		$this->company = "";
		$this->notifiy_client = "";
		$this->notifiy_attorney = "";
		$this->notifiy_admin = "";
		$this->notifiy_society = "";
		$this->u_id = "";
		$this->access_token = "";
		$this->t_id = "";
		$this->t_oauth_token = "";
		$this->t_oauth_token_secret = "";
		$this->date_joined = "";
		$this->last_login = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyManager()
      {
		$this->manager_id = "";
		$this->full_name = "";
		$this->alias = "";
		$this->language_id = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->alt_email = "";
		$this->phone = "";
		$this->super = "";
		$this->locations = "";
		$this->company = "";
		$this->notifiy_client = "";
		$this->notifiy_attorney = "";
		$this->notifiy_admin = "";
		$this->notifiy_society = "";
		$this->u_id = "";
		$this->access_token = "";
		$this->t_id = "";
		$this->t_oauth_token = "";
		$this->t_oauth_token_secret = "";
		$this->date_joined = "";
		$this->last_login = "";

      }

}

?>
