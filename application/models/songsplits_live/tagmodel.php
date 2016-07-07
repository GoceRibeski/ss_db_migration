<?php
class TagModel extends CI_Model {
/**
 * MODULE NAME   : tagmodel.php
 *
 * DESCRIPTION   : Tag model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:27 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             tag
 * @subpackage          Tag model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $tag_id;
var $song_id;
var $writer_id;
var $tag_type_id;
var $tag_name;
var $created;
var $other_id;


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
//      return $this->find(array('tag_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'tag' );


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
            // NOTE: ...   $this->db_songsplits_live->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_live->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_live->limit($start, $count);
         }
         else {
            $this->db_songsplits_live->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_live->limit( 100 );

      $query = $this->db_songsplits_live->get( 'tag' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['tag_id']		 = $row['tag_id'];
			$query_results['song_id']		 = $row['song_id'];
			$query_results['writer_id']		 = $row['writer_id'];
			$query_results['tag_type_id']		 = $row['tag_type_id'];
			$query_results['tag_name']		 = $row['tag_name'];
			$query_results['created']		 = $row['created'];
			$query_results['other_id']		 = $row['other_id'];

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

      $this->db_songsplits_live->where( 'tag_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'tag' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['tag_id']		 = $row['tag_id'];
		$query_results['song_id']		 = $row['song_id'];
		$query_results['writer_id']		 = $row['writer_id'];
		$query_results['tag_type_id']		 = $row['tag_type_id'];
		$query_results['tag_name']		 = $row['tag_name'];
		$query_results['created']		 = $row['created'];
		$query_results['other_id']		 = $row['other_id'];

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

      $this->db_songsplits_live->insert('tag', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('tag_id', $keyvalue);
      $this->db_songsplits_live->update('tag', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('tag_id', $idField);
      // $this->db_songsplits_live->delete('tag');

      return true;

   }

	function get_Tag_id() {
		return $this->tag_id;	}

	function set_Tag_id($tag_id) {
		$this->tag_id = $tag_id;	}

	function get_Song_id() {
		return $this->song_id;	}

	function set_Song_id($song_id) {
		$this->song_id = $song_id;	}

	function get_Writer_id() {
		return $this->writer_id;	}

	function set_Writer_id($writer_id) {
		$this->writer_id = $writer_id;	}

	function get_Tag_type_id() {
		return $this->tag_type_id;	}

	function set_Tag_type_id($tag_type_id) {
		$this->tag_type_id = $tag_type_id;	}

	function get_Tag_name() {
		return $this->tag_name;	}

	function set_Tag_name($tag_name) {
		$this->tag_name = $tag_name;	}

	function get_Created() {
		return $this->created;	}

	function set_Created($created) {
		$this->created = $created;	}

	function get_Other_id() {
		return $this->other_id;	}

	function set_Other_id($other_id) {
		$this->other_id = $other_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Tag()
      {
		$this->tag_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->tag_type_id = "";
		$this->tag_name = "";
		$this->created = "";
		$this->other_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyTag()
      {
		$this->tag_id = "";
		$this->song_id = "";
		$this->writer_id = "";
		$this->tag_type_id = "";
		$this->tag_name = "";
		$this->created = "";
		$this->other_id = "";

      }

}

?>
