<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Manager.php
 *
 * DESCRIPTION   : Manager module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:25 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Manager
 * @subpackage          manager component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Manager extends CI_Controller {

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
   // Description: Extracts a list of all manager data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the manager model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/managermodel');                  // Instantiate the model
      $the_results['manager_list'] = $this->managermodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['manager_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('manager/showall/');   // or just /manager/
      $config['total_rows']   = $this->managermodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/manager/managergrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/manager/managergrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new manager entry
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
         $this->load->model('songsplits_live/managermodel');

         /*
		// XXS Filtering enforced for user input
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['alias']		= $this->input->post('alias', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['alt_email']		= $this->input->post('alt_email', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['super']		= $this->input->post('super', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['company']		= $this->input->post('company', TRUE);
		$data['notifiy_client']		= $this->input->post('notifiy_client', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

         */
         $data = $this->_get_form_values();

         $this->managermodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/manager/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['manager_id']		= '';
		$data['full_name']		= '';
		$data['alias']		= '';
		$data['language_id']		= '';
		$data['notification']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['alt_email']		= '';
		$data['phone']		= '';
		$data['super']		= '';
		$data['locations']		= '';
		$data['company']		= '';
		$data['notifiy_client']		= '';
		$data['notifiy_attorney']		= '';
		$data['notifiy_admin']		= '';
		$data['notifiy_society']		= '';
		$data['u_id']		= '';
		$data['access_token']		= '';
		$data['t_id']		= '';
		$data['t_oauth_token']		= '';
		$data['t_oauth_token_secret']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/manager/managerdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/manager/managerdetails', $data);


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
         $this->load->model('songsplits_live/managermodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['alias']		= $this->input->post('alias', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['alt_email']		= $this->input->post('alt_email', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['super']		= $this->input->post('super', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['company']		= $this->input->post('company', TRUE);
		$data['notifiy_client']		= $this->input->post('notifiy_client', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

         */
         $data = $this->_get_form_values();

         $this->managermodel->modify($data['manager_id'], $data);

         redirect('/songsplits_live/manager/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/managermodel');
         $data = $this->managermodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/manager/managerdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/manager/managerdetails', $data);


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

      $this->load->model('songsplits_live/managermodel');
      $the_results = $this->managermodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/manager/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['manager_id']		= '';
		$data['full_name']		= '';
		$data['alias']		= '';
		$data['language_id']		= '';
		$data['notification']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['alt_email']		= '';
		$data['phone']		= '';
		$data['super']		= '';
		$data['locations']		= '';
		$data['company']		= '';
		$data['notifiy_client']		= '';
		$data['notifiy_attorney']		= '';
		$data['notifiy_admin']		= '';
		$data['notifiy_society']		= '';
		$data['u_id']		= '';
		$data['access_token']		= '';
		$data['t_id']		= '';
		$data['t_oauth_token']		= '';
		$data['t_oauth_token_secret']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['alias']		= $this->input->post('alias', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['alt_email']		= $this->input->post('alt_email', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['super']		= $this->input->post('super', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['company']		= $this->input->post('company', TRUE);
		$data['notifiy_client']		= $this->input->post('notifiy_client', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

      return $data;

   }

}
?>