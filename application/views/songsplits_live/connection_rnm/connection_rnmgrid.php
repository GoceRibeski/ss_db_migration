<?
   $this->load->helper('url');
   $modify_url = site_url('connection_rnm/modify/');
   $delete_url = site_url('connection_rnm/delete/');
   $add_url    = site_url('connection_rnm/add/');

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

<form action='<?= $add_url; ?>' method='POST' id='frmconnection_rnm'>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
   <th align="left" class="formSecHeader">Browsing connection_rnm values</th>
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
		Connection_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Writer_id
	</th>
	<th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
		Writer_id1
	</th>

</tr>
</thead>
<tbody  class="scrollingContent">

      <?
         $i = 0;
         foreach ($connection_rnm_list as $connection_rnm) {
            $i++;
            if (($i%2)==0) { $bgColor = "#FFFFFF"; } else { $bgColor = "#C0C0C0"; }
      ?>
      <tr bgcolor="<?= $bgColor; ?>">
         <td align="center" nowrap="nowrap">
            <a href = "<?= $modify_url."/".$connection_rnm["connection_id"]; ?>" >Edit</a>
            &nbsp;&nbsp;&nbsp;
            <a href = "<?= $delete_url."/".$connection_rnm["connection_id"]; ?>" >Delete</a>
         </td>
   <td align="left" nowrap="nowrap"><?= $connection_rnm['connection_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $connection_rnm['writer_id']; ?></td>
   <td align="left" nowrap="nowrap"><?= $connection_rnm['writer_id1']; ?></td>
</tr>
      <? } ?>
</tbody>
</table>
<br />




