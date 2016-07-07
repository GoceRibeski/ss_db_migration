<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Society.php
 *
 * DESCRIPTION   : Society module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:10 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             Society
 * @subpackage          society component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Society extends CI_Controller {

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
   // Description: Extracts a list of all society data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the society model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_api_new/societymodel');                  // Instantiate the model
      $the_results['society_list'] = $this->societymodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['society_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('society/showall/');   // or just /society/
      $config['total_rows']   = $this->societymodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_api_new/layout');

      $this->layout->render_page('/songsplits_api_new/society/societygrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('/songsplits_api_new/society/societygrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new society entry
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
         $this->load->model('songsplits_api_new/societymodel');

         /*
		// XXS Filtering enforced for user input
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['short_name']		= $this->input->post('short_name', TRUE);
		$data['contact_name']		= $this->input->post('contact_name', TRUE);
		$data['contact_email']		= $this->input->post('contact_email', TRUE);
		$data['society_type']		= $this->input->post('society_type', TRUE);
		$data['society_country']		= $this->input->post('society_country', TRUE);
		$data['territory_code']		= $this->input->post('territory_code', TRUE);
		$data['affiliation_code']		= $this->input->post('affiliation_code', TRUE);

         */
         $data = $this->_get_form_values();

         $this->societymodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_api_new/society/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['society_id']		= '';
		$data['full_name']		= '';
		$data['short_name']		= '';
		$data['contact_name']		= '';
		$data['contact_email']		= '';
		$data['society_type']		= '';
		$data['society_country']		= '';
		$data['territory_code']		= '';
		$data['affiliation_code']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_api_new/layout');
         $this->layout->render_page('/songsplits_api_new/society/societydetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/songsplits_api_new/society/societydetails', $data);


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
         $this->load->model('songsplits_api_new/societymodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['short_name']		= $this->input->post('short_name', TRUE);
		$data['contact_name']		= $this->input->post('contact_name', TRUE);
		$data['contact_email']		= $this->input->post('contact_email', TRUE);
		$data['society_type']		= $this->input->post('society_type', TRUE);
		$data['society_country']		= $this->input->post('society_country', TRUE);
		$data['territory_code']		= $this->input->post('territory_code', TRUE);
		$data['affiliation_code']		= $this->input->post('affiliation_code', TRUE);

         */
         $data = $this->_get_form_values();

         $this->societymodel->modify($data['society_id'], $data);

         redirect('/songsplits_api_new/society/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_api_new/societymodel');
         $data = $this->societymodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_api_new/layout');
         $this->layout->render_page('/songsplits_api_new/society/societydetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('/songsplits_api_new/society/societydetails', $data);


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

      $this->load->model('songsplits_api_new/societymodel');
      $the_results = $this->societymodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_api_new/society/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['society_id']		= '';
		$data['full_name']		= '';
		$data['short_name']		= '';
		$data['contact_name']		= '';
		$data['contact_email']		= '';
		$data['society_type']		= '';
		$data['society_country']		= '';
		$data['territory_code']		= '';
		$data['affiliation_code']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['society_id']		= $this->input->post('society_id', TRUE);
		$data['full_name']		= $this->input->post('full_name', TRUE);
		$data['short_name']		= $this->input->post('short_name', TRUE);
		$data['contact_name']		= $this->input->post('contact_name', TRUE);
		$data['contact_email']		= $this->input->post('contact_email', TRUE);
		$data['society_type']		= $this->input->post('society_type', TRUE);
		$data['society_country']		= $this->input->post('society_country', TRUE);
		$data['territory_code']		= $this->input->post('territory_code', TRUE);
		$data['affiliation_code']		= $this->input->post('affiliation_code', TRUE);

      return $data;

   }

}
?>