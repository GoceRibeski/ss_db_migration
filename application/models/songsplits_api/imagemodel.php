<?php
class ImageModel extends CI_Model {
/**
 * MODULE NAME   : imagemodel.php
 *
 * DESCRIPTION   : Image model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:09 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             image
 * @subpackage          Image model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $img_id;
var $img_link;


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
          $this->db_songsplits_api = $this->load->database('songsplits_api', TRUE);
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
//      return $this->find(array('img_id' => '$key_value'));
//   }

   function findByFilter($filter_rules, $start = NULL, $count = NULL) {
      return $this->find($filter_rules, $start, $count);
   }

   function find($filters = NULL, $start = NULL, $count = NULL) {

      $results = array();

      // Load the database library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // Make a note of the current table record count
      // ///////////////////////////////////////////////////////////////////////
      $this->table_record_count = $this->db_songsplits_api->count_all( 'image' );


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
            // NOTE: ...   $this->db_songsplits_api->where($filters);
            // NOTE: ...instead of the foreach loop below. However, it's added to
            // NOTE: ...allow further customisation.
            // ///////////////////////////////////////////////////////////////////////
            if ( count($filters) > 0 ) {
               foreach ($filters as $field => $value) {
                  $this->db_songsplits_api->where($field, $value);
               }
            }
         }

      }

      if ($start) {
         if ($count) {
            $this->db_songsplits_api->limit($start, $count);
         }
         else {
            $this->db_songsplits_api->limit($start);
         }
      }


      // ///////////////////////////////////////////////////////////////////////
      // NOTE: If you want the results ordered by a specific field, do it here.
      // ///////////////////////////////////////////////////////////////////////
      //$this->db_songsplits_api->limit( 100 );

      $query = $this->db_songsplits_api->get( 'image' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['img_id']		 = $row['img_id'];
			$query_results['img_link']		 = $row['img_link'];

			$results[]		 = $query_results;


         }

      }

      return $results;

   }


   // TODO: this won't be possible if there is no primary key for the table.
   function retrieve_by_pkey($idField) {

      $results = array();

      // Load  the db library
      $this->load->database();

      $this->db_songsplits_api->where( 'img_id', "$idField");
      $this->db_songsplits_api->limit( 1 );
      $query = $this->db_songsplits_api->get( 'image' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['img_id']		 = $row['img_id'];
		$query_results['img_link']		 = $row['img_link'];

		$results		 = $query_results;


      }
      else {
         $results = false;
      }

      return $results;
   }


   function add( $data ) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->insert('image', $data);

      return $this->db_songsplits_api->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->load->database();

      $this->db_songsplits_api->where('img_id', $keyvalue);
      $this->db_songsplits_api->update('image', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->load->database();

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_api->where('img_id', $idField);
      // $this->db_songsplits_api->delete('image');

      return true;

   }

	function get_Img_id() {
		return $this->img_id;	}

	function set_Img_id($img_id) {
		$this->img_id = $img_id;	}

	function get_Img_link() {
		return $this->img_link;	}

	function set_Img_link($img_link) {
		$this->img_link = $img_link;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Image()
      {
		$this->img_id = "";
		$this->img_link = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyImage()
      {
		$this->img_id = "";
		$this->img_link = "";

      }

}

?>
