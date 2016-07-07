<?php
class Email_activityModel extends CI_Model {
/**
 * MODULE NAME   : email_activitymodel.php
 *
 * DESCRIPTION   : Email_activity model controller
 *
 * MODIFICATION HISTORY
 *   V1.0   2016-06-16 05:23 PM   - Pradesh Chanderpaul     - Created
 *
 * @package             email_activity
 * @subpackage          Email_activity model component Class
 * @author              Pradesh Chanderpaul
 * @copyright           Copyright (c) 2006-2007 DataCraft Software
 * @license             http://www.datacraft.co.za/codecrafter/license.html
 * @link                http://www.datacraft.co.za/codecrafter/
 * @since               Version 1.0
 * @filesource
 */

var $table_record_count;

var $id;
var $sender_id;
var $song_id;
var $songtitle;
var $event;
var $email;
var $date_created;
var $ip;
var $sg_message_id;
var $timestamp;
var $smtp-id;
var $category;
var $url;
var $asm_group_id;
var $useragent;
var $sg_event_id;


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
      $this->table_record_count = $this->db_songsplits_live->count_all( 'email_activity' );


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

      $query = $this->db_songsplits_live->get( 'email_activity' );

      if ($query->num_rows() > 0) {
         // return $query->result_array();
         foreach ($query->result_array() as $row)      // Go through the result set
         {
            // Build up a list for each column from the database and place it in
            // ...the result set

			$query_results['id']		 = $row['id'];
			$query_results['sender_id']		 = $row['sender_id'];
			$query_results['song_id']		 = $row['song_id'];
			$query_results['songtitle']		 = $row['songtitle'];
			$query_results['event']		 = $row['event'];
			$query_results['email']		 = $row['email'];
			$query_results['date_created']		 = $row['date_created'];
			$query_results['ip']		 = $row['ip'];
			$query_results['sg_message_id']		 = $row['sg_message_id'];
			$query_results['timestamp']		 = $row['timestamp'];
			$query_results['smtp-id']		 = $row['smtp-id'];
			$query_results['category']		 = $row['category'];
			$query_results['url']		 = $row['url'];
			$query_results['asm_group_id']		 = $row['asm_group_id'];
			$query_results['useragent']		 = $row['useragent'];
			$query_results['sg_event_id']		 = $row['sg_event_id'];

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
      $query = $this->db_songsplits_live->get( 'email_activity' );


      if ($query->num_rows() > 0) {
         $row = $query->row_array();

		$query_results['id']		 = $row['id'];
		$query_results['sender_id']		 = $row['sender_id'];
		$query_results['song_id']		 = $row['song_id'];
		$query_results['songtitle']		 = $row['songtitle'];
		$query_results['event']		 = $row['event'];
		$query_results['email']		 = $row['email'];
		$query_results['date_created']		 = $row['date_created'];
		$query_results['ip']		 = $row['ip'];
		$query_results['sg_message_id']		 = $row['sg_message_id'];
		$query_results['timestamp']		 = $row['timestamp'];
		$query_results['smtp-id']		 = $row['smtp-id'];
		$query_results['category']		 = $row['category'];
		$query_results['url']		 = $row['url'];
		$query_results['asm_group_id']		 = $row['asm_group_id'];
		$query_results['useragent']		 = $row['useragent'];
		$query_results['sg_event_id']		 = $row['sg_event_id'];

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

      $this->db_songsplits_live->insert('email_activity', $data);

      return $this->db_songsplits_live->insert_id();
   }

   function modify($keyvalue, $data) {

      // Load the database library
      $this->db_songsplits_live = $this->load->database('songsplits_live', TRUE);

      $this->db_songsplits_live->where('id', $keyvalue);
      $this->db_songsplits_live->update('email_activity', $data);

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
      // $this->db_songsplits_live->delete('email_activity');

      return true;

   }

	function get_Id() {
		return $this->id;	}

	function set_Id($id) {
		$this->id = $id;	}

	function get_Sender_id() {
		return $this->sender_id;	}

	function set_Sender_id($sender_id) {
		$this->sender_id = $sender_id;	}

	function get_Song_id() {
		return $this->song_id;	}

	function set_Song_id($song_id) {
		$this->song_id = $song_id;	}

	function get_Songtitle() {
		return $this->songtitle;	}

	function set_Songtitle($songtitle) {
		$this->songtitle = $songtitle;	}

	function get_Event() {
		return $this->event;	}

	function set_Event($event) {
		$this->event = $event;	}

	function get_Email() {
		return $this->email;	}

	function set_Email($email) {
		$this->email = $email;	}

	function get_Date_created() {
		return $this->date_created;	}

	function set_Date_created($date_created) {
		$this->date_created = $date_created;	}

	function get_Ip() {
		return $this->ip;	}

	function set_Ip($ip) {
		$this->ip = $ip;	}

	function get_Sg_message_id() {
		return $this->sg_message_id;	}

	function set_Sg_message_id($sg_message_id) {
		$this->sg_message_id = $sg_message_id;	}

	function get_Timestamp() {
		return $this->timestamp;	}

	function set_Timestamp($timestamp) {
		$this->timestamp = $timestamp;	}

	function get_Smtp-id() {
		return $this->smtp-id;	}

	function set_Smtp-id($smtp-id) {
		$this->smtp-id = $smtp-id;	}

	function get_Category() {
		return $this->category;	}

	function set_Category($category) {
		$this->category = $category;	}

	function get_Url() {
		return $this->url;	}

	function set_Url($url) {
		$this->url = $url;	}

	function get_Asm_group_id() {
		return $this->asm_group_id;	}

	function set_Asm_group_id($asm_group_id) {
		$this->asm_group_id = $asm_group_id;	}

	function get_Useragent() {
		return $this->useragent;	}

	function set_Useragent($useragent) {
		$this->useragent = $useragent;	}

	function get_Sg_event_id() {
		return $this->sg_event_id;	}

	function set_Sg_event_id($sg_event_id) {
		$this->sg_event_id = $sg_event_id;	}



      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You may want to add default values here.
      function _init_Email_activity()
      {
		$this->id = "";
		$this->sender_id = "";
		$this->song_id = "";
		$this->songtitle = "";
		$this->event = "";
		$this->email = "";
		$this->date_created = "";
		$this->ip = "";
		$this->sg_message_id = "";
		$this->timestamp = "";
		$this->smtp-id = "";
		$this->category = "";
		$this->url = "";
		$this->asm_group_id = "";
		$this->useragent = "";
		$this->sg_event_id = "";

      }

      // Initialize all your default variables here
      // Function used to initilialise class variables.
      // NOTE: Not particularly useful unless you are using model persistence
      // NOTE: You could add default values here, but fields are generally set empty
      function _emptyEmail_activity()
      {
		$this->id = "";
		$this->sender_id = "";
		$this->song_id = "";
		$this->songtitle = "";
		$this->event = "";
		$this->email = "";
		$this->date_created = "";
		$this->ip = "";
		$this->sg_message_id = "";
		$this->timestamp = "";
		$this->smtp-id = "";
		$this->category = "";
		$this->url = "";
		$this->asm_group_id = "";
		$this->useragent = "";
		$this->sg_event_id = "";

      }

}

?>
