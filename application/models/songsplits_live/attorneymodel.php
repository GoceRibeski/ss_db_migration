<?php
class AttorneyModel extends CI_Model {
/**
 * MODULE NAME   : attorneymodel.php
 *
 * DESCRIPTION   : Attorney model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:21 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             attorney
 * @subpackage          Attorney model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $attorney_id;
var $attorney_name;
var $company_name;
var $notification;
var $email;
var $password;
var $language_id;
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
//      return $this->find(array('attorney_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'attorney' );


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

      $query = $this->db_songsplits_live->get( 'attorney' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['attorney_id']		 = $row['attorney_id'];
			$query_results['attorney_name']		 = $row['attorney_name'];
			$query_results['company_name']		 = $row['company_name'];
			$query_results['notification']		 = $row['notification'];
			$query_results['email']		 = $row['email'];
			$query_results['password']		 = $row['password'];
			$query_results['language_id']		 = $row['language_id'];
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

      $this->db_songsplits_live->where( 'attorney_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'attorney' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['attorney_id']		 = $row['attorney_id'];
		$query_results['attorney_name']		 = $row['attorney_name'];
		$query_results['company_name']		 = $row['company_name'];
		$query_results['notification']		 = $row['notification'];
		$query_results['email']		 = $row['email'];
		$query_results['password']		 = $row['password'];
		$query_results['language_id']		 = $row['language_id'];
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

      $this->db_songsplits_live->insert('attorney', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('attorney_id', $keyvalue);
      $this->db_songsplits_live->update('attorney', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('attorney_id', $idField);
      // $this->db_songsplits_live->delete('attorney');

      return true;

   }

	function get_Attorney_id() {
		return $this->attorney_id;	}

	function set_Attorney_id($attorney_id) {
		$this->attorney_id = $attorney_id;	}

	function get_Attorney_name() {
		return $this->attorney_name;	}

	function set_Attorney_name($attorney_name) {
		$this->attorney_name = $attorney_name;	}

	function get_Company_name() {
		return $this->company_name;	}

	function set_Company_name($company_name) {
		$this->company_name = $company_name;	}

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

	function get_Language_id() {
		return $this->language_id;	}

	function set_Language_id($language_id) {
		$this->language_id = $language_id;	}

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
      function _init_Attorney()
      {
		$this->attorney_id = "";
		$this->attorney_name = "";
		$this->company_name = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->language_id = "";
		$this->phone = "";
		$this->fax = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyAttorney()
      {
		$this->attorney_id = "";
		$this->attorney_name = "";
		$this->company_name = "";
		$this->notification = "";
		$this->email = "";
		$this->password = "";
		$this->language_id = "";
		$this->phone = "";
		$this->fax = "";

      }
      
      
      function live_attorney_to_api_attorney() {
          
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/attorneymodel', 'attorney_live');


        $the_results['attorney_list'] = $this->attorney_live->find();  // Send the retrievelist msg

        NEXT: Insert attorney as user,create new table/key api_attorney_insert_id.
                
        do join attorney with writer. For each writer find thr new api p_key: ida_writer_name.
                
        For all joined writers, insert intp api.attorney:
            api_attorney_insert_id as arrorney_id
            ida_writer_name        as user_id
            and the Name
            
            
            
        ;
                
        echo '<pre>';
        print_r($the_results);
        echo '<pre>';
        die(__FILE__ . __LINE__);

          
      }
      
      

}

?>
