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

      
      
function migrate_admin_to_api_user_and_live_a_admin($the_results) {
    
    
    foreach ($the_results['admin_list'] as $read_live_admin) {
 
        /*
            live.admin		api.user
         * 	
            ***admin_id		user_id*** skip this, new user_id is created on insert
            admin_name (is unique)      legal_name
            adminParent_id		
            street		
            country		
            phone		
            email                       email_1
            password                    password
            last_login                  last_login 
         * 
            main_user_type             "publisher";//mark admins as publishers
         */ 
        
        
        ///////////////////////////////////////////  
        //Insert into api.user
         $insert_api_user['legal_name'] = $read_live_admin['admin_name'];
         ////
         if( ! $read_live_admin['email']) {
             $insert_api_user['email_1']    = "";
         }
         else {
             $insert_api_user['email_1']    = $read_live_admin['email'];
         }
         ///////
         if( ! $read_live_admin['password']) {
             $insert_api_user['password']    = "";
         }
         else {
             $insert_api_user['password']   = $read_live_admin['password'];
         }
         //////
         if( ! $read_live_admin['last_login']) {
             $insert_api_user['last_login']    = "";
         }
         else {
             $insert_api_user['last_login'] = $read_live_admin['last_login'];
         }
         /////

         $insert_api_user['main_user_type'] = "publisher";//mark admins as publishers

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('user', $insert_api_user);
         $api_user_insert_id = $this->db_songsplits_api_new->insert_id();
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.administrator
         $insert_api_administrator['administrator_id'] = $api_user_insert_id;
         //live.admin_id is replaced with $api_user_insert_id
         $insert_api_administrator['user_id'] = $api_user_insert_id;
         
         
         $insert_api_administrator['company_name']     = $read_live_admin['admin_name'];

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('administrator', $insert_api_administrator);
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.administration
         $insert_api_administration['administrator_id'] = $api_user_insert_id;
         //live.admin_id is replaced with $api_user_insert_id
         
         $insert_api_administration['publisher_id']     = $api_user_insert_id;

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('administration', $insert_api_administration);
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.publisher
         //
         //live.admin_id is replaced with $api_user_insert_id
         $insert_api_publisher['publisher_id'] = $api_user_insert_id;
         $insert_api_publisher['admin_id']     = $api_user_insert_id;
         $insert_api_publisher['user_id']      = $api_user_insert_id;

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('publisher', $insert_api_publisher);
         ///////////////////////////////////////////
         
         
         
         
         
         
        ///////////////////////////////////////////  
        //Insert into live.a_admin
        /*
         tbl.  a_admin
            ida_admin
            admin_id
            api_user_insert_id
        */
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
        $insert_live_a_admin['admin_id'] = $read_live_admin['admin_id'];
        $insert_live_a_admin['api_user_insert_id'] = $api_user_insert_id;
        $this->db_songsplits_live->insert('a_admin', $insert_live_a_admin);
        ///////////////////////////////////////////

         
//        echo '<pre>';
//        //print_r($read_live);
//        echo '<pre>';
//        echo '<pre>';
//        print_r($api_user_insert_id);
//        echo '<pre>';
//        die(__FILE__ . __LINE__);

        
    }


}
      
      
      
function migrate_admin_contact_to_api_user($the_results) {
    
    /*
    live.admin_contact	to	api.user	
	adminContact_id		
	adminContact_name	alias_1
	admin_id		
	authorized		
	notification		
	email                   email_2
	password		
	phone                   phone
     */
    
    foreach ($the_results['admin_contact_list'] as $read_live_admin) {
        
        
        
        // f_key $read_live_admin['admin_id']
        $modify_api_user['alias_1']    = $read_live_admin['adminContact_name'];
        $modify_api_user['email_2']    = $read_live_admin['email'];
        $modify_api_user['phone']      = $read_live_admin['phone'];
        
        //Find publisher user type in tbl.api.user
        //live.admins are now into api.users i.e. publisher type,
        // but there they have different p_key then in live.admin
        //Find that p_key from tbl.a_adnin where old and new p_keys are mapped.
        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
        $this->load->model('songsplits_live/adminmodel', 'adminmodel_live');
        $field = 'admin_id';
        $value = $read_live_admin['admin_id'];
        $a_admin = $this->adminmodel_live->retrieve_by_field_a_admin($field, $value);  // Send the retrievelist msg
        
        //if such record exists:
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        if($a_admin['api_user_insert_id'])
        {
            //$this->load->model('songsplits_api/usermodel');
            //$this->db_songsplits_api_new->insert('user', $insert_api_user);
            //$api_user_insert_id = $this->db_songsplits_api_new->insert_id();
            $this->db_songsplits_api_new->where('user_id', $a_admin['api_user_insert_id']);
            $this->db_songsplits_api_new->where('main_user_type', 'publisher');
            $this->db_songsplits_api_new->update('user', $modify_api_user);
        }
     
        
        }
        
        die(__FILE__ . __LINE__);

    }  
    
    
    function add_live_administration_company_name_as_api_users_publishers($the_results) {
        
        
    foreach ($the_results['administration_list'] as $read_live_administration) {
 
        $company_name = $read_live_administration['company_name'];
        
        //check if company_name exists
        if( "" == $company_name )
        {
            continue;
        }
  
        
        //Check if live.administration.company_name
        //exists in api.user.legal_name where main_user_type = publisher
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        $this->load->model('songsplits_api_new/usermodel');
        $api_user = $this->usermodel->retrieve_publisher_by_name($company_name);
        
        
        //If that $company_name exists in DB, skip. 
        //Look for thos who are not.
        if( $api_user['legal_name'] )
        {
            continue;
        }
        
                 
         
         

         
        echo '<pre>';
        print_r($read_live_administration);
        echo '<pre>';
        echo '<pre>';
        print_r($api_user);
        echo '----------------------------';
//        die(__FILE__ . __LINE__);

        
/*
        $read_live_administration = Array
(
    [administration_id] => 265
    [writer_id] => 673665
    [company_name] => TGOPFV Music Publishing 
    [ipi] => 
    [publisher_society_id] => 0
    [publisher_admin_id] => 0
    [created] => 2014-05-11 14:05:29
)
        $api_user = Array
(
    [user_id] => 597407
    [group_id] => 1
    [usr_verified] => 0
    [main_user_type] => publisher
    [legal_name] => TGOPFV Music Publishing 
    [alias_1] => 
    [alias_2] => 
    [email_1] => 
    [email_2] => 
    [phone] => 
    [img_id] => 1
    [date_joined] => 2016-07-10 16:47:07
    [last_login] => 0000-00-00 00:00:00
    [location_id] => 100217
    [password] => 
    [language_id] => 1
    [usr_pwdresettoken] => 
    [usr_verify_email_token] => 
)
*/
        
        ///////////////////////////////////////////
        //IF $company_name is not in the user, add it:
        ///////////////////////////////////////////  
        //Insert into api.user
         $insert_api_user['legal_name'] = $company_name;
         $insert_api_user['main_user_type'] = "publisher";//mark admins as publishers
         $insert_api_user['password'] = "publisher_pass";
         $insert_api_user['alias_2'] = "from@live.administration";

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('user', $insert_api_user);
         $api_user_insert_id = $this->db_songsplits_api_new->insert_id();
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.administrator
         $insert_api_administrator['administrator_id'] = $api_user_insert_id;
         //live.admin_id is replaced with $api_user_insert_id
         $insert_api_administrator['user_id'] = $api_user_insert_id;
         
         $insert_api_administrator['company_name']  = $company_name;

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('administrator', $insert_api_administrator);
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.administration
         $insert_api_administration['administrator_id'] = $api_user_insert_id;
         //live.admin_id is replaced with $api_user_insert_id
         
         $insert_api_administration['publisher_id']     = $api_user_insert_id;

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('administration', $insert_api_administration);
         ///////////////////////////////////////////
         
         
         ///////////////////////////////////////////  
         //Insert into api.publisher
         //
         //live.admin_id is replaced with $api_user_insert_id
         $insert_api_publisher['publisher_id'] = $api_user_insert_id;
         $insert_api_publisher['admin_id']     = $api_user_insert_id;
         $insert_api_publisher['user_id']      = $api_user_insert_id;

         $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
         //$this->load->model('songsplits_api/usermodel');
         $this->db_songsplits_api_new->insert('publisher', $insert_api_publisher);
         ///////////////////////////////////////////


        
    }


        
        
            
//        echo '<pre>';
//        //print_r($read_live);
//        echo '<pre>';
//        echo '<pre>';
//        print_r($modify_api_user);
//        echo '<pre>';
        die(__FILE__ . __LINE__);
        
 }
 
 
 function live_administration_to_api_publisher_split($the_results) {
 
   /*
    Some records  have the relation:
    publisher_admin_id to writer_id, 
    Some records don’t have that relation, i.e
    Publisher_admin_id is missing

    For those, who have the relation publisher_admin_id to writer_id  
    Make splits for all writers works.
    Take new a_admin_id, i.e. new user id.
    (for some of these records company_name is not same as in the user table 
     for the same publisher_admin_id, but ignore that and keep to the keys.)
    */

    /*
        live.administration		api.publisher_split
     			
	administration_id		split_id		
	publisher_admin_id		publisher_id            "Find the new publisher key in live.a_admin:
                                                                publisher_id = 
                                                                live.a_admin.api_user_insert_id
                                                                where admin_id = publisher_admin_id
                                                                "	
	writer_id                       work_id                 "Relate all the works 
                                                                 for the given writer_id"	
     */
        
        
    foreach ($the_results['administration_list'] as $read_live_administration) {
 
        
        //check if relation publisher_admin_id to writer_id exists.
        //This are 129 records founded in live.admin table.
        if( ("0" == $read_live_administration['publisher_admin_id']) OR 
            (""   == $read_live_administration['writer_id']) )
        {
            continue;
        }
        
        ////////////////////////
        //test live
        // administration_id = 1093
        // song_id = 19167
        
//            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
//            $this->load->model('songsplits_live/songmodel', 'songmodel_live');
//            $field = 'create_by_id';
//            $value = $read_live_administration['writer_id'];
//            $song = $this->songmodel_live->find_by_field_value($field, $value);
//            
//            if(count($song) > 0)
//            {
//                 echo '<pre>$read_live_administration';
//                print_r($read_live_administration);
//                echo '<pre>$song';
//                print_r($song);
//                echo '----------------------------';
//            }
//
//            //die(__FILE__ . __LINE__);
//            continue;
        /////////////////////
        
        
        
        
        
       
        
        ///////////////////////////
        //take the new a_admin_id:
        // live.administration.publisher_id = live.admin.admin_id, so
        // tbl.a_admin can be used for this.
            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
            $this->load->model('songsplits_live/adminmodel', 'adminmodel_live');
            $field = 'admin_id';
            $value = $read_live_administration['publisher_admin_id'];
            $a_admin = $this->adminmodel_live->retrieve_by_field_a_admin($field, $value);
            $api_user_insert_id = $a_admin['api_user_insert_id'];
        ///////////////////////////
            
            
            
         
        ///////////////////////////
        //do check if record is in api.user
        //exists in api.user.legal_name where main_user_type = publisher
            $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
            $this->load->model('songsplits_api_new/usermodel');
            $company_name = $read_live_administration['company_name'];
            $api_user = $this->usermodel->retrieve_by_pkey($api_user_insert_id);
            
            if(! isset($api_user['user_id']) )
            {
                die('$api_user not there');
            }
        /////////////////////////// 
            
            
            
         
         
        
         
         
         //1. writer_id is mapped to new user_id in  tbl.a_writer_keys.ida_writer_name
            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
            $this->load->model('songsplits_live/writermodel', 'writermodel_live');
            $field_w = 'writer_id';
            $value_w = $read_live_administration['writer_id'];
            $a_writer_keys = $this->writermodel_live->retrieve_by_fkey_a_writer_keys($field_w, $value_w);
            $ida_writer_name = $a_writer_keys['ida_writer_name'];
        
            
            
            
            
            //find all the works for this writer
            $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
            $this->load->model('songsplits_api_new/writer_splitmodel');
            $field_ws = 'writer_id';
            //
            $value_ws = $ida_writer_name;
            $writer_works_list = $this->writer_splitmodel->find_by_field_value($field_ws, $value_ws);
            
            /////////////////////////////////
            //test
//            if(count($writer_works_list) > 0)
//            {
//                 echo '<pre>$read_live_administration';
//                print_r($read_live_administration);
//                echo '<pre>$a_admin';
//                print_r($a_admin);
//                echo '<pre>$song';
//                print_r($writer_works_list);
//                echo '----------------------------';
//            }
//            
//            //test live
//            // administration_id = 1093
//            // song_id = 19 167
//            //
//            // test api
//            // administration_id = 1417
//            // work_id = 18 746
//
//            //die(__FILE__ . __LINE__);
//            continue;
            /////////////////////////////////
            
            
            
            if( ! empty($writer_works_list) )
            {
              foreach($writer_works_list as $writer_work)
              {
                  
                 //set insert data
                 $insert_api_publisher_split['publisher_id'] = $api_user_insert_id; 
                 $insert_api_publisher_split['work_id']      = $writer_work['work_id'];
                 
                 echo '<pre>publ_id ';
                 print_r($api_user_insert_id);
                 echo '<pre>work_id ';
                 print_r($writer_work['work_id']);
                 echo '<pre>';
                 echo '----------------------------';
                 
                 //insert into api.publisher_split
                 $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
                 $this->load->model('songsplits_api_new/publisher_splitmodel');
                 
                //$this->publisher_splitmodel->add($insert_api_publisher_split);
                // http://stackoverflow.com/questions/10965792/insert-ignore-using-codeigniter
                $insert_query = $this->db_songsplits_api_new->insert_string('publisher_split', $insert_api_publisher_split);
                $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
                $this->db_songsplits_api_new->query($insert_query);
                 
              }
                
            }
         
        
        
//        echo '<pre>$read_live_administration';
//        print_r($read_live_administration);
//        echo '<pre>';
//        echo '<pre>$a_admin';
//        print_r($a_admin);
//        echo '<pre>$api_user';
//        print_r($api_user);
//         echo '<pre>$writer_works_list';
//        print_r($writer_works_list);
//        echo '----------------------------';
//        //die(__FILE__ . __LINE__);
        
//        if(  count($writer_works_list) > 2 )
//        {
//            die(__FILE__ . __LINE__);
//        }
        
  
    
         
    }
        
        
     die(__FILE__ . __LINE__);   
        
        
     
 }
      
      
 
 function live_administration_to_api_publisher_split_2($the_results) {
 
   /*
    Some records  have the relation:
    publisher_admin_id to writer_id, 
    Some records don’t have that relation, i.e
    Publisher_admin_id is missing

    2.  For those, who do NOT have the relation publisher_admin_id to writer_id
        only   company_name to writer_id:
        find api.user_id from company_name, and then
        Make splits between publisher and all writers works.
    */

    /*
        live.administration		api.publisher_split
     			
	administration_id		split_id		
	publisher_admin_id		publisher_id            "Find the new publisher key in live.a_admin:
                                                                publisher_id = 
                                                                live.a_admin.api_user_insert_id
                                                                where admin_id = publisher_admin_id
                                                                "	
	writer_id                       work_id                 "Relate all the works 
                                                                 for the given writer_id"	
     */
        
        
    foreach ($the_results['administration_list'] as $read_live_administration) {
 
        
        
        //check if relation publisher_admin_id to writer_id  NOT exists,
        // but company_name exists.
        if( ("0" != $read_live_administration['publisher_admin_id']) OR 
            (""  == $read_live_administration['company_name']) )
        {
            continue;
        }
        
        
        
        //for each related writer to the publisher, 
        //find all the writer works/songs,
        //and relate them to the publishet in the API.publisher_split
        //$writer_id = $read_live_administration['writer_id'];
        

        
        ///////////////////////////
        //take the  api.user_id from the company_name
        //api.user.legal_name where main_user_type = publisher
            $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
            $this->load->model('songsplits_api_new/usermodel');
            $company_name = $read_live_administration['company_name'];
            $api_user = $this->usermodel->retrieve_publisher_by_name($company_name);
            $api_user_id = $api_user['user_id'];
            if(! isset($api_user['user_id']) )
            {
                die('$api_user not there');
            }
        /////////////////////////// 

         
         
         //1. writer_id is mapped to new user_id in tbl.a_writer_keys.ida_writer_name
            $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
            $this->load->model('songsplits_live/writermodel', 'writermodel_live');
            $field_w = 'writer_id';
            $value_w = $read_live_administration['writer_id'];
            $a_writer_keys = $this->writermodel_live->retrieve_by_fkey_a_writer_keys($field_w, $value_w);
            $ida_writer_name = $a_writer_keys['ida_writer_name'];
        

            
            
            //find all the works for this writer
            $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
            $this->load->model('songsplits_api_new/writer_splitmodel');
            $field_ws = 'writer_id';
            //
            $value_ws = $ida_writer_name;
            $writer_works_list = $this->writer_splitmodel->find_by_field_value($field_ws, $value_ws);
            
            /////////////////////////////////
            //test
//            if(count($writer_works_list) > 0)
//            {
//                 echo '<pre>$read_live_administration';
//                print_r($read_live_administration);
//                
//                echo '<pre>$a_admin';
//                print_r($api_user);
//                
//                echo '<pre>$ida_writer_name';
//                print_r($ida_writer_name);
//                
//                echo '<pre>$song';
//                print_r($writer_works_list);
//                echo '----------------------------';
//            }
//            
//            //test live
//            // administration_id = 1093
//            // song_id = 19 167
//            //
//            // test api
//            // administration_id = 1417
//            // work_id = 18 746
//
//            die(__FILE__ . __LINE__);
//            continue;
            /////////////////////////////////
            
            
            
            if( ! empty($writer_works_list) )
            {
              foreach($writer_works_list as $writer_work)
              {
                  
                 //set insert data
                 $insert_api_publisher_split['publisher_id'] = $api_user_id; 
                 $insert_api_publisher_split['work_id']      = $writer_work['work_id'];
                 
                 echo '<pre>publ_id ';
                 print_r($api_user_id);
                  echo '<pre>$ida_writer_name ';
                 print_r($ida_writer_name);
                 echo '<pre>work_id ';
                 print_r($writer_work['work_id']);
                 echo '<pre>';
                 echo '----------------------------';
                 
                 //insert into api.publisher_split
                 $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
                 $this->load->model('songsplits_api_new/publisher_splitmodel');
                 
                //$this->publisher_splitmodel->add($insert_api_publisher_split);
                // http://stackoverflow.com/questions/10965792/insert-ignore-using-codeigniter
                $insert_query = $this->db_songsplits_api_new->insert_string('publisher_split', $insert_api_publisher_split);
                $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
                $this->db_songsplits_api_new->query($insert_query);
                 
              }
                
            }
         
        
        
//        echo '<pre>$read_live_administration';
//        print_r($read_live_administration);
//        echo '<pre>';
//        echo '<pre>$a_admin';
//        print_r($a_admin);
//        echo '<pre>$api_user';
//        print_r($api_user);
//         echo '<pre>$writer_works_list';
//        print_r($writer_works_list);
//        echo '----------------------------';
//        //die(__FILE__ . __LINE__);
        
//        if(  count($writer_works_list) > 2 )
//        {
//            die(__FILE__ . __LINE__);
//        }
        
  
    
         
    }
        
        
     die(__FILE__ . __LINE__);   
        
        
     
 }
      
    
      
      
}
