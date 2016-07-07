<?
   $this->load->helper('url');
   $modify_url = site_url('writer/modify/');
   $delete_url = site_url('writer/delete/');
   $add_url    = site_url('writer/add/');

?>
<style>
   /* NOTE: These are example styles to use. You can modift the styles as you
    * NOTE: ...please and intergrate into your entire site.
    */

   .tbl_headercell tbody .tbl_headercell_dataRollOver{
      /* Rollover style on mouse over (Data) */
      background-color:#FFF;
      /* No mouseover color in this example - specify another color if you want this */

   }

   .tbl{
      font-family:arial;
      font-size:12px;
      /* width:400px; */
      empty-cells: show;
   }

   .tbl td{
      margin:0px;
      padding:2px;
      empty-cells: show;
      border-bottom:1px solid #EAE9E1; /* Border bottom of table data cells */
      border-right:1px solid #EAE9E1;  /* Border bottom of table data cells */
      max-height:10px;

   }
   .tbl tbody{
      background-color:#FFF;
   }

   .tbl_headercell{
      /* Standard column header */
      border-top:2px solid #ECE9D8;
   }

   .tbl thead{
      /*position:relative; */ 
   }
   .tbl thead tr{
      /*position:relative; */
      top:0px;
      bottom:0px;
   }

   .tbl .scrollingContent{
      overflow:auto;
      overflow-y:auto;                    /* NOTE: Remove for no scrolling */
      overflow:-moz-scrollbars-vertical;  /* NOTE: Remove for no scrolling */
      width:100%;
      /* NOTE: Specify a required height for the scrollable table or remove for no scrolling */
      height:350px;

   }


   /* End layout CSS */

</style>

<form action='<?= $add_url; ?>' method='POST' id='frmwriter'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing writer values</th>
   <th align="right">
    <input class="redbutton" value="&nbsp;&nbsp;Add&nbsp;&nbsp;" type="submit" name='add' id='add' >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
</table>
</form>

<br />
<table class="tbl" border="0" cellpadding="2" cellspacing="1" width="100%">
<thead>
<tr>
	<th align="right" width="70"> &nbsp; sort by:&nbsp; </th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Writer_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Img_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		First_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Middle_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Last_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Suffix_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Alias_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Password
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		BcryptPassword
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		U_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Access_token
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Gender
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Birthday
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Full_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Date_joined
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Last_login
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Phone
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Language_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Society_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Ipi
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_ascap
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_bmi
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_sesac
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Other_publisher_alias
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Admin_contact_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Attorney_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Attorney_authorized
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Manager_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Manager_authorized
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notification
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notifiy_manager
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notifiy_attorney
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notifiy_admin
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notifiy_society
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		T_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		T_oauth_token
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		T_oauth_token_secret
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Display_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Backup_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Locations
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_society_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_admin_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Admin_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Temp
	</th>

</tr>
</thead>
<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($writer_list as $writer) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
            <a href = "<?= $modify_url."/".$writer["writer_id"]; ?>" >Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href = "<?= $delete_url."/".$writer["writer_id"]; ?>" >Delete</a>
         </td>
   <td align="left" nowrap="nowrap"><?= $writer['writer_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['img_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['first_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['middle_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['last_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['suffix_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['alias_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['password']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['bcryptPassword']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['u_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['access_token']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['gender']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['birthday']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['full_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['date_joined']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['last_login']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['phone']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['language_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['society_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['ipi']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_ascap']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_bmi']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_sesac']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['other_publisher_alias']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['admin_contact_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['attorney_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['attorney_authorized']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['manager_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['manager_authorized']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['notification']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['notifiy_manager']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['notifiy_attorney']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['notifiy_admin']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['notifiy_society']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['t_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['t_oauth_token']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['t_oauth_token_secret']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['display_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['backup_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['locations']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_society_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_admin_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['admin_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['temp']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




