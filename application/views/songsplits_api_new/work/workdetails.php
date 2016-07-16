<?
$this->load->helper('url');
$action_url = site_url() . "/work/$action/";

?>

<h2>Work Details</h2>
<div align='left'>
    
    
<form name="workdetails" id="workdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='work_id' id='work_id' value='<?= $work_id; ?>' >

<table cellspacing="2" cellpadding="2" border="0" >
    
    
        <tr valign='top' height='20'>

            <td align='right'>  title: <b>'<?= $title; ?> </b> </td>

           
         </tr>
    
	<tr valign='top' height='20'>

            <td align='right'> <b> work_id:  </b> </td>

            <td>
               <input type='text' name='work_id' id='work_id' value='<?= $work_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> create_user_id:  </b> </td>

            <td>
               <input type='text' name='create_user_id' id='create_user_id' value='<?= $create_user_id; ?>' />
            </td>
         </tr>
	
	<tr valign='top' height='20'>

            <td align='right'> <b> alt_title:  </b> </td>

            <td>
               <input type='text' name='alt_title' id='alt_title' value='<?= $alt_title; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> work_type:  </b> </td>

            <td>
               <input type='text' name='work_type' id='work_type' value='<?= $work_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <input type='text' name='status_id' id='status_id' value='<?= $status_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> current_version:  </b> </td>

            <td>
               <input type='text' name='current_version' id='current_version' value='<?= $current_version; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_confirmed:  </b> </td>

            <td>
               <input type='text' name='date_confirmed' id='date_confirmed' value='<?= $date_confirmed; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> iswc:  </b> </td>

            <td>
               <input type='text' name='iswc' id='iswc' value='<?= $iswc; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> lyrics:  </b> </td>

            <td>
               <input type='text' name='lyrics' id='lyrics' value='<?= $lyrics; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sample_id:  </b> </td>

            <td>
               <input type='text' name='sample_id' id='sample_id' value='<?= $sample_id; ?>' />
            </td>
         </tr>


</table>

<!--<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">-->

</form>
    
</div>


<?php
//            echo '<pre>';
//            print_r($user_list);
//            echo '<pre>';
//            //die(__FILE__.__LINE__);


?>

<h2>Work Publishers</h2>
<form action='<?= $add_url; ?>' method='POST' id='frmuser'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing user values</th>
   <th align="right">
    <input class="redbutton" value="&nbsp;&nbsp;Add&nbsp;&nbsp;" type="submit" name='add' id='add' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
</table>
</form>

<br />
<table class="tbl" border="0" cellpadding="2" cellspacing="1" width="100%">
<thead>
<tr>
	<th align="right" width="70"> </th>
        
        <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
            Legal_name
	</th>
        
        <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
            Count Works
	</th>
        
        
        
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		User_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Group_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Usr_verified
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Main_user_type
	</th>
	
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Alias_1
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Alias_2
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Email_1
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Email_2
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Phone
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Img_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Date_joined
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Last_login
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Location_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Password
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Language_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Usr_pwdresettoken
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Usr_verify_email_token
	</th>

</tr>
</thead>
<tbody  class="scrollingContent">

      <?php
 
         $i = 0;
         foreach ($user_list as $user) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
             
             <?php
             //if($user['count_writer_split'])
             //{
             ?>
<!--             <a href = "< ?= $modify_url."/".$user["user_id"]; ?>" ><b>Details: < ?= $user['count_publisher_split']; ?></b></a>-->
             
             <?php             
             // }
             ?>
             
            
            
            
            
            &nbsp;&nbsp;&nbsp;
<!--            <a href = "< ?= $delete_url."/".$user["user_id"]; ?>" >Delete</a>-->
         </td>
         
    <td align="left" nowrap="nowrap"><?= $user['legal_name']; ?></td>
     <td align="left" nowrap="nowrap"><?php // echo $user['count_writer_split']; ?></td>
    
    

         
         
   <td align="left" nowrap="nowrap"><?= $user['user_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['group_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['usr_verified']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['main_user_type']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['alias_1']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['alias_2']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['email_1']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['email_2']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['phone']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['img_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['date_joined']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['last_login']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['location_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['password']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['language_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['usr_pwdresettoken']; ?></td>
   <td align="left" nowrap="nowrap"><?= $user['usr_verify_email_token']; ?></td>
</tr>
      <?php } ?>
</tbody>
</table>
<br />