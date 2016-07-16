<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : User.php
 *
 * DESCRIPTION   : User module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:10 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             User
 * @subpackage          user component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class User extends CI_Controller {

   /**
   * Contructor function
   *
   * Load the instance of CI by invoking the parent constructor
   *
   * @access      public
   * @return      none
   */
   public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

   /**
   * "Index" Page
   *
   * Default class action
   *
   * @access      public
   * @return      none
   */

   function index() {
      // The default action is the showall action
      $this->browse();

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Load libraries and other libraries and helpers here. The
      // NOTE: ...generated code loads the database library as it requires it,
      // NOTE: ...but you may prefer to load here or autoload, In this case
      // NOTE: ...remember to delete all explicit load()s.
      // ///////////////////////////////////////////////////////////////////////
   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: showall()
   //
   // Description: Extracts a list of all user data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the user model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 300;

      $this->load->model('songsplits_api_new/usermodel');                  // Instantiate the model
      $the_results['user_list'] = $this->usermodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['user_list']);
      
      //count splits for the user
      $this->load->model('songsplits_api_new/writer_splitmodel');
      foreach ($the_results['user_list'] as $key=>$user) {
          
//                        echo '<pre>';
//            print_r($user);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
          
        $the_results['user_list'][$key]['count_writer_split'] = $this->writer_splitmodel->count_writer_split($user['user_id']);
      }
      
      usort($the_results['user_list'], array($this,'cmp'));
       
      

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('songsplits_api_new/user/browse/');   // or just /user/
      $config['total_rows']   = $this->usermodel->table_record_count;
      $config['per_page']     = $limit_per_page;
      $config['num_links'] = 60;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_api_new/layout');

      $this->layout->render_page('/songsplits_api_new/user/usergrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('/songsplits_api_new/user/usergrid', $the_results);

   }
   
   
   function cmp($a, $b)
    {
        return $b['count_writer_split'] - $a['count_writer_split'];
    }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new user entry
   //              ...onto the database.
   //
   // //////////////////////////////////////////////////////////////////////////
   function add() {

      $this->load->helper('url');

      // ///////////////////////////////////////////////////////////////////////
      // How are we being invoked. The user is either requesting a form or is
      // ...submitting it.
      // ///////////////////////////////////////////////////////////////////////
      $submit = $this->input->post('Submit');

      if ( $submit != false ) {
         // ////////////////////////////////////////////////////////////////////
         // User is submitting data
         // Store the values from the form onto the db
         // ////////////////////////////////////////////////////////////////////
         $this->load->model('songsplits_api_new/usermodel');

         /*
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['group_id']		= $this->input->post('group_id', TRUE);
		$data['usr_verified']		= $this->input->post('usr_verified', TRUE);
		$data['main_user_type']		= $this->input->post('main_user_type', TRUE);
		$data['legal_name']		= $this->input->post('legal_name', TRUE);
		$data['alias_1']		= $this->input->post('alias_1', TRUE);
		$data['alias_2']		= $this->input->post('alias_2', TRUE);
		$data['email_1']		= $this->input->post('email_1', TRUE);
		$data['email_2']		= $this->input->post('email_2', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['location_id']		= $this->input->post('location_id', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['usr_pwdresettoken']		= $this->input->post('usr_pwdresettoken', TRUE);
		$data['usr_verify_email_token']		= $this->input->post('usr_verify_email_token', TRUE);

         */
         $data = $this->_get_form_values();

         $this->usermodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_api_new/user/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['user_id']		= '';
		$data['group_id']		= '';
		$data['usr_verified']		= '';
		$data['main_user_type']		= '';
		$data['legal_name']		= '';
		$data['alias_1']		= '';
		$data['alias_2']		= '';
		$data['email_1']		= '';
		$data['email_2']		= '';
		$data['phone']		= '';
		$data['img_id']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';
		$data['location_id']		= '';
		$data['password']		= '';
		$data['language_id']		= '';
		$data['usr_pwdresettoken']		= '';
		$data['usr_verify_email_token']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_api_new/layout');
         $this->layout->render_page('/songsplits_api_new/user/userdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/songsplits_api_new/user/userdetails', $data);


      }
   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: modify()
   //
   // Description: Controller function to process user modify requests
   //
   // //////////////////////////////////////////////////////////////////////////
   function modify() {

      $this->load->helper('url');

      // ///////////////////////////////////////////////////////////////////////
      // How are we being invoked
      // ///////////////////////////////////////////////////////////////////////
      $submit = $this->input->post('Submit');

      if ( $submit != false ) {
         // ////////////////////////////////////////////////////////////////////
         // User is submitting data
         // Store the values from the form onto the db
         // ////////////////////////////////////////////////////////////////////
         $this->load->model('songsplits_api_new/usermodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['group_id']		= $this->input->post('group_id', TRUE);
		$data['usr_verified']		= $this->input->post('usr_verified', TRUE);
		$data['main_user_type']		= $this->input->post('main_user_type', TRUE);
		$data['legal_name']		= $this->input->post('legal_name', TRUE);
		$data['alias_1']		= $this->input->post('alias_1', TRUE);
		$data['alias_2']		= $this->input->post('alias_2', TRUE);
		$data['email_1']		= $this->input->post('email_1', TRUE);
		$data['email_2']		= $this->input->post('email_2', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['location_id']		= $this->input->post('location_id', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['usr_pwdresettoken']		= $this->input->post('usr_pwdresettoken', TRUE);
		$data['usr_verify_email_token']		= $this->input->post('usr_verify_email_token', TRUE);

         */
         $data = $this->_get_form_values();

         $this->usermodel->modify($data['user_id'], $data);

         redirect('/songsplits_api_new/user/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_api_new/usermodel');
         $data = $this->usermodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';
         
         
         
         
         
         $this->load->model('songsplits_api_new/writer_splitmodel');
         // here $idField = user_id = $writer_id
         $data['work_list'] = $this->writer_splitmodel->retrieve_by_writer_join_work($idField);
         
        
         //count work publishers
         $this->load->model('songsplits_api_new/publisher_splitmodel');
         foreach($data['work_list'] as $key=>$work)
         {
             $count_work_publishers =  $this->publisher_splitmodel->count_work_publishers($work['work_id']);
             $data['work_list'][$key]['count_work_publishers'] =  $count_work_publishers;
         }
         
//            echo '<pre>';
//            print_r($data['work']);
//            echo '<pre>';
//            die(__FILE__.__LINE__);


         $this->load->library('songsplits_api_new/layout');
         $this->layout->render_page('/songsplits_api_new/user/userdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/songsplits_api_new/user/userdetails', $data);


      }
   }


   // //////////////////////////////////////////////////////////////////////////
   // Function: delete()
   //
   // Description: Controller function to process user delete requests
   //
   // //////////////////////////////////////////////////////////////////////////
   function delete() {
      $idField = $this->uri->segment(4);

      $this->load->model('songsplits_api_new/usermodel');
      $the_results = $this->usermodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_api_new/user/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['user_id']		= '';
		$data['group_id']		= '';
		$data['usr_verified']		= '';
		$data['main_user_type']		= '';
		$data['legal_name']		= '';
		$data['alias_1']		= '';
		$data['alias_2']		= '';
		$data['email_1']		= '';
		$data['email_2']		= '';
		$data['phone']		= '';
		$data['img_id']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';
		$data['location_id']		= '';
		$data['password']		= '';
		$data['language_id']		= '';
		$data['usr_pwdresettoken']		= '';
		$data['usr_verify_email_token']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['group_id']		= $this->input->post('group_id', TRUE);
		$data['usr_verified']		= $this->input->post('usr_verified', TRUE);
		$data['main_user_type']		= $this->input->post('main_user_type', TRUE);
		$data['legal_name']		= $this->input->post('legal_name', TRUE);
		$data['alias_1']		= $this->input->post('alias_1', TRUE);
		$data['alias_2']		= $this->input->post('alias_2', TRUE);
		$data['email_1']		= $this->input->post('email_1', TRUE);
		$data['email_2']		= $this->input->post('email_2', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['location_id']		= $this->input->post('location_id', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['usr_pwdresettoken']		= $this->input->post('usr_pwdresettoken', TRUE);
		$data['usr_verify_email_token']		= $this->input->post('usr_verify_email_token', TRUE);

      return $data;

   }

}
?>