<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Writer_administrator.php
 *
 * DESCRIPTION   : Writer_administrator module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:18 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Writer_administrator
 * @subpackage          writer_administrator component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Writer_administrator extends CI_Controller {

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
   // Description: Extracts a list of all writer_administrator data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the writer_administrator model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_api/writer_administratormodel');                  // Instantiate the model
      $the_results['writer_administrator_list'] = $this->writer_administratormodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['writer_administrator_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('writer_administrator/showall/');   // or just /writer_administrator/
      $config['total_rows']   = $this->writer_administratormodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_api/layout');

      $this->layout->render_page('/songsplits_api/writer_administrator/writer_administratorgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_api/writer_administrator/writer_administratorgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new writer_administrator entry
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
         $this->load->model('songsplits_api/writer_administratormodel');

         /*
		// XXS Filtering enforced for user input
		$data['wa_id']		= $this->input->post('wa_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['access_type']		= $this->input->post('access_type', TRUE);
		$data['rel_type']		= $this->input->post('rel_type', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writer_administratormodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_api/writer_administrator/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['wa_id']		= '';
		$data['admin_id']		= '';
		$data['user_id']		= '';
		$data['access_type']		= '';
		$data['rel_type']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_api/layout');
         $this->layout->render_page('/songsplits_api/writer_administrator/writer_administratordetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_api/writer_administrator/writer_administratordetails', $data);


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
         $this->load->model('songsplits_api/writer_administratormodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['wa_id']		= $this->input->post('wa_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['access_type']		= $this->input->post('access_type', TRUE);
		$data['rel_type']		= $this->input->post('rel_type', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writer_administratormodel->modify($data['wa_id'], $data);

         redirect('/songsplits_api/writer_administrator/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_api/writer_administratormodel');
         $data = $this->writer_administratormodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_api/layout');
         $this->layout->render_page('/songsplits_api/writer_administrator/writer_administratordetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_api/writer_administrator/writer_administratordetails', $data);


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

      $this->load->model('songsplits_api/writer_administratormodel');
      $the_results = $this->writer_administratormodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_api/writer_administrator/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['wa_id']		= '';
		$data['admin_id']		= '';
		$data['user_id']		= '';
		$data['access_type']		= '';
		$data['rel_type']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['wa_id']		= $this->input->post('wa_id', TRUE);
		$data['admin_id']		= $this->input->post('admin_id', TRUE);
		$data['user_id']		= $this->input->post('user_id', TRUE);
		$data['access_type']		= $this->input->post('access_type', TRUE);
		$data['rel_type']		= $this->input->post('rel_type', TRUE);

      return $data;

   }

}
?>