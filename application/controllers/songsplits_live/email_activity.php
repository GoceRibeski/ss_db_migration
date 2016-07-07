<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Email_activity.php
 *
 * DESCRIPTION   : Email_activity module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:23 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Email_activity
 * @subpackage          email_activity component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Email_activity extends CI_Controller {

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
   // Description: Extracts a list of all email_activity data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the email_activity model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/email_activitymodel');                  // Instantiate the model
      $the_results['email_activity_list'] = $this->email_activitymodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['email_activity_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('email_activity/showall/');   // or just /email_activity/
      $config['total_rows']   = $this->email_activitymodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/email_activity/email_activitygrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/email_activity/email_activitygrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new email_activity entry
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
         $this->load->model('songsplits_live/email_activitymodel');

         /*
		// XXS Filtering enforced for user input
		$data['id']		= $this->input->post('id', TRUE);
		$data['sender_id']		= $this->input->post('sender_id', TRUE);
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['songtitle']		= $this->input->post('songtitle', TRUE);
		$data['event']		= $this->input->post('event', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_created']		= $this->input->post('date_created', TRUE);
		$data['ip']		= $this->input->post('ip', TRUE);
		$data['sg_message_id']		= $this->input->post('sg_message_id', TRUE);
		$data['timestamp']		= $this->input->post('timestamp', TRUE);
		$data['smtp-id']		= $this->input->post('smtp-id', TRUE);
		$data['category']		= $this->input->post('category', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['asm_group_id']		= $this->input->post('asm_group_id', TRUE);
		$data['useragent']		= $this->input->post('useragent', TRUE);
		$data['sg_event_id']		= $this->input->post('sg_event_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->email_activitymodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/email_activity/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['id']		= '';
		$data['sender_id']		= '';
		$data['song_id']		= '';
		$data['songtitle']		= '';
		$data['event']		= '';
		$data['email']		= '';
		$data['date_created']		= '';
		$data['ip']		= '';
		$data['sg_message_id']		= '';
		$data['timestamp']		= '';
		$data['smtp-id']		= '';
		$data['category']		= '';
		$data['url']		= '';
		$data['asm_group_id']		= '';
		$data['useragent']		= '';
		$data['sg_event_id']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/email_activity/email_activitydetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/email_activity/email_activitydetails', $data);


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
         $this->load->model('songsplits_live/email_activitymodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['id']		= $this->input->post('id', TRUE);
		$data['sender_id']		= $this->input->post('sender_id', TRUE);
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['songtitle']		= $this->input->post('songtitle', TRUE);
		$data['event']		= $this->input->post('event', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_created']		= $this->input->post('date_created', TRUE);
		$data['ip']		= $this->input->post('ip', TRUE);
		$data['sg_message_id']		= $this->input->post('sg_message_id', TRUE);
		$data['timestamp']		= $this->input->post('timestamp', TRUE);
		$data['smtp-id']		= $this->input->post('smtp-id', TRUE);
		$data['category']		= $this->input->post('category', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['asm_group_id']		= $this->input->post('asm_group_id', TRUE);
		$data['useragent']		= $this->input->post('useragent', TRUE);
		$data['sg_event_id']		= $this->input->post('sg_event_id', TRUE);

         */
         $data = $this->_get_form_values();

         $this->email_activitymodel->modify($data['id'], $data);

         redirect('/songsplits_live/email_activity/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/email_activitymodel');
         $data = $this->email_activitymodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/email_activity/email_activitydetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/email_activity/email_activitydetails', $data);


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

      $this->load->model('songsplits_live/email_activitymodel');
      $the_results = $this->email_activitymodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/email_activity/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['id']		= '';
		$data['sender_id']		= '';
		$data['song_id']		= '';
		$data['songtitle']		= '';
		$data['event']		= '';
		$data['email']		= '';
		$data['date_created']		= '';
		$data['ip']		= '';
		$data['sg_message_id']		= '';
		$data['timestamp']		= '';
		$data['smtp-id']		= '';
		$data['category']		= '';
		$data['url']		= '';
		$data['asm_group_id']		= '';
		$data['useragent']		= '';
		$data['sg_event_id']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['id']		= $this->input->post('id', TRUE);
		$data['sender_id']		= $this->input->post('sender_id', TRUE);
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['songtitle']		= $this->input->post('songtitle', TRUE);
		$data['event']		= $this->input->post('event', TRUE);
		$data['email']		= $this->input->post('email', TRUE);
		$data['date_created']		= $this->input->post('date_created', TRUE);
		$data['ip']		= $this->input->post('ip', TRUE);
		$data['sg_message_id']		= $this->input->post('sg_message_id', TRUE);
		$data['timestamp']		= $this->input->post('timestamp', TRUE);
		$data['smtp-id']		= $this->input->post('smtp-id', TRUE);
		$data['category']		= $this->input->post('category', TRUE);
		$data['url']		= $this->input->post('url', TRUE);
		$data['asm_group_id']		= $this->input->post('asm_group_id', TRUE);
		$data['useragent']		= $this->input->post('useragent', TRUE);
		$data['sg_event_id']		= $this->input->post('sg_event_id', TRUE);

      return $data;

   }

}
?>