<?php
class Admin_contactModel extends CI_Model {
/**
 * MODULE NAME   : admin_contactmodel.php
 *
 * DESCRIPTION   : Admin_contact model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:21 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             admin_contact
 * @subpackage          Admin_contact model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $adminContact_id;
var $adminContact_name;
var $admin_id;
var $authorized;
var $notification;
var $email;
var $password;
var $phone;
var $fax;


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
//      return $this->find(array('adminContact_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'admin_contact' );


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

      $query = $this->db_songsplits_live->get( 'admin_contact' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['adminContact_id']		 = $row['adminContact_id'];
			$query_results['adminContact_name']		 = $row['adminContact_name'];
			$query_results['admin_id']		 = $row['admin_id'];
			$query_results['authorized']		 = $row['authorized'];
			$query_results['notification']		 = $row['notification'];
			$query_results['email']		 = $row['email'];
			$query_results['password']		 = $row['password'];
			$query_results['phone']		 = $row['phone'];
			$query_results['fax']		 = $row['fax'];

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

      $this->db_songsplits_live->where( 'adminContact_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'admin_contact' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['adminContact_id']		 = $row['adminContact_id'];
		$query_results['adminContact_name']		 = $row['adminContact_name'];
		$query_results['admin_id']		 = $row['admin_id'];
		$query_results['authorized']		 = $row['authorized'];
		$query_results['notification']		 = $row['notification'];
		$query_results['email']		 = $row['email'];
		$query_results['password']		 = $row['password'];
		$query_results['phone']		 = $row['phone'];
		$query_results['fax']		 = $row['fax'];

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

      $this->db_songsplits_live->insert('admin_contact', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('adminContact_id', $keyvalue);
      $this->db_songsplits_live->update('admin_contact', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('adminContact_id', $idField);
      // $this->db_songsplits_live->delete('admin_contact');

      return true;

   }

	function get_AdminContact_id() {
		return $this->adminContact_id;	}

	function set_AdminContact_id($adminContact_id) {
		$this->adminContact_id = $adminContact_id;	}

	function get_AdminContact_name() {
		return $this->adminContact_name;	}

	function set_AdminContact_name($adminContact_name) {
		$this->adminContact_name = $adminContact_name;	}

	function get_Admin_id() {
		return $this->admin_id;	}

	function set_Admin_id($admin_id) {
		$this->admin_id = $admin_id;	}

	function get_Authorized() {
		return $this->authorized;	}

	function set_Authorized($authorized) {
		$this->authorized = $authorized;	}

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

	function get_Phone() {
		return $this->phone;	}

	function set_Phone($phone) {
		$this->phone = $phone;	}

	function get_Fax() {
		return $this->fax;	}

	function set_Fax($fax) {
		$this->fax = $fax;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Admin_contact()
      {
		$this->adminContact_id = "";
		$this->adminContact_name = "";
		$this->admin_id = "";
		$this->authorized = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->phone = "";
		$this->fax = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyAdmin_contact()
      {
		$this->adminContact_id = "";
		$this->adminContact_name = "";
		$this->admin_id = "";
		$this->authorized = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->phone = "";
		$this->fax = "";

      }

}

?>
