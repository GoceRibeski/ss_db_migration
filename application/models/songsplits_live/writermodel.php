<?php
class WriterModel extends CI_Model {
/**
 * MODULE NAME   : writermodel.php
 *
 * DESCRIPTION   : Writer model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:29 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             writer
 * @subpackage          Writer model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $writer_id;
var $img_id;
var $first_name;
var $middle_name;
var $last_name;
var $suffix_name;
var $alias_name;
var $email;
var $password;
var $bcryptPassword;
var $u_id;
var $access_token;
var $gender;
var $birthday;
var $full_name;
var $date_joined;
var $last_login;
var $phone;
var $language_id;
var $society_id;
var $ipi;
var $publisher_ascap;
var $publisher_bmi;
var $publisher_sesac;
var $other_publisher_alias;
var $admin_contact_id;
var $attorney_id;
var $attorney_authorized;
var $manager_id;
var $manager_authorized;
var $notification;
var $notifiy_manager;
var $notifiy_attorney;
var $notifiy_admin;
var $notifiy_society;
var $t_id;
var $t_oauth_token;
var $t_oauth_token_secret;
var $display_name;
var $backup_email;
var $locations;
var $publisher_society_id;
var $publisher_admin_id;
var $admin_id;
var $temp;


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
//      return $this->find(array('writer_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }
   
   function count_all() {
       //$this->db_songsplits_live->limit( 10 );
      $this->table_record_count = $this->db_songsplits_live->count_all( 'writer' );
      
      return $this->table_record_count;

       
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
       
      $results = array();

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      //$this->table_record_count = $this->db_songsplits_live->count_all( 'writer' );


      

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 10 );
      //$this->db_songsplits_live->limit($limit, $offset);
      $this->db_songsplits_live->limit($count, $start);
      
      echo '<pre>';
          print_r($start);
            echo '<pre>';
            print_r($count);
            echo '<------------>';


      $query = $this->db_songsplits_live->get( 'writer' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['writer_id']		 = $row['writer_id'];
			$query_results['img_id']		 = $row['img_id'];
			$query_results['first_name']		 = $row['first_name'];
			$query_results['middle_name']		 = $row['middle_name'];
			$query_results['last_name']		 = $row['last_name'];
			$query_results['suffix_name']		 = $row['suffix_name'];
			$query_results['alias_name']		 = $row['alias_name'];
			$query_results['email']		 = $row['email'];
			$query_results['password']		 = $row['password'];
			$query_results['bcryptPassword']		 = $row['bcryptPassword'];
			$query_results['u_id']		 = $row['u_id'];
			$query_results['access_token']		 = $row['access_token'];
			$query_results['gender']		 = $row['gender'];
			$query_results['birthday']		 = $row['birthday'];
			$query_results['full_name']		 = $row['full_name'];
			$query_results['date_joined']		 = $row['date_joined'];
			$query_results['last_login']		 = $row['last_login'];
			$query_results['phone']		 = $row['phone'];
			$query_results['language_id']		 = $row['language_id'];
			$query_results['society_id']		 = $row['society_id'];
			$query_results['ipi']		 = $row['ipi'];
			$query_results['publisher_ascap']		 = $row['publisher_ascap'];
			$query_results['publisher_bmi']		 = $row['publisher_bmi'];
			$query_results['publisher_sesac']		 = $row['publisher_sesac'];
			$query_results['other_publisher_alias']		 = $row['other_publisher_alias'];
			$query_results['admin_contact_id']		 = $row['admin_contact_id'];
			$query_results['attorney_id']		 = $row['attorney_id'];
			$query_results['attorney_authorized']		 = $row['attorney_authorized'];
			$query_results['manager_id']		 = $row['manager_id'];
			$query_results['manager_authorized']		 = $row['manager_authorized'];
			$query_results['notification']		 = $row['notification'];
			$query_results['notifiy_manager']		 = $row['notifiy_manager'];
			$query_results['notifiy_attorney']		 = $row['notifiy_attorney'];
			$query_results['notifiy_admin']		 = $row['notifiy_admin'];
			$query_results['notifiy_society']		 = $row['notifiy_society'];
			$query_results['t_id']		 = $row['t_id'];
			$query_results['t_oauth_token']		 = $row['t_oauth_token'];
			$query_results['t_oauth_token_secret']		 = $row['t_oauth_token_secret'];
			$query_results['display_name']		 = $row['display_name'];
			$query_results['backup_email']		 = $row['backup_email'];
			$query_results['locations']		 = $row['locations'];
			$query_results['publisher_society_id']		 = $row['publisher_society_id'];
			$query_results['publisher_admin_id']		 = $row['publisher_admin_id'];
			$query_results['admin_id']		 = $row['admin_id'];
			$query_results['temp']		 = $row['temp'];

			$results[]		 = $query_results;


         }

      }
      
//            echo '<pre>';
//            print_r($results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( 'writer_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'writer' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['writer_id']		 = $row['writer_id'];
		$query_results['img_id']		 = $row['img_id'];
		$query_results['first_name']		 = $row['first_name'];
		$query_results['middle_name']		 = $row['middle_name'];
		$query_results['last_name']		 = $row['last_name'];
		$query_results['suffix_name']		 = $row['suffix_name'];
		$query_results['alias_name']		 = $row['alias_name'];
		$query_results['email']		 = $row['email'];
		$query_results['password']		 = $row['password'];
		$query_results['bcryptPassword']		 = $row['bcryptPassword'];
		$query_results['u_id']		 = $row['u_id'];
		$query_results['access_token']		 = $row['access_token'];
		$query_results['gender']		 = $row['gender'];
		$query_results['birthday']		 = $row['birthday'];
		$query_results['full_name']		 = $row['full_name'];
		$query_results['date_joined']		 = $row['date_joined'];
		$query_results['last_login']		 = $row['last_login'];
		$query_results['phone']		 = $row['phone'];
		$query_results['language_id']		 = $row['language_id'];
		$query_results['society_id']		 = $row['society_id'];
		$query_results['ipi']		 = $row['ipi'];
		$query_results['publisher_ascap']		 = $row['publisher_ascap'];
		$query_results['publisher_bmi']		 = $row['publisher_bmi'];
		$query_results['publisher_sesac']		 = $row['publisher_sesac'];
		$query_results['other_publisher_alias']		 = $row['other_publisher_alias'];
		$query_results['admin_contact_id']		 = $row['admin_contact_id'];
		$query_results['attorney_id']		 = $row['attorney_id'];
		$query_results['attorney_authorized']		 = $row['attorney_authorized'];
		$query_results['manager_id']		 = $row['manager_id'];
		$query_results['manager_authorized']		 = $row['manager_authorized'];
		$query_results['notification']		 = $row['notification'];
		$query_results['notifiy_manager']		 = $row['notifiy_manager'];
		$query_results['notifiy_attorney']		 = $row['notifiy_attorney'];
		$query_results['notifiy_admin']		 = $row['notifiy_admin'];
		$query_results['notifiy_society']		 = $row['notifiy_society'];
		$query_results['t_id']		 = $row['t_id'];
		$query_results['t_oauth_token']		 = $row['t_oauth_token'];
		$query_results['t_oauth_token_secret']		 = $row['t_oauth_token_secret'];
		$query_results['display_name']		 = $row['display_name'];
		$query_results['backup_email']		 = $row['backup_email'];
		$query_results['locations']		 = $row['locations'];
		$query_results['publisher_society_id']		 = $row['publisher_society_id'];
		$query_results['publisher_admin_id']		 = $row['publisher_admin_id'];
		$query_results['admin_id']		 = $row['admin_id'];
		$query_results['temp']		 = $row['temp'];

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

      $this->db_songsplits_live->insert('writer', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('writer_id', $keyvalue);
      $this->db_songsplits_live->update('writer', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('writer_id', $idField);
      // $this->db_songsplits_live->delete('writer');

      return true;

   }

	function get_Writer_id() {
		return $this->writer_id;	}

	function set_Writer_id($writer_id) {
		$this->writer_id = $writer_id;	}

	function get_Img_id() {
		return $this->img_id;	}

	function set_Img_id($img_id) {
		$this->img_id = $img_id;	}

	function get_First_name() {
		return $this->first_name;	}

	function set_First_name($first_name) {
		$this->first_name = $first_name;	}

	function get_Middle_name() {
		return $this->middle_name;	}

	function set_Middle_name($middle_name) {
		$this->middle_name = $middle_name;	}

	function get_Last_name() {
		return $this->last_name;	}

	function set_Last_name($last_name) {
		$this->last_name = $last_name;	}

	function get_Suffix_name() {
		return $this->suffix_name;	}

	function set_Suffix_name($suffix_name) {
		$this->suffix_name = $suffix_name;	}

	function get_Alias_name() {
		return $this->alias_name;	}

	function set_Alias_name($alias_name) {
		$this->alias_name = $alias_name;	}

	function get_Email() {
		return $this->email;	}

	function set_Email($email) {
		$this->email = $email;	}

	function get_Password() {
		return $this->password;	}

	function set_Password($password) {
		$this->password = $password;	}

	function get_BcryptPassword() {
		return $this->bcryptPassword;	}

	function set_BcryptPassword($bcryptPassword) {
		$this->bcryptPassword = $bcryptPassword;	}

	function get_U_id() {
		return $this->u_id;	}

	function set_U_id($u_id) {
		$this->u_id = $u_id;	}

	function get_Access_token() {
		return $this->access_token;	}

	function set_Access_token($access_token) {
		$this->access_token = $access_token;	}

	function get_Gender() {
		return $this->gender;	}

	function set_Gender($gender) {
		$this->gender = $gender;	}

	function get_Birthday() {
		return $this->birthday;	}

	function set_Birthday($birthday) {
		$this->birthday = $birthday;	}

	function get_Full_name() {
		return $this->full_name;	}

	function set_Full_name($full_name) {
		$this->full_name = $full_name;	}

	function get_Date_joined() {
		return $this->date_joined;	}

	function set_Date_joined($date_joined) {
		$this->date_joined = $date_joined;	}

	function get_Last_login() {
		return $this->last_login;	}

	function set_Last_login($last_login) {
		$this->last_login = $last_login;	}

	function get_Phone() {
		return $this->phone;	}

	function set_Phone($phone) {
		$this->phone = $phone;	}

	function get_Language_id() {
		return $this->language_id;	}

	function set_Language_id($language_id) {
		$this->language_id = $language_id;	}

	function get_Society_id() {
		return $this->society_id;	}

	function set_Society_id($society_id) {
		$this->society_id = $society_id;	}

	function get_Ipi() {
		return $this->ipi;	}

	function set_Ipi($ipi) {
		$this->ipi = $ipi;	}

	function get_Publisher_ascap() {
		return $this->publisher_ascap;	}

	function set_Publisher_ascap($publisher_ascap) {
		$this->publisher_ascap = $publisher_ascap;	}

	function get_Publisher_bmi() {
		return $this->publisher_bmi;	}

	function set_Publisher_bmi($publisher_bmi) {
		$this->publisher_bmi = $publisher_bmi;	}

	function get_Publisher_sesac() {
		return $this->publisher_sesac;	}

	function set_Publisher_sesac($publisher_sesac) {
		$this->publisher_sesac = $publisher_sesac;	}

	function get_Other_publisher_alias() {
		return $this->other_publisher_alias;	}

	function set_Other_publisher_alias($other_publisher_alias) {
		$this->other_publisher_alias = $other_publisher_alias;	}

	function get_Admin_contact_id() {
		return $this->admin_contact_id;	}

	function set_Admin_contact_id($admin_contact_id) {
		$this->admin_contact_id = $admin_contact_id;	}

	function get_Attorney_id() {
		return $this->attorney_id;	}

	function set_Attorney_id($attorney_id) {
		$this->attorney_id = $attorney_id;	}

	function get_Attorney_authorized() {
		return $this->attorney_authorized;	}

	function set_Attorney_authorized($attorney_authorized) {
		$this->attorney_authorized = $attorney_authorized;	}

	function get_Manager_id() {
		return $this->manager_id;	}

	function set_Manager_id($manager_id) {
		$this->manager_id = $manager_id;	}

	function get_Manager_authorized() {
		return $this->manager_authorized;	}

	function set_Manager_authorized($manager_authorized) {
		$this->manager_authorized = $manager_authorized;	}

	function get_Notification() {
		return $this->notification;	}

	function set_Notification($notification) {
		$this->notification = $notification;	}

	function get_Notifiy_manager() {
		return $this->notifiy_manager;	}

	function set_Notifiy_manager($notifiy_manager) {
		$this->notifiy_manager = $notifiy_manager;	}

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

	function get_Display_name() {
		return $this->display_name;	}

	function set_Display_name($display_name) {
		$this->display_name = $display_name;	}

	function get_Backup_email() {
		return $this->backup_email;	}

	function set_Backup_email($backup_email) {
		$this->backup_email = $backup_email;	}

	function get_Locations() {
		return $this->locations;	}

	function set_Locations($locations) {
		$this->locations = $locations;	}

	function get_Publisher_society_id() {
		return $this->publisher_society_id;	}

	function set_Publisher_society_id($publisher_society_id) {
		$this->publisher_society_id = $publisher_society_id;	}

	function get_Publisher_admin_id() {
		return $this->publisher_admin_id;	}

	function set_Publisher_admin_id($publisher_admin_id) {
		$this->publisher_admin_id = $publisher_admin_id;	}

	function get_Admin_id() {
		return $this->admin_id;	}

	function set_Admin_id($admin_id) {
		$this->admin_id = $admin_id;	}

	function get_Temp() {
		return $this->temp;	}

	function set_Temp($temp) {
		$this->temp = $temp;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Writer()
      {
		$this->writer_id = "";
		$this->img_id = "";
		$this->first_name = "";
		$this->middle_name = "";
		$this->last_name = "";
		$this->suffix_name = "";
		$this->alias_name = "";
		$this->email = "";
		$this->password = "";
		$this->bcryptPassword = "";
		$this->u_id = "";
		$this->access_token = "";
		$this->gender = "";
		$this->birthday = "";
		$this->full_name = "";
		$this->date_joined = "";
		$this->last_login = "";
		$this->phone = "";
		$this->language_id = "";
		$this->society_id = "";
		$this->ipi = "";
		$this->publisher_ascap = "";
		$this->publisher_bmi = "";
		$this->publisher_sesac = "";
		$this->other_publisher_alias = "";
		$this->admin_contact_id = "";
		$this->attorney_id = "";
		$this->attorney_authorized = "";
		$this->manager_id = "";
		$this->manager_authorized = "";
		$this->notification = "";
		$this->notifiy_manager = "";
		$this->notifiy_attorney = "";
		$this->notifiy_admin = "";
		$this->notifiy_society = "";
		$this->t_id = "";
		$this->t_oauth_token = "";
		$this->t_oauth_token_secret = "";
		$this->display_name = "";
		$this->backup_email = "";
		$this->locations = "";
		$this->publisher_society_id = "";
		$this->publisher_admin_id = "";
		$this->admin_id = "";
		$this->temp = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyWriter()
      {
		$this->writer_id = "";
		$this->img_id = "";
		$this->first_name = "";
		$this->middle_name = "";
		$this->last_name = "";
		$this->suffix_name = "";
		$this->alias_name = "";
		$this->email = "";
		$this->password = "";
		$this->bcryptPassword = "";
		$this->u_id = "";
		$this->access_token = "";
		$this->gender = "";
		$this->birthday = "";
		$this->full_name = "";
		$this->date_joined = "";
		$this->last_login = "";
		$this->phone = "";
		$this->language_id = "";
		$this->society_id = "";
		$this->ipi = "";
		$this->publisher_ascap = "";
		$this->publisher_bmi = "";
		$this->publisher_sesac = "";
		$this->other_publisher_alias = "";
		$this->admin_contact_id = "";
		$this->attorney_id = "";
		$this->attorney_authorized = "";
		$this->manager_id = "";
		$this->manager_authorized = "";
		$this->notification = "";
		$this->notifiy_manager = "";
		$this->notifiy_attorney = "";
		$this->notifiy_admin = "";
		$this->notifiy_society = "";
		$this->t_id = "";
		$this->t_oauth_token = "";
		$this->t_oauth_token_secret = "";
		$this->display_name = "";
		$this->backup_email = "";
		$this->locations = "";
		$this->publisher_society_id = "";
		$this->publisher_admin_id = "";
		$this->admin_id = "";
		$this->temp = "";

      }
      
      
      function migrate_writer_to_writer() {

          $count_all = $this->count_all();//633642
          $count = 300;//take on oe bite
          echo '<pre>';
          print_r($count_all);

          for ($start = 0; $start < $count_all; $start = $start + $count) {
              
              
              
              
               $this->load->model('songsplits_live/writermodel', 'writermodel_live');
               //$this->db_songsplits_live->limit(4, $offset);
               //$start = $offset; 
               
               $the_results['writer_list'] = $this->writermodel_live->find(NULL, $start, $count);  // Send the retrievelist msg
               
            
               echo '<pre>';
               var_dump($the_results);
               
               
               if( ! empty($the_results['writer_list']) )
               {
                   $this->load->model('songsplits_api_new/writermodel_api');
                   $this->writermodel_api->migrate_writer_to_writer($the_results);
               }
               
          }
          
          echo '<pre>';
          print_r($start);
            echo '<pre>';
            print_r($count_all);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
          die(__FILE__.__LINE__);
      	 
          
          

      }
      
      
       function migrate_writer_to_user() {

          $count_all = $this->count_all();//all live.writer records = 633642
          $count = 300;//take on oe bite
          echo '<pre>';
          print_r($count_all);

          for ($start = 1000; $start < $count_all; $start = $start + $count) {
              
              
              
              
               $this->load->model('songsplits_live/writermodel', 'writermodel_live');
               //$this->db_songsplits_live->limit(4, $offset);
               //$start = $offset; 
               
               $the_results['writer_list'] = $this->writermodel_live->find(NULL, $start, $count);  // Send the retrievelist msg
               
            
               //echo '<pre>';
               //var_dump($the_results);
               
               
               if( ! empty($the_results['writer_list']) )
               {
                   $this->load->model('songsplits_api_new/usermodel', 'usermodel_api');
                   $this->usermodel_api->migrate_writer_to_user($the_results);
               }
               
          }
          
          echo '<pre>';
          print_r($start);
            echo '<pre>';
            print_r($count_all);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
          die(__FILE__.__LINE__);
      	 
          
          

      }
      
      
      

}

?>
