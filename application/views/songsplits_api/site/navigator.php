<style type="text/css">

body { 
 background-color: #fff; 
 margin: 10px; 
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 12px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 20px 0 2px 0;
 padding: 5px 0 6px 0;
}

</style>
<? $this->load->helper('url'); ?>
<div class='suckerdiv'><ul id='navigator'>
        
        
          
                  
                  <li>access_control
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/access_control'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/access_control' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/access_control' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>activity
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/activity'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/activity' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/activity' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>administration
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/administration'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/administration' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/administration' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>attorney
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/attorney'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/attorney' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/attorney' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>connection
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/connection'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/connection' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/connection' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>co_writer
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/co_writer'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/co_writer' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/co_writer' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>image
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/image'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/image' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/image' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>language
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/language'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/language' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/language' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>locations
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/locations'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/locations' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/locations' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>manager
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/manager'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/manager' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/manager' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>other
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/other'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/other' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/other' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>publisher
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/publisher'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/publisher' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/publisher' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>publisher_split
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/publisher_split'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/publisher_split' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/publisher_split' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>referral
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/referral'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/referral' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/referral' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>reminder
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/reminder'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/reminder' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/reminder' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>request
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/request'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/request' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/request' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>session
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/session'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/session' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/session' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>signup
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/signup'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/signup' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/signup' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>social
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/social'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/social' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/social' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>society
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/society'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/society' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/society' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                  <li>user
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/user'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/user' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/user' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>user_group
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/user_group'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/user_group' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/user_group' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>user_group_perm
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/user_group_perm'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/user_group_perm' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/user_group_perm' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>work
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/work'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/work' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/work' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>work_history
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/work_history'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/work_history' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/work_history' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>work_meta
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/work_meta'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/work_meta' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/work_meta' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>writer
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/writer'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>writer_administrator
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/writer_administrator'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer_administrator' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer_administrator' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
                  
                   <li>writer_split
                  <ul>
                     <li><a href='<?= site_url('songsplits_api/writer_split'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer_split' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api/writer_split' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>
         
                
                  
                  
                  
                          <li>connection_rnm
                  <ul>
                     <li><a href='<?= site_url('connection_rnm'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('connection_rnm' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('connection_rnm' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li>

    </ul></div>
