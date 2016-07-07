<?php
class WorkModel extends CI_Model {
/**
 * MODULE NAME   : workmodel.php
 *
 * DESCRIPTION   : Work model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-20 10:59 AM   - Pradesh Chanderpaul     - Created
 *
 * @package             work
 * @subpackage          Work model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $work_id;
var $create_user_id;
var $title;
var $alt_title;
var $work_type;
var $status_id;
var $current_version;
var $date_created;
var $date_confirmed;
var $iswc;
var $lyrics;
var $sample_id;


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
          $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
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
//      return $this->find(array('work_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

      $results = array();

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      $this->table_record_count = $this->db_songsplits_api_new->count_all( 'work' );


      // Filter could be an array or filter values or an SQL string.
      $where_clause = '';
      if ($filters) {
         if ( is_string($filters) ) {
            $where_clause = $filters;
         }
         elseif ( is_array($filters) ) {
            // Build your filter rules
            // ///////////////////////////////////////////////////////////////////////
            // NOTE: There are many ways to build the select code. (For example, you
            // NOTE: ...just pass the $filters array to where() like:
            // NOTE: ...   $this->db_songsplits_api_new->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_api_new->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_api_new->limit($start, $count);
         }
         else {
            $this->db_songsplits_api_new->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->orderby();

      $query = $this->db_songsplits_api_new->get( 'work' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['work_id']		 = $row['work_id'];
			$query_results['create_user_id']		 = $row['create_user_id'];
			$query_results['title']		 = $row['title'];
			$query_results['alt_title']		 = $row['alt_title'];
			$query_results['work_type']		 = $row['work_type'];
			$query_results['status_id']		 = $row['status_id'];
			$query_results['current_version']		 = $row['current_version'];
			$query_results['date_created']		 = $row['date_created'];
			$query_results['date_confirmed']		 = $row['date_confirmed'];
			$query_results['iswc']		 = $row['iswc'];
			$query_results['lyrics']		 = $row['lyrics'];
			$query_results['sample_id']		 = $row['sample_id'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where( 'work_id', "$idField");
      $this->db_songsplits_api_new->limit( 1 );
      $query = $this->db_songsplits_api_new->get( 'work' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['work_id']		 = $row['work_id'];
		$query_results['create_user_id']		 = $row['create_user_id'];
		$query_results['title']		 = $row['title'];
		$query_results['alt_title']		 = $row['alt_title'];
		$query_results['work_type']		 = $row['work_type'];
		$query_results['status_id']		 = $row['status_id'];
		$query_results['current_version']		 = $row['current_version'];
		$query_results['date_created']		 = $row['date_created'];
		$query_results['date_confirmed']		 = $row['date_confirmed'];
		$query_results['iswc']		 = $row['iswc'];
		$query_results['lyrics']		 = $row['lyrics'];
		$query_results['sample_id']		 = $row['sample_id'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->insert('work', $data);

      return $this->db_songsplits_api_new->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      $this->db_songsplits_api_new->where('work_id', $keyvalue);
      $this->db_songsplits_api_new->update('work', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api_new->where('work_id', $idField);
      // $this->db_songsplits_api_new->delete('work');

      return true;

   }

	function get_Work_id() {
		return $this->work_id;	}

	function set_Work_id($work_id) {
		$this->work_id = $work_id;	}

	function get_Create_user_id() {
		return $this->create_user_id;	}

	function set_Create_user_id($create_user_id) {
		$this->create_user_id = $create_user_id;	}

	function get_Title() {
		return $this->title;	}

	function set_Title($title) {
		$this->title = $title;	}

	function get_Alt_title() {
		return $this->alt_title;	}

	function set_Alt_title($alt_title) {
		$this->alt_title = $alt_title;	}

	function get_Work_type() {
		return $this->work_type;	}

	function set_Work_type($work_type) {
		$this->work_type = $work_type;	}

	function get_Status_id() {
		return $this->status_id;	}

	function set_Status_id($status_id) {
		$this->status_id = $status_id;	}

	function get_Current_version() {
		return $this->current_version;	}

	function set_Current_version($current_version) {
		$this->current_version = $current_version;	}

	function get_Date_created() {
		return $this->date_created;	}

	function set_Date_created($date_created) {
		$this->date_created = $date_created;	}

	function get_Date_confirmed() {
		return $this->date_confirmed;	}

	function set_Date_confirmed($date_confirmed) {
		$this->date_confirmed = $date_confirmed;	}

	function get_Iswc() {
		return $this->iswc;	}

	function set_Iswc($iswc) {
		$this->iswc = $iswc;	}

	function get_Lyrics() {
		return $this->lyrics;	}

	function set_Lyrics($lyrics) {
		$this->lyrics = $lyrics;	}

	function get_Sample_id() {
		return $this->sample_id;	}

	function set_Sample_id($sample_id) {
		$this->sample_id = $sample_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Work()
      {
		$this->work_id = "";
		$this->create_user_id = "";
		$this->title = "";
		$this->alt_title = "";
		$this->work_type = "";
		$this->status_id = "";
		$this->current_version = "";
		$this->date_created = "";
		$this->date_confirmed = "";
		$this->iswc = "";
		$this->lyrics = "";
		$this->sample_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyWork()
      {
		$this->work_id = "";
		$this->create_user_id = "";
		$this->title = "";
		$this->alt_title = "";
		$this->work_type = "";
		$this->status_id = "";
		$this->current_version = "";
		$this->date_created = "";
		$this->date_confirmed = "";
		$this->iswc = "";
		$this->lyrics = "";
		$this->sample_id = "";

      }
      
       function migrate_song_to_work($the_results) {
          
          foreach ( $the_results['song_list'] as $song)
          {
              //
            
            
            $work['work_id']            = $song['song_id'];
            $work['create_user_id']     = $song['create_by_id'];
            $work['status_id']          = $song['status_id'];
            $work['title']              = $song['song_title'];
            $work['alt_title']          = $song['alt_title1'];
            $work['date_created']       = $song['created'];
            $work['date_confirmed']     = $song['modified'];
            $work['sample_id']          = $song['sampled'];
            
            if($song['is_cue'])
            {
                $work['work_type'] = 'cue';
            }
            elseif ($song['is_track']) 
            {
                $work['work_type'] = 'cue';
            }
            elseif ($song['is_lyrics']) 
            {
                $work['work_type'] = 'lyrics';
            }
            else
            {
                $work['work_type'] = '';
            }
            //$work['work_type'] = $song['is_cue'];$song['is_track'];$song['is_lyrics'];
            
            $work['current_version'] = $song['current_version'];
            $work['lyrics'] = $song['lyrics'];
            $work['iswc'] = $song['iswc'];
            
            
            $this->add($work);
            
//            echo '<pre>';
//            print_r($song);
//            echo '<pre>';
//            print_r($work);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
//            
//Array
//(
//    [song_id] => 1
//    [create_by_id] => 1
//    [status_id] => 2
//    [song_title] => No More Testing
//    [alt_title1] => 
//    [created] => 2012-06-02 16:24:40
//    [modified] => 
//    [sampled] => 0
//    [is_cue] => 0
//    [is_track] => 0
//    [is_lyrics] => 0
//    [current_version] => 1
//    [lyrics] => 
//    [iswc] => 
//)
            
                    
//      song_id         work_id	
//	create_by_id	create_user_id	
//	status_id	status_id	
//	song_title	title	
//	alt_title1	alt_title	
//	created		date_created	
//	modified	date_confirmed	
//	sampled		sample_id	
//	is_cue, is_track, is_lyrics		work_type	
//	current_version	current_version	
//	lyrics		lyrics	
//	iswc		iswc	
            
            
              
              
          }
           

            echo '<pre>';
            //print_r($the_results);
            echo '<pre>';
            die(__FILE__.__LINE__);
          
          
          
      }


}

?>
