<?php
class VersionsModel extends CI_Model {
/**
 * MODULE NAME   : versionsmodel.php
 *
 * DESCRIPTION   : Versions model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:29 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             versions
 * @subpackage          Versions model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $version_id;
var $song_id;
var $writer_id;
var $version;
var $additional_info;
var $old_song_title;
var $date_added;


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
//      return $this->find(array('version_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }
   
   function count_all() {
       
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      //$this->db_songsplits_live->limit( 10 );
      $this->table_record_count = $this->db_songsplits_live->count_all( 'versions' );
      
      return $this->table_record_count;

       
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {
       
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $results = array();

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      //$this->table_record_count = $this->db_songsplits_live->count_all( 'versions' );
      $this->db_songsplits_live->limit($count, $start);

      

      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 100 );

      $query = $this->db_songsplits_live->get( 'versions' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['version_id']		 = $row['version_id'];
			$query_results['song_id']		 = $row['song_id'];
			$query_results['writer_id']		 = $row['writer_id'];
			$query_results['version']		 = $row['version'];
			$query_results['additional_info']		 = $row['additional_info'];
			$query_results['old_song_title']		 = $row['old_song_title'];
			$query_results['date_added']		 = $row['date_added'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {
       
       $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $results = array();

      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where( 'version_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'versions' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['version_id']		 = $row['version_id'];
		$query_results['song_id']		 = $row['song_id'];
		$query_results['writer_id']		 = $row['writer_id'];
		$query_results['version']		 = $row['version'];
		$query_results['additional_info']		 = $row['additional_info'];
		$query_results['old_song_title']		 = $row['old_song_title'];
		$query_results['date_added']		 = $row['date_added'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {
       
       $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->insert('versions', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {
       
       $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('version_id', $keyvalue);
      $this->db_songsplits_live->update('versions', $data);

   }

   function delete_by_pkey($idField) {
       
       $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);
       
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('version_id', $idField);
      // $this->db_songsplits_live->delete('versions');

      return true;

   }

	function get_Version_id() {
		return $this->version_id;	}

	function set_Version_id($version_id) {
		$this->version_id = $version_id;	}

	function get_Song_id() {
		return $this->song_id;	}

	function set_Song_id($song_id) {
		$this->song_id = $song_id;	}

	function get_Writer_id() {
		return $this->writer_id;	}

	function set_Writer_id($writer_id) {
		$this->writer_id = $writer_id;	}

	function get_Version() {
		return $this->version;	}

	function set_Version($version) {
		$this->version = $version;	}

	function get_Additional_info() {
		return $this->additional_info;	}

	function set_Additional_info($additional_info) {
		$this->additional_info = $additional_info;	}

	function get_Old_song_title() {
		return $this->old_song_title;	}

	function set_Old_song_title($old_song_title) {
		$this->old_song_title = $old_song_title;	}

	function get_Date_added() {
		return $this->date_added;	}

	function set_Date_added($date_added) {
		$this->date_added = $date_added;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Versions()
      {
		$this->version_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->version = "";
		$this->additional_info = "";
		$this->old_song_title = "";
		$this->date_added = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyVersions()
      {
		$this->version_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->version = "";
		$this->additional_info = "";
		$this->old_song_title = "";
		$this->date_added = "";

      }
      
      
        
      function migrate_versions_to_work_history() {
          
          $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

          $count_all = $this->count_all();//1928
          //$count_all = 10; //test
          
          
          $count = 300;//take on one bite
          
//          echo '<pre>';
//          print_r($count_all);
//          die(__FILE__.__LINE__);

          for ($start = 0; $start < $count_all; $start = $start + $count) {

              
               $this->load->model('songsplits_live/versionsmodel', 'versionsmodel_live');
               
               
               $the_results['versions_list'] = $this->versionsmodel_live->find(NULL, $start, $count);  // Send the retrievelist msg

               
               
               if( ! empty($the_results['versions_list']) )
               {
                   $this->load->model('songsplits_api_new/work_historymodel', 'work_historymodel_api');
                   $this->work_historymodel_api->migrate_versions_to_work_history($the_results);
               }
               
          }
          
          echo '<pre>';
          print_r($start);
            echo '<pre>';
            print_r($count_all);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
          die(__FILE__.__LINE__);

          

      }
      
      

}

?>
