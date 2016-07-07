<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MODULE NAME   : Song.php
 *
 * DESCRIPTION   : Song module controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:26 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             Song
 * @subpackage          song component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

class Song extends CI_Controller {

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
   // Description: Extracts a list of all song data records and displays it.
   //
   // //////////////////////////////////////////////////////////////////////////
   function browse() {

      // ///////////////////////////////////////////////////////////////////////
      // Request the list from database. This is done by creating an instance of
      // ...the song model and sending it a 'retrievelist' request.
      // ///////////////////////////////////////////////////////////////////////

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you are not using pagination, then set appropriate values for
      // NOTE: ...the $start and $limit_per_page values, or remove then from the
      // NOTE: ...function call.
      // ///////////////////////////////////////////////////////////////////////
      $start = $this->uri->segment(4,0);
      $limit_per_page = 10;

      $this->load->model('songsplits_live/songmodel');                  // Instantiate the model
      $the_results['song_list'] = $this->songmodel->findAll($start, $limit_per_page);  // Send the retrievelist msg
      // $the_results['rowcount'] = count($the_results['song_list']);

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set up the paging links. Just remove this if you don't need it,
      // NOTE: ...but you must remember to change the views too.
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('pagination');
      $this->load->helper('url');

      $config['base_url']     = site_url('song/showall/');   // or just /song/
      $config['total_rows']   = $this->songmodel->table_record_count;
      $config['per_page']     = $limit_per_page;

      $this->pagination->initialize($config);

      $the_results['page_links'] = $this->pagination->create_links();


      // ///////////////////////////////////////////////////////////////////////
      // Print the results on the web page tmeplate. This is done by creating an
      // ...instance of the layout library and sending it a 'render_page' request
      // ///////////////////////////////////////////////////////////////////////
      $this->load->library('songsplits_live/layout');

      $this->layout->render_page('/songsplits_live/song/songgrid', $the_results);
      // NOTE: If you don't want to use the layout library, use the line below.
      // $this->load->view('songsplits_live/song/songgrid', $the_results);

   }

   // //////////////////////////////////////////////////////////////////////////
   // Function: add()
   //
   // Description: Prompts user for input and adds a new song entry
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
         $this->load->model('songsplits_live/songmodel');

         /*
		// XXS Filtering enforced for user input
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['create_by_id']		= $this->input->post('create_by_id', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['song_title']		= $this->input->post('song_title', TRUE);
		$data['alt_title1']		= $this->input->post('alt_title1', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['modified']		= $this->input->post('modified', TRUE);
		$data['sampled']		= $this->input->post('sampled', TRUE);
		$data['is_cue']		= $this->input->post('is_cue', TRUE);
		$data['is_track']		= $this->input->post('is_track', TRUE);
		$data['is_lyrics']		= $this->input->post('is_lyrics', TRUE);
		$data['current_version']		= $this->input->post('current_version', TRUE);
		$data['lyrics']		= $this->input->post('lyrics', TRUE);
		$data['iswc']		= $this->input->post('iswc', TRUE);

         */
         $data = $this->_get_form_values();

         $this->songmodel->add($data);

         // $this->load->helper('url');
         redirect('/songsplits_live/song/', 'location');

      }
      else {
         // We have to show the user the input form
         /*
		$data['song_id']		= '';
		$data['create_by_id']		= '';
		$data['status_id']		= '';
		$data['song_title']		= '';
		$data['alt_title1']		= '';
		$data['created']		= '';
		$data['modified']		= '';
		$data['sampled']		= '';
		$data['is_cue']		= '';
		$data['is_track']		= '';
		$data['is_lyrics']		= '';
		$data['current_version']		= '';
		$data['lyrics']		= '';
		$data['iswc']		= '';

         */
         $data = $this->_clear_form();
         $data['action']       = 'add';



         // Call upon the layout library to draw the input screen
         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/song/songdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/song/songdetails', $data);


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
         $this->load->model('songsplits_live/songmodel');

         // $data['action']          = 'modify';
         /*
		// XXS Filtering enforced for user input
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['create_by_id']		= $this->input->post('create_by_id', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['song_title']		= $this->input->post('song_title', TRUE);
		$data['alt_title1']		= $this->input->post('alt_title1', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['modified']		= $this->input->post('modified', TRUE);
		$data['sampled']		= $this->input->post('sampled', TRUE);
		$data['is_cue']		= $this->input->post('is_cue', TRUE);
		$data['is_track']		= $this->input->post('is_track', TRUE);
		$data['is_lyrics']		= $this->input->post('is_lyrics', TRUE);
		$data['current_version']		= $this->input->post('current_version', TRUE);
		$data['lyrics']		= $this->input->post('lyrics', TRUE);
		$data['iswc']		= $this->input->post('iswc', TRUE);

         */
         $data = $this->_get_form_values();

         $this->songmodel->modify($data['song_id'], $data);

         redirect('/songsplits_live/song/', 'location');

      }
      else {
         // We have to show the user the input form

         $idField = $this->uri->segment(4);

         $this->load->model('songsplits_live/songmodel');
         $data = $this->songmodel->retrieve_by_pkey($idField);
         $data['action'] = 'modify';



         $this->load->library('songsplits_live/layout');
         $this->layout->render_page('/songsplits_live/song/songdetails', $data);
         // NOTE: If you don't want to use the layout library, use the line below.
         // $this->load->view('songsplits_live/song/songdetails', $data);


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

      $this->load->model('songsplits_live/songmodel');
      $the_results = $this->songmodel->delete_by_pkey($idField);

      $this->load->helper('url');
      redirect('/songsplits_live/song/', 'location');

   }

   function _clear_form() {

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Set default values for the form here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		$data['song_id']		= '';
		$data['create_by_id']		= '';
		$data['status_id']		= '';
		$data['song_title']		= '';
		$data['alt_title1']		= '';
		$data['created']		= '';
		$data['modified']		= '';
		$data['sampled']		= '';
		$data['is_cue']		= '';
		$data['is_track']		= '';
		$data['is_lyrics']		= '';
		$data['current_version']		= '';
		$data['lyrics']		= '';
		$data['iswc']		= '';

      return $data;

   }

   function _get_form_values() {
      // ///////////////////////////////////////////////////////////////////////
      // NOTE: Perform customisation on the retrieved form values here if you wish.
      // ///////////////////////////////////////////////////////////////////////
		// XXS Filtering enforced for user input
		$data['song_id']		= $this->input->post('song_id', TRUE);
		$data['create_by_id']		= $this->input->post('create_by_id', TRUE);
		$data['status_id']		= $this->input->post('status_id', TRUE);
		$data['song_title']		= $this->input->post('song_title', TRUE);
		$data['alt_title1']		= $this->input->post('alt_title1', TRUE);
		$data['created']		= $this->input->post('created', TRUE);
		$data['modified']		= $this->input->post('modified', TRUE);
		$data['sampled']		= $this->input->post('sampled', TRUE);
		$data['is_cue']		= $this->input->post('is_cue', TRUE);
		$data['is_track']		= $this->input->post('is_track', TRUE);
		$data['is_lyrics']		= $this->input->post('is_lyrics', TRUE);
		$data['current_version']		= $this->input->post('current_version', TRUE);
		$data['lyrics']		= $this->input->post('lyrics', TRUE);
		$data['iswc']		= $this->input->post('iswc', TRUE);

      return $data;

   }

}
?>