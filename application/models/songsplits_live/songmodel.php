<?php
class SongModel extends CI_Model {
/**
 * MODULE NAME   : songmodel.php
 *
 * DESCRIPTION   : Song model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:26 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             song
 * @subpackage          Song model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $song_id;
var $create_by_id;
var $status_id;
var $song_title;
var $alt_title1;
var $created;
var $modified;
var $sampled;
var $is_cue;
var $is_track;
var $is_lyrics;
var $current_version;
var $lyrics;
var $iswc;


   function __construct()
    {
       
        // ///////////////////////////////////////////////////////////////////////
        // NOTE: Load database libraries and other libraries and helpers. The
        // NOTE: ...generated code loads the database library as it requires it,
        // NOTE: ...but you may prefer to load here or autoload, In this case
        // NOTE: ...remember to delete all explicit load()s.
        // ///////////////////////////////////////////////////////////////////////

        // Initialise or clear class variables.
        // NOTE: Not particularly useful unless you are using model persistence
          $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
        parent::__construct();
    }

   // //////////////////////////////////////////////////////////////////////////
   // Function: findAll()
   //
   // Description: Retrieves and returns data listing from the database
   //
   // //////////////////////////////////////////////////////////////////////////
   function findAll($start = NULL, $count = NULL) {
      return $this->find(NULL, $start, $count);
   }

//   function findById($key_value) {
//      return $this->find(array('song_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

      $results = array();

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      //$this->table_record_count = $this->db_songsplits_live->count_all( 'song' );

 


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 100 );

      $query = $this->db_songsplits_live->get( 'song' );
      
        

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['song_id']		 = $row['song_id'];
			$query_results['create_by_id']		 = $row['create_by_id'];
			$query_results['status_id']		 = $row['status_id'];
			$query_results['song_title']		 = $row['song_title'];
			$query_results['alt_title1']		 = $row['alt_title1'];
			$query_results['created']		 = $row['created'];
			$query_results['modified']		 = $row['modified'];
			$query_results['sampled']		 = $row['sampled'];
			$query_results['is_cue']		 = $row['is_cue'];
			$query_results['is_track']		 = $row['is_track'];
			$query_results['is_lyrics']		 = $row['is_lyrics'];
			$query_results['current_version']		 = $row['current_version'];
			$query_results['lyrics']		 = $row['lyrics'];
			$query_results['iswc']		 = $row['iswc'];

			$results[]		 = $query_results;


         }

      }
      
      
                


      return $results;

   }

   function find_by_field_value($field, $value) {

      $results = array();

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( $field, $value);
      $query = $this->db_songsplits_live->get( 'song' );
      
        

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['song_id']		 = $row['song_id'];
			$query_results['create_by_id']		 = $row['create_by_id'];
			$query_results['status_id']		 = $row['status_id'];
			$query_results['song_title']		 = $row['song_title'];
			$query_results['alt_title1']		 = $row['alt_title1'];
			$query_results['created']		 = $row['created'];
			$query_results['modified']		 = $row['modified'];
			$query_results['sampled']		 = $row['sampled'];
			$query_results['is_cue']		 = $row['is_cue'];
			$query_results['is_track']		 = $row['is_track'];
			$query_results['is_lyrics']		 = $row['is_lyrics'];
			$query_results['current_version']		 = $row['current_version'];
			$query_results['lyrics']		 = $row['lyrics'];
			$query_results['iswc']		 = $row['iswc'];

			$results[]		 = $query_results;


         }

      }
      
      
                


      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( 'song_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'song' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['song_id']		 = $row['song_id'];
		$query_results['create_by_id']		 = $row['create_by_id'];
		$query_results['status_id']		 = $row['status_id'];
		$query_results['song_title']		 = $row['song_title'];
		$query_results['alt_title1']		 = $row['alt_title1'];
		$query_results['created']		 = $row['created'];
		$query_results['modified']		 = $row['modified'];
		$query_results['sampled']		 = $row['sampled'];
		$query_results['is_cue']		 = $row['is_cue'];
		$query_results['is_track']		 = $row['is_track'];
		$query_results['is_lyrics']		 = $row['is_lyrics'];
		$query_results['current_version']		 = $row['current_version'];
		$query_results['lyrics']		 = $row['lyrics'];
		$query_results['iswc']		 = $row['iswc'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }

    function retrieve_by_field_value($field, $value) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( $field, $value);
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'song' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['song_id']		 = $row['song_id'];
		$query_results['create_by_id']		 = $row['create_by_id'];
		$query_results['status_id']		 = $row['status_id'];
		$query_results['song_title']		 = $row['song_title'];
		$query_results['alt_title1']		 = $row['alt_title1'];
		$query_results['created']		 = $row['created'];
		$query_results['modified']		 = $row['modified'];
		$query_results['sampled']		 = $row['sampled'];
		$query_results['is_cue']		 = $row['is_cue'];
		$query_results['is_track']		 = $row['is_track'];
		$query_results['is_lyrics']		 = $row['is_lyrics'];
		$query_results['current_version']		 = $row['current_version'];
		$query_results['lyrics']		 = $row['lyrics'];
		$query_results['iswc']		 = $row['iswc'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->insert('song', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('song_id', $keyvalue);
      $this->db_songsplits_live->update('song', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('song_id', $idField);
      // $this->db_songsplits_live->delete('song');

      return true;

   }

	function get_Song_id() {
		return $this->song_id;	}

	function set_Song_id($song_id) {
		$this->song_id = $song_id;	}

	function get_Create_by_id() {
		return $this->create_by_id;	}

	function set_Create_by_id($create_by_id) {
		$this->create_by_id = $create_by_id;	}

	function get_Status_id() {
		return $this->status_id;	}

	function set_Status_id($status_id) {
		$this->status_id = $status_id;	}

	function get_Song_title() {
		return $this->song_title;	}

	function set_Song_title($song_title) {
		$this->song_title = $song_title;	}

	function get_Alt_title1() {
		return $this->alt_title1;	}

	function set_Alt_title1($alt_title1) {
		$this->alt_title1 = $alt_title1;	}

	function get_Created() {
		return $this->created;	}

	function set_Created($created) {
		$this->created = $created;	}

	function get_Modified() {
		return $this->modified;	}

	function set_Modified($modified) {
		$this->modified = $modified;	}

	function get_Sampled() {
		return $this->sampled;	}

	function set_Sampled($sampled) {
		$this->sampled = $sampled;	}

	function get_Is_cue() {
		return $this->is_cue;	}

	function set_Is_cue($is_cue) {
		$this->is_cue = $is_cue;	}

	function get_Is_track() {
		return $this->is_track;	}

	function set_Is_track($is_track) {
		$this->is_track = $is_track;	}

	function get_Is_lyrics() {
		return $this->is_lyrics;	}

	function set_Is_lyrics($is_lyrics) {
		$this->is_lyrics = $is_lyrics;	}

	function get_Current_version() {
		return $this->current_version;	}

	function set_Current_version($current_version) {
		$this->current_version = $current_version;	}

	function get_Lyrics() {
		return $this->lyrics;	}

	function set_Lyrics($lyrics) {
		$this->lyrics = $lyrics;	}

	function get_Iswc() {
		return $this->iswc;	}

	function set_Iswc($iswc) {
		$this->iswc = $iswc;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Song()
      {
		$this->song_id = "";
		$this->create_by_id = "";
		$this->status_id = "";
		$this->song_title = "";
		$this->alt_title1 = "";
		$this->created = "";
		$this->modified = "";
		$this->sampled = "";
		$this->is_cue = "";
		$this->is_track = "";
		$this->is_lyrics = "";
		$this->current_version = "";
		$this->lyrics = "";
		$this->iswc = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySong()
      {
		$this->song_id = "";
		$this->create_by_id = "";
		$this->status_id = "";
		$this->song_title = "";
		$this->alt_title1 = "";
		$this->created = "";
		$this->modified = "";
		$this->sampled = "";
		$this->is_cue = "";
		$this->is_track = "";
		$this->is_lyrics = "";
		$this->current_version = "";
		$this->lyrics = "";
		$this->iswc = "";

      }
      
      
      function migrate_song_to_work() {
          
          // Load  the db library
           $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

          $the_results['song_list'] = $this->songmodel->find();  // Send the retrievelist msg
          
          $this->load->model('songsplits_api_new/workmodel');
          $this->workmodel->migrate_song_to_work($the_results);
          

      }
      
      
      

}

?>
