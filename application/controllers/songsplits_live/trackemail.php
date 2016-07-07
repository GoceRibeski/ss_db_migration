<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Trackemail.php
 *
 * DESCRIPTION   : Trackemail module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:28 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Trackemail
 * @subpackage          trackemail component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Trackemail extends CI_Controller {

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
   // Description: Extracts a list of all trackemail data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the trackemail model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/trackemailmodel');                  // Instantiate the model
      $the_results['trackemail_list'] = $this->trackemailmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['trackemail_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('trackemail/showall/');   // or just /trackemail/
      $config['total_rows']   = $this->trackemailmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/trackemail/trackemailgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/trackemail/trackemailgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new trackemail entry
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
         $this->load->model('songsplits_live/trackemailmodel');

         /*
		// XXS Filtering enforced for user input
		$data['track_id']		= $this->input->post('track_id', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['new_writer_id']		= $this->input->post('new_writer_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_added']		= $this->input->post('date_added', TRUE);

         */
         $data = $this->_get_form_values();

         $this->trackemailmodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/trackemail/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['track_id']		= '';
		$data['writer_id']		= '';
		$data['new_writer_id']		= '';
		$data['email']		= '';
		$data['date_added']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/trackemail/trackemaildetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/trackemail/trackemaildetails', $data);


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
         $this->load->model('songsplits_live/trackemailmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['track_id']		= $this->input->post('track_id', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['new_writer_id']		= $this->input->post('new_writer_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_added']		= $this->input->post('date_added', TRUE);

         */
         $data = $this->_get_form_values();

         $this->trackemailmodel->modify($data['track_id'], $data);

         redirect('/songsplits_live/trackemail/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/trackemailmodel');
         $data = $this->trackemailmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/trackemail/trackemaildetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/trackemail/trackemaildetails', $data);


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

      $this->load->model('songsplits_live/trackemailmodel');
      $the_results = $this->trackemailmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/trackemail/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['track_id']		= '';
		$data['writer_id']		= '';
		$data['new_writer_id']		= '';
		$data['email']		= '';
		$data['date_added']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['track_id']		= $this->input->post('track_id', TRUE);
		$data['writer_id']		= $this->input->post('writer_id', TRUE);
		$data['new_writer_id']		= $this->input->post('new_writer_id', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_added']		= $this->input->post('date_added', TRUE);

      return $data;

   }

}
?>