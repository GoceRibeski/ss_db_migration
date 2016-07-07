<?php

class Appmain extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
            // Your own constructor code
       }

	function index()
	{
		
            $data['page_contents'] = 'page_contents';
            $this->load->view('songsplits_api/songsplits_api/site/main');
	}
}
?>
