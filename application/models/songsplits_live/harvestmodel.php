<?php
class HarvestModel extends CI_Model {
/**
 * MODULE NAME   : harvestmodel.php
 *
 * DESCRIPTION   : Harvest model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:23 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             harvest
 * @subpackage          Harvest model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $id;
var $first_name;
var $last_name;
var $email;
var $society;
var $code;
var $status;
var $created_datatime;


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
//      return $this->find(array('id' => '$key_value'));
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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'harvest' );


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

      $query = $this->db_songsplits_live->get( 'harvest' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['id']		 = $row['id'];
			$query_results['first_name']		 = $row['first_name'];
			$query_results['last_name']		 = $row['last_name'];
			$query_results['email']		 = $row['email'];
			$query_results['society']		 = $row['society'];
			$query_results['code']		 = $row['code'];
			$query_results['status']		 = $row['status'];
			$query_results['created_datatime']		 = $row['created_datatime'];

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

      $this->db_songsplits_live->where( 'id', "$idField");
      $this->db_songsplits_live->limit( 1 );
      $query = $this->db_songsplits_live->get( 'harvest' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['id']		 = $row['id'];
		$query_results['first_name']		 = $row['first_name'];
		$query_results['last_name']		 = $row['last_name'];
		$query_results['email']		 = $row['email'];
		$query_results['society']		 = $row['society'];
		$query_results['code']		 = $row['code'];
		$query_results['status']		 = $row['status'];
		$query_results['created_datatime']		 = $row['created_datatime'];

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

      $this->db_songsplits_live->insert('harvest', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('id', $keyvalue);
      $this->db_songsplits_live->update('harvest', $data);

   }

   function delete_by_pkey($idField) {
      // Load  the db library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      // ///////////////////////////////////////////////////////////////////////
      // TODO: Just to eliminate nasty mishaps, the delete query has been
      // TODO: ...deliberately disabled. Enable it if you mean to by uncommenting
      // TODO: ...the database calls below
      // ///////////////////////////////////////////////////////////////////////
      // $this->db_songsplits_live->where('id', $idField);
      // $this->db_songsplits_live->delete('harvest');

      return true;

   }

	function get_Id() {
		return $this->id;	}

	function set_Id($id) {
		$this->id = $id;	}

	function get_First_name() {
		return $this->first_name;	}

	function set_First_name($first_name) {
		$this->first_name = $first_name;	}

	function get_Last_name() {
		return $this->last_name;	}

	function set_Last_name($last_name) {
		$this->last_name = $last_name;	}

	function get_Email() {
		return $this->email;	}

	function set_Email($email) {
		$this->email = $email;	}

	function get_Society() {
		return $this->society;	}

	function set_Society($society) {
		$this->society = $society;	}

	function get_Code() {
		return $this->code;	}

	function set_Code($code) {
		$this->code = $code;	}

	function get_Status() {
		return $this->status;	}

	function set_Status($status) {
		$this->status = $status;	}

	function get_Created_datatime() {
		return $this->created_datatime;	}

	function set_Created_datatime($created_datatime) {
		$this->created_datatime = $created_datatime;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Harvest()
      {
		$this->id = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->email = "";
		$this->society = "";
		$this->code = "";
		$this->status = "";
		$this->created_datatime = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyHarvest()
      {
		$this->id = "";
		$this->first_name = "";
		$this->last_name = "";
		$this->email = "";
		$this->society = "";
		$this->code = "";
		$this->status = "";
		$this->created_datatime = "";

      }
      
      
      function live_harvest_to_api_signup() {
          
          
          /*
           live.harvest		api.signup	
            id                  signup_id
            first_name          full_name
            last_name		
            email               email
            society             society
            code                salt
            status              status_id
            created_datatime    date_created
           */

        $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

        $this->load->model('songsplits_live/harvestmodel', 'harvestmodel_live');                  // Instantiate the model
        $the_results['harvest_list'] = $this->harvestmodel_live->findAll();  // Send the retrievelist msg

  
        
        $this->db_songsplits_api_new = $this->load->database('songsplits_api_new', TRUE);
        foreach ($the_results['harvest_list'] as $read_live) 
        {
            $insert_api['signup_id'] = $read_live['id'];
            
            $insert_api['full_name'] = $read_live['first_name'].' '.$read_live['last_name'];
            
            $insert_api['email'] = $read_live['email'];
            
            $insert_api['society'] = $read_live['society'];
            
            $insert_api['salt'] = $read_live['code'];
            
            $insert_api['status_id'] = $read_live['status'];
            
            $insert_api['date_created'] = $read_live['created_datatime'];
            
           

            //$this->add($insert_api);
            $this->db_songsplits_api_new->insert('signup', $insert_api);

            //return $this->db_songsplits_api_new->insert_id();
        }
        
        
    }

}

?>
