<?php
class ImgModel extends CI_Model {
/**
 * MODULE NAME   : imgmodel.php
 *
 * DESCRIPTION   : Img model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:24 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             img
 * @subpackage          Img model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $img_id;
var $img_name;


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
//      return $this->find(array('img_id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'img' );


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

      $query = $this->db_songsplits_live->get( 'img' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['img_id']		 = $row['img_id'];
			$query_results['img_name']		 = $row['img_name'];

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

      $this->db_songsplits_live->where( 'img_id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'img' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['img_id']		 = $row['img_id'];
		$query_results['img_name']		 = $row['img_name'];

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

      $this->db_songsplits_live->insert('img', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('img_id', $keyvalue);
      $this->db_songsplits_live->update('img', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('img_id', $idField);
      // $this->db_songsplits_live->delete('img');

      return true;

   }

	function get_Img_id() {
		return $this->img_id;	}

	function set_Img_id($img_id) {
		$this->img_id = $img_id;	}

	function get_Img_name() {
		return $this->img_name;	}

	function set_Img_name($img_name) {
		$this->img_name = $img_name;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Img()
      {
		$this->img_id = "";
		$this->img_name = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyImg()
      {
		$this->img_id = "";
		$this->img_name = "";

      }
      
      
      
      function live_img_to_api_image() {
          
          
          /*
           live.img		live.image	
	img_id		img_id
	img_name		img_link
           */

        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/imgmodel', 'imgmodel_live');                  // Instantiate the model
        $the_results['img_list'] = $this->imgmodel_live->findAll();  // Send the retrievelist msg

  
        
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        foreach ($the_results['img_list'] as $read_live) 
        {
            $insert_api['img_id'] = $read_live['img_id'];
            
          
            $insert_api['img_link'] = $read_live['img_name'];
            
           

            //$this->add($insert_api);
            $this->db_songsplits_api_new->insert('image', $insert_api);

            //return $this->db_songsplits_api_new->insert_id();
        }
        
        
    }
      
      
      
      
      
      
      
      
      
      
      

}

?>
