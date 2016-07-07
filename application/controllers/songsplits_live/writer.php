<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Writer.php
 *
 * DESCRIPTION   : Writer module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:29 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Writer
 * @subpackage          writer component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Writer extends CI_Controller {

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
   // Description: Extracts a list of all writer data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the writer model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/writermodel');                  // Instantiate the model
      $the_results['writer_list'] = $this->writermodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['writer_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('writer/showall/');   // or just /writer/
      $config['total_rows']   = $this->writermodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/writer/writergrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/writer/writergrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new writer entry
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
         $this->load->model('songsplits_live/writermodel');

         /*
		// XXS Filtering enforced for user input
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['middle_name']		= $this->input->post('middle_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['suffix_name']		= $this->input->post('suffix_name', TRUE);
		$data['alias_name']		= $this->input->post('alias_name', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['bcryptPassword']		= $this->input->post('bcryptPassword', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['gender']		= $this->input->post('gender', TRUE);
		$data['birthday']		= $this->input->post('birthday', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['ipi']		= $this->input->post('ipi', TRUE);
		$data['publisher_ascap']		= $this->input->post('publisher_ascap', TRUE);
		$data['publisher_bmi']		= $this->input->post('publisher_bmi', TRUE);
		$data['publisher_sesac']		= $this->input->post('publisher_sesac', TRUE);
		$data['other_publisher_alias']		= $this->input->post('other_publisher_alias', TRUE);
		$data['admin_contact_id']		= $this->input->post('admin_contact_id', TRUE);
		$data['attorney_id']		= $this->input->post('attorney_id', TRUE);
		$data['attorney_authorized']		= $this->input->post('attorney_authorized', TRUE);
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['manager_authorized']		= $this->input->post('manager_authorized', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['notifiy_manager']		= $this->input->post('notifiy_manager', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['display_name']		= $this->input->post('display_name', TRUE);
		$data['backup_email']		= $this->input->post('backup_email', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['publisher_society_id']		= $this->input->post('publisher_society_id', TRUE);
		$data['publisher_admin_id']		= $this->input->post('publisher_admin_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['temp']		= $this->input->post('temp', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writermodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/writer/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['writer_id']		= '';
		$data['img_id']		= '';
		$data['first_name']		= '';
		$data['middle_name']		= '';
		$data['last_name']		= '';
		$data['suffix_name']		= '';
		$data['alias_name']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['bcryptPassword']		= '';
		$data['u_id']		= '';
		$data['access_token']		= '';
		$data['gender']		= '';
		$data['birthday']		= '';
		$data['full_name']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';
		$data['phone']		= '';
		$data['language_id']		= '';
		$data['society_id']		= '';
		$data['ipi']		= '';
		$data['publisher_ascap']		= '';
		$data['publisher_bmi']		= '';
		$data['publisher_sesac']		= '';
		$data['other_publisher_alias']		= '';
		$data['admin_contact_id']		= '';
		$data['attorney_id']		= '';
		$data['attorney_authorized']		= '';
		$data['manager_id']		= '';
		$data['manager_authorized']		= '';
		$data['notification']		= '';
		$data['notifiy_manager']		= '';
		$data['notifiy_attorney']		= '';
		$data['notifiy_admin']		= '';
		$data['notifiy_society']		= '';
		$data['t_id']		= '';
		$data['t_oauth_token']		= '';
		$data['t_oauth_token_secret']		= '';
		$data['display_name']		= '';
		$data['backup_email']		= '';
		$data['locations']		= '';
		$data['publisher_society_id']		= '';
		$data['publisher_admin_id']		= '';
		$data['admin_id']		= '';
		$data['temp']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/writer/writerdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/writer/writerdetails', $data);


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
         $this->load->model('songsplits_live/writermodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['middle_name']		= $this->input->post('middle_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['suffix_name']		= $this->input->post('suffix_name', TRUE);
		$data['alias_name']		= $this->input->post('alias_name', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['bcryptPassword']		= $this->input->post('bcryptPassword', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['gender']		= $this->input->post('gender', TRUE);
		$data['birthday']		= $this->input->post('birthday', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['ipi']		= $this->input->post('ipi', TRUE);
		$data['publisher_ascap']		= $this->input->post('publisher_ascap', TRUE);
		$data['publisher_bmi']		= $this->input->post('publisher_bmi', TRUE);
		$data['publisher_sesac']		= $this->input->post('publisher_sesac', TRUE);
		$data['other_publisher_alias']		= $this->input->post('other_publisher_alias', TRUE);
		$data['admin_contact_id']		= $this->input->post('admin_contact_id', TRUE);
		$data['attorney_id']		= $this->input->post('attorney_id', TRUE);
		$data['attorney_authorized']		= $this->input->post('attorney_authorized', TRUE);
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['manager_authorized']		= $this->input->post('manager_authorized', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['notifiy_manager']		= $this->input->post('notifiy_manager', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['display_name']		= $this->input->post('display_name', TRUE);
		$data['backup_email']		= $this->input->post('backup_email', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['publisher_society_id']		= $this->input->post('publisher_society_id', TRUE);
		$data['publisher_admin_id']		= $this->input->post('publisher_admin_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['temp']		= $this->input->post('temp', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writermodel->modify($data['writer_id'], $data);

         redirect('/songsplits_live/writer/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/writermodel');
         $data = $this->writermodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/writer/writerdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/writer/writerdetails', $data);


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

      $this->load->model('songsplits_live/writermodel');
      $the_results = $this->writermodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/writer/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['writer_id']		= '';
		$data['img_id']		= '';
		$data['first_name']		= '';
		$data['middle_name']		= '';
		$data['last_name']		= '';
		$data['suffix_name']		= '';
		$data['alias_name']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['bcryptPassword']		= '';
		$data['u_id']		= '';
		$data['access_token']		= '';
		$data['gender']		= '';
		$data['birthday']		= '';
		$data['full_name']		= '';
		$data['date_joined']		= '';
		$data['last_login']		= '';
		$data['phone']		= '';
		$data['language_id']		= '';
		$data['society_id']		= '';
		$data['ipi']		= '';
		$data['publisher_ascap']		= '';
		$data['publisher_bmi']		= '';
		$data['publisher_sesac']		= '';
		$data['other_publisher_alias']		= '';
		$data['admin_contact_id']		= '';
		$data['attorney_id']		= '';
		$data['attorney_authorized']		= '';
		$data['manager_id']		= '';
		$data['manager_authorized']		= '';
		$data['notification']		= '';
		$data['notifiy_manager']		= '';
		$data['notifiy_attorney']		= '';
		$data['notifiy_admin']		= '';
		$data['notifiy_society']		= '';
		$data['t_id']		= '';
		$data['t_oauth_token']		= '';
		$data['t_oauth_token_secret']		= '';
		$data['display_name']		= '';
		$data['backup_email']		= '';
		$data['locations']		= '';
		$data['publisher_society_id']		= '';
		$data['publisher_admin_id']		= '';
		$data['admin_id']		= '';
		$data['temp']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['img_id']		= $this->input->post('img_id', TRUE);
		$data['first_name']		= $this->input->post('first_name', TRUE);
		$data['middle_name']		= $this->input->post('middle_name', TRUE);
		$data['last_name']		= $this->input->post('last_name', TRUE);
		$data['suffix_name']		= $this->input->post('suffix_name', TRUE);
		$data['alias_name']		= $this->input->post('alias_name', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['bcryptPassword']		= $this->input->post('bcryptPassword', TRUE);
		$data['u_id']		= $this->input->post('u_id', TRUE);
		$data['access_token']		= $this->input->post('access_token', TRUE);
		$data['gender']		= $this->input->post('gender', TRUE);
		$data['birthday']		= $this->input->post('birthday', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['date_joined']		= $this->input->post('date_joined', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['language_id']		= $this->input->post('language_id', TRUE);
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['ipi']		= $this->input->post('ipi', TRUE);
		$data['publisher_ascap']		= $this->input->post('publisher_ascap', TRUE);
		$data['publisher_bmi']		= $this->input->post('publisher_bmi', TRUE);
		$data['publisher_sesac']		= $this->input->post('publisher_sesac', TRUE);
		$data['other_publisher_alias']		= $this->input->post('other_publisher_alias', TRUE);
		$data['admin_contact_id']		= $this->input->post('admin_contact_id', TRUE);
		$data['attorney_id']		= $this->input->post('attorney_id', TRUE);
		$data['attorney_authorized']		= $this->input->post('attorney_authorized', TRUE);
		$data['manager_id']		= $this->input->post('manager_id', TRUE);
		$data['manager_authorized']		= $this->input->post('manager_authorized', TRUE);
		$data['notification']		= $this->input->post('notification', TRUE);
		$data['notifiy_manager']		= $this->input->post('notifiy_manager', TRUE);
		$data['notifiy_attorney']		= $this->input->post('notifiy_attorney', TRUE);
		$data['notifiy_admin']		= $this->input->post('notifiy_admin', TRUE);
		$data['notifiy_society']		= $this->input->post('notifiy_society', TRUE);
		$data['t_id']		= $this->input->post('t_id', TRUE);
		$data['t_oauth_token']		= $this->input->post('t_oauth_token', TRUE);
		$data['t_oauth_token_secret']		= $this->input->post('t_oauth_token_secret', TRUE);
		$data['display_name']		= $this->input->post('display_name', TRUE);
		$data['backup_email']		= $this->input->post('backup_email', TRUE);
		$data['locations']		= $this->input->post('locations', TRUE);
		$data['publisher_society_id']		= $this->input->post('publisher_society_id', TRUE);
		$data['publisher_admin_id']		= $this->input->post('publisher_admin_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['temp']		= $this->input->post('temp', TRUE);

      return $data;

   }

}
?>