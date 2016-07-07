<?
   $this->load->helper('url');
   $modify_url = site_url('manager/modify/');
   $delete_url = site_url('manager/delete/');
   $add_url    = site_url('manager/add/');

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

<form action='<?= $add_url; ?>' method='POST' id='frmmanager'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing manager values</th>
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
		Manager_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Full_name
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Alias
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Language_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notification
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Password
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Alt_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Phone
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Super
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Locations
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Company
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Notifiy_client
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
		U_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Access_token
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
		Date_joined
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Last_login
	</th>

</tr>
</thead>
<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($manager_list as $manager) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
            <a href = "<?= $modify_url."/".$manager["manager_id"]; ?>" >Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href = "<?= $delete_url."/".$manager["manager_id"]; ?>" >Delete</a>
         </td>
   <td align="left" nowrap="nowrap"><?= $manager['manager_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['full_name']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['alias']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['language_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['notification']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['password']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['alt_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['phone']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['super']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['locations']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['company']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['notifiy_client']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['notifiy_attorney']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['notifiy_admin']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['notifiy_society']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['u_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['access_token']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['t_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['t_oauth_token']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['t_oauth_token_secret']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['date_joined']; ?></td>
   <td align="left" nowrap="nowrap"><?= $manager['last_login']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




