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
<div class='suckerdiv'><ul id='navigator'><li>access_control
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/access_control'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/access_control' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/access_control' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>activity
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/activity'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/activity' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/activity' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>administration
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/administration'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/administration' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/administration' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>administrator
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/administrator'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/administrator' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/administrator' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>attorney
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/attorney'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/attorney' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/attorney' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>co_writer
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/co_writer'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/co_writer' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/co_writer' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>connection_rnm
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/connection_rnm'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/connection_rnm' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/connection_rnm' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>image
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/image'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/image' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/image' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>language
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/language'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/language' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/language' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>locations
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/locations'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/locations' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/locations' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>manager
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/manager'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/manager' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/manager' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>other
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/other'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/other' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/other' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>publisher
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/publisher'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/publisher' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/publisher' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>publisher_split
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/publisher_split'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/publisher_split' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/publisher_split' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>referral
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/referral'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/referral' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/referral' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>reminder
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/reminder'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/reminder' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/reminder' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>request
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/request'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/request' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/request' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>session
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/session'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/session' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/session' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>signup
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/signup'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/signup' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/signup' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>social
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/social'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/social' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/social' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>society
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/society'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/society' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/society' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>user
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/user'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>user_group
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/user_group'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user_group' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user_group' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>user_group_perm
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/user_group_perm'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user_group_perm' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/user_group_perm' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>work
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/work'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>work_history
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/work_history'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work_history' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work_history' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>work_meta
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/work_meta'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work_meta' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/work_meta' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>writer
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/writer'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>writer_administrator
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/writer_administrator'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer_administrator' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer_administrator' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li><li>writer_split
                  <ul>
                     <li><a href='<?= site_url('songsplits_api_new/writer_split'); ?>'>Browse</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer_split' . '/add/'); ?>'>Add New</a></li>
                     <li><a href='<?= site_url('songsplits_api_new/writer_split' . '/find/'); ?>'>Find (not yet)</a></li>
                  </ul>
                  </li></ul></div>
