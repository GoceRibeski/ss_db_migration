<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Admin.php
 *
 * DESCRIPTION   : Admin module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:21 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Admin
 * @subpackage          admin component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Admin extends CI_Controller {

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
   // Description: Extracts a list of all admin data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the admin model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/adminmodel');                  // Instantiate the model
      $the_results['admin_list'] = $this->adminmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['admin_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('admin/showall/');   // or just /admin/
      $config['total_rows']   = $this->adminmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/admin/admingrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/admin/admingrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new admin entry
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
         $this->load->model('songsplits_live/adminmodel');

         /*
		// XXS Filtering enforced for user input
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['admin_name']		= $this->input->post('admin_name', TRUE);
		$data['adminParent_id']		= $this->input->post('adminParent_id', TRUE);
		$data['street']		= $this->input->post('street', TRUE);
		$data['country']		= $this->input->post('country', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

         */
         $data = $this->_get_form_values();

         $this->adminmodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/admin/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['admin_id']		= '';
		$data['admin_name']		= '';
		$data['adminParent_id']		= '';
		$data['street']		= '';
		$data['country']		= '';
		$data['phone']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['last_login']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/admin/admindetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/admin/admindetails', $data);


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
         $this->load->model('songsplits_live/adminmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['admin_name']		= $this->input->post('admin_name', TRUE);
		$data['adminParent_id']		= $this->input->post('adminParent_id', TRUE);
		$data['street']		= $this->input->post('street', TRUE);
		$data['country']		= $this->input->post('country', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

         */
         $data = $this->_get_form_values();

         $this->adminmodel->modify($data['admin_id'], $data);

         redirect('/songsplits_live/admin/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/adminmodel');
         $data = $this->adminmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/admin/admindetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/admin/admindetails', $data);


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

      $this->load->model('songsplits_live/adminmodel');
      $the_results = $this->adminmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/admin/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['admin_id']		= '';
		$data['admin_name']		= '';
		$data['adminParent_id']		= '';
		$data['street']		= '';
		$data['country']		= '';
		$data['phone']		= '';
		$data['email']		= '';
		$data['password']		= '';
		$data['last_login']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['admin_name']		= $this->input->post('admin_name', TRUE);
		$data['adminParent_id']		= $this->input->post('adminParent_id', TRUE);
		$data['street']		= $this->input->post('street', TRUE);
		$data['country']		= $this->input->post('country', TRUE);
		$data['phone']		= $this->input->post('phone', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['password']		= $this->input->post('password', TRUE);
		$data['last_login']		= $this->input->post('last_login', TRUE);

      return $data;

   }

}
?>