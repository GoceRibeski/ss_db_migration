<?php

class Appmain extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    function index() {

        $data['page_contents'] = 'page_contents';
        $this->load->view('songsplits_live/site/main', $data);

//            echo '<pre>';
//        print_r($idProjects_subelements);
//        echo '<pre>';
//        die(__FILE__.__LINE__);
    }
    
    
    
    

    //http://localhost/sites/songsplit/ss_db_migration/index.php/songsplits_live/appmain/migrate_song_to_work/ 
    function migrate_song_to_work() {

                
        
        echo 'DONE';
        echo '<pre>';
        die(__FILE__ . __LINE__);


        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/songmodel');

        $this->songmodel->migrate_song_to_work();
    }

    //  live.writer		api.writer	
    //	writer_id		writer_id
    //	NEW                     user_id
    //	society_id		society_id
    //	ipi                     cae_ipi
    //	NEW                     cae_ipi_2
    //	NEW                     cae_ipi_3
    //	notification		realtime_email
    //	notification		weekly_email
    //	NEW                     promo_email
    //	notifiy_manager		manager_notify
    //	NEW                     manager_view
    //	manager_authorized	manager_control
    //	notifiy_attorney	attorney_notify
    //	NEW                     attorney_view
    //	attorney_authorized	attorney_control
    //	NEW                     publisher_notify
    //	NEW                     publisher_view
    //	NEW                     publisher_control
    function migrate_writer_to_writer() {
        
        //todo add u_id , run again.
        die('DONE, without u_id');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->migrate_writer_to_writer();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    
/*    live.writer		api.user	
			user_id
			main_user_type
	img_id		img_id
	full_name		legal_name
	display_name		alias_1
	email		email_1
	backup_email		email_2
	password		password
	date_joined		date_joined
	last_login		last_login
	phone		phone
	language_id		language_id
	locations		location_id
    
*/
    function migrate_writer_to_user() {
        
        
        //die('DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->migrate_writer_to_user();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    
    
//live.split to api.writer_split
//AND
//live.versions to api.work_history
function migrate_split_to_writer_split() {
        
        
        die('DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/splitmodel');

        $this->splitmodel->migrate_split_to_writer_split();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    function migrate_versions_to_work_history() {
        
        
        die('DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/versionsmodel');

        $this->versionsmodel->migrate_versions_to_work_history();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    

    
    
    

}

?>
