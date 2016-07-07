<?php
class SplitModel extends CI_Model {
/**
 * MODULE NAME   : splitmodel.php
 *
 * DESCRIPTION   : Split model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:26 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             split
 * @subpackage          Split model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $split_id;
var $song_id;
var $writer_id;
var $status_id;
var $split_type;
var $percent;
var $created;
var $modified;
var $version;
var $role_id;


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
//      return $this->find(array('split_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }
   
   function count_all() {
       //$this->db_songsplits_live->limit( 10 );
      $this->table_record_count = $this->db_songsplits_live->count_all( 'split' );
      
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
      //$this->table_record_count = $this->db_songsplits_live->count_all( 'split' );


     


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 100 );
      
      $this->db_songsplits_live->limit($count, $start);
      
//      echo '<pre>';
//          print_r($start);
//            echo '<pre>';
//            print_r($count);
//            echo '<------------>';
//                      die(__FILE__.__LINE__);


      $query = $this->db_songsplits_live->get( 'split' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['split_id']		 = $row['split_id'];
			$query_results['song_id']		 = $row['song_id'];
			$query_results['writer_id']		 = $row['writer_id'];
			$query_results['status_id']		 = $row['status_id'];
			$query_results['split_type']		 = $row['split_type'];
			$query_results['percent']		 = $row['percent'];
			$query_results['created']		 = $row['created'];
			$query_results['modified']		 = $row['modified'];
			$query_results['version']		 = $row['version'];
			$query_results['role_id']		 = $row['role_id'];

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

      $this->db_songsplits_live->where( 'split_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'split' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['split_id']		 = $row['split_id'];
		$query_results['song_id']		 = $row['song_id'];
		$query_results['writer_id']		 = $row['writer_id'];
		$query_results['status_id']		 = $row['status_id'];
		$query_results['split_type']		 = $row['split_type'];
		$query_results['percent']		 = $row['percent'];
		$query_results['created']		 = $row['created'];
		$query_results['modified']		 = $row['modified'];
		$query_results['version']		 = $row['version'];
		$query_results['role_id']		 = $row['role_id'];

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

      $this->db_songsplits_live->insert('split', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('split_id', $keyvalue);
      $this->db_songsplits_live->update('split', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('split_id', $idField);
      // $this->db_songsplits_live->delete('split');

      return true;

   }

	function get_Split_id() {
		return $this->split_id;	}

	function set_Split_id($split_id) {
		$this->split_id = $split_id;	}

	function get_Song_id() {
		return $this->song_id;	}

	function set_Song_id($song_id) {
		$this->song_id = $song_id;	}

	function get_Writer_id() {
		return $this->writer_id;	}

	function set_Writer_id($writer_id) {
		$this->writer_id = $writer_id;	}

	function get_Status_id() {
		return $this->status_id;	}

	function set_Status_id($status_id) {
		$this->status_id = $status_id;	}

	function get_Split_type() {
		return $this->split_type;	}

	function set_Split_type($split_type) {
		$this->split_type = $split_type;	}

	function get_Percent() {
		return $this->percent;	}

	function set_Percent($percent) {
		$this->percent = $percent;	}

	function get_Created() {
		return $this->created;	}

	function set_Created($created) {
		$this->created = $created;	}

	function get_Modified() {
		return $this->modified;	}

	function set_Modified($modified) {
		$this->modified = $modified;	}

	function get_Version() {
		return $this->version;	}

	function set_Version($version) {
		$this->version = $version;	}

	function get_Role_id() {
		return $this->role_id;	}

	function set_Role_id($role_id) {
		$this->role_id = $role_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Split()
      {
		$this->split_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->status_id = "";
		$this->split_type = "";
		$this->percent = "";
		$this->created = "";
		$this->modified = "";
		$this->version = "";
		$this->role_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptySplit()
      {
		$this->split_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->status_id = "";
		$this->split_type = "";
		$this->percent = "";
		$this->created = "";
		$this->modified = "";
		$this->version = "";
		$this->role_id = "";

      }
      
      
      
      function migrate_split_to_writer_split() {

          $count_all = $this->count_all();// 73738
          //$count_all = 10; //test
          
          
          $count = 300;//take on one bite
          
          echo '<pre>';
          print_r($count_all);
          die(__FILE__.__LINE__);

          for ($start = 0; $start < $count_all; $start = $start + $count) {

              
               $this->load->model('songsplits_live/splitmodel', 'splitmodel_live');
               //$this->db_songsplits_live->limit(4, $offset);
               //$start = $offset; 
               
               $the_results['split_list'] = $this->splitmodel_live->find(NULL, $start, $count);  // Send the retrievelist msg

               
               
               if( ! empty($the_results['split_list']) )
               {
                   $this->load->model('songsplits_api_new/writer_splitmodel', 'writer_splitmodel_api');
                   $this->writer_splitmodel_api->migrate_split_to_writer_split($the_results);
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
