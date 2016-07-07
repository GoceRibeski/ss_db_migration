<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Writer_split.php
 *
 * DESCRIPTION   : Writer_split module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 02:44 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Writer_split
 * @subpackage          writer_split component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Writer_split extends CI_Controller {

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
   // Description: Extracts a list of all writer_split data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the writer_split model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_api/writer_splitmodel');                  // Instantiate the model
      $the_results['writer_split_list'] = $this->writer_splitmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['writer_split_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('writer_split/showall/');   // or just /writer_split/
      $config['total_rows']   = $this->writer_splitmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_api/layout');

      $this->layout->render_page('/songsplits_api/writer_split/writer_splitgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_api/writer_split/writer_splitgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new writer_split entry
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
         $this->load->model('songsplits_api/writer_splitmodel');

         /*
		// XXS Filtering enforced for user input
		$data['confirmed']		= $this->input->post('confirmed', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['role']		= $this->input->post('role', TRUE);
		$data['split']		= $this->input->post('split', TRUE);
		$data['split_id']		= $this->input->post('split_id', TRUE);
		$data['split_type']		= $this->input->post('split_type', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['version']		= $this->input->post('version', TRUE);
		$data['work_id']		= $this->input->post('work_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writer_splitmodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_api/writer_split/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['confirmed']		= '';
		$data['created']		= '';
		$data['writer_id']		= '';
		$data['role']		= '';
		$data['split']		= '';
		$data['split_id']		= '';
		$data['split_type']		= '';
		$data['status_id']		= '';
		$data['version']		= '';
		$data['work_id']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_api/layout');
         $this->layout->render_page('/songsplits_api/writer_split/writer_splitdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_api/writer_split/writer_splitdetails', $data);


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
         $this->load->model('songsplits_api/writer_splitmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['confirmed']		= $this->input->post('confirmed', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['role']		= $this->input->post('role', TRUE);
		$data['split']		= $this->input->post('split', TRUE);
		$data['split_id']		= $this->input->post('split_id', TRUE);
		$data['split_type']		= $this->input->post('split_type', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['version']		= $this->input->post('version', TRUE);
		$data['work_id']		= $this->input->post('work_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->writer_splitmodel->modify($data['split_id'], $data);

         redirect('/songsplits_api/writer_split/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_api/writer_splitmodel');
         $data = $this->writer_splitmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_api/layout');
         $this->layout->render_page('/songsplits_api/writer_split/writer_splitdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_api/writer_split/writer_splitdetails', $data);


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

      $this->load->model('songsplits_api/writer_splitmodel');
      $the_results = $this->writer_splitmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_api/writer_split/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['confirmed']		= '';
		$data['created']		= '';
		$data['writer_id']		= '';
		$data['role']		= '';
		$data['split']		= '';
		$data['split_id']		= '';
		$data['split_type']		= '';
		$data['status_id']		= '';
		$data['version']		= '';
		$data['work_id']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['confirmed']		= $this->input->post('confirmed', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['role']		= $this->input->post('role', TRUE);
		$data['split']		= $this->input->post('split', TRUE);
		$data['split_id']		= $this->input->post('split_id', TRUE);
		$data['split_type']		= $this->input->post('split_type', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['version']		= $this->input->post('version', TRUE);
		$data['work_id']		= $this->input->post('work_id', TRUE);

      return $data;

   }

}
?>