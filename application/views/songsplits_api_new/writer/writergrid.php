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
		User_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Writer_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Society_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Cae_ipi
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Cae_ipi_2
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Cae_ipi_3
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Realtime_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Weekly_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Promo_email
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Manager_control
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Manager_notify
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Manager_view
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Attorney_control
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Attorney_notify
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Attorney_view
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_control
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_notify
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Publisher_view
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
   <td align="left" nowrap="nowrap"><?= $writer['user_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['writer_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['society_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['cae_ipi']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['cae_ipi_2']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['cae_ipi_3']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['realtime_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['weekly_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['promo_email']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['manager_control']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['manager_notify']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['manager_view']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['attorney_control']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['attorney_notify']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['attorney_view']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_control']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_notify']; ?></td>
   <td align="left" nowrap="nowrap"><?= $writer['publisher_view']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




