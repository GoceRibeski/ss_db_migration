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
    
    
    
    // https://docs.google.com/document/d/1Pw4WZW7MV_SUag062K4v_cPdRy2rpjsQkcKmT9D30sk/edit
    // For each distinct writed name, fill tables a_writer_name -(1:n)- a_writer_keys
    function fixing_live_writer(){
        
        
        //todo add u_id , run again.
        die('DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->fixing_live_writer();

    }









    
    

    
    //old
    function migrate_writer_to_writer() {
        
            /*
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
     * */
     
        
        die('Old not DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->migrate_writer_to_writer();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    //    Migrate live.a_writer_name to api.writer
    //    Migrate live.a_writer_name to api.user
    //    Api.user -(1:1)- api.writer
    function migrate_a_writer_name_to_writer() {
        
        die('done');
        
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->migrate_a_writer_name_to_writer();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    
    //old
    function migrate_writer_to_user() {
        
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
        
        
        die('not DONE');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/writermodel');

        $this->writermodel->migrate_writer_to_user();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    //live.song to api.work, with new id for the writer: ida_writer_name 
    //http://localhost/sites/songsplit/ss_db_migration/index.php/songsplits_live/appmain/migrate_song_to_work/ 
    function migrate_song_to_work() {
        
        die('done');

        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/songmodel');

        $this->songmodel->migrate_song_to_work();
    }
    
    
    
    // live.split to api.writer_split, with new id for the writer: ida_writer_name
    function migrate_split_to_writer_split() {
        
        die('done');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/splitmodel');

        $this->splitmodel->migrate_split_to_writer_split();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    
    // live.versions to api.work_history, with new id for the writer: ida_writer_name
    function migrate_versions_to_work_history() {
        
        die('done');
        
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 19000); //300 seconds = 5 minutes
        
        
        $this->load->model('songsplits_live/versionsmodel');

        $this->versionsmodel->migrate_versions_to_work_history();


//            echo '<pre>';
//            print_r($the_results);
//            echo '<pre>';
//            die(__FILE__.__LINE__);
    }
    


    // 1.Migrate live.admin TO api.user and live.a_admin
    //AND to api.administrator, Administration,Publisher
    //
    //They have all same keys, because admins/publishers are noe users - 
    //- all keys are same as the user_id
    function migrate_admin_to_api_user_and_live_a_admin() {
        
        die('done');
        

        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/adminmodel');

        $this->adminmodel->migrate_admin_to_api_user_and_live_a_admin();
    }
    
    
    function migrate_admin_contact_to_api_user() {
        
        die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/adminmodel');

        $this->adminmodel->migrate_admin_contact_to_api_user();
    }
    
    function add_live_administration_company_name_as_api_users_publishers() {
        
        die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/adminmodel');

        $this->adminmodel->add_live_administration_company_name_as_api_users_publishers();
        
        
    }
    
    function live_administration_to_api_publisher_split() {
        
         die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/adminmodel');

        $this->adminmodel->live_administration_to_api_publisher_split();
        
        
    }
    
    
    function live_administration_to_api_publisher_split_2() {
        
         die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/adminmodel');

        $this->adminmodel->live_administration_to_api_publisher_split_2();
        
    }
    
    
    function live_society_to_api_society() {
        
         die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/societymodel');

        $this->societymodel->live_society_to_api_society();
        
    }
    
    
    function live_harvest_to_api_signup() {
        
        
         die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/harvestmodel');

        $this->harvestmodel->live_harvest_to_api_signup();
        
    }
    
    
    function live_language_to_api_language() {
        
        
         die('done manaly');
        
        
    }
    
    
    
    function live_img_to_api_image() {
        
        
         die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/imgmodel');

        $this->imgmodel->live_img_to_api_image();
        
    }
    
    
    function live_attorney_to_api_attorney() {
        
        
        // die('done');
        
        ini_set('memory_limit', '2048M');
        $this->load->model('songsplits_live/attorneymodel');

        $this->attorneymodel->live_attorney_to_api_attorney();
        
    }
    
    
    
    
    
    
    
    
    
    

}