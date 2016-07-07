<?
$this->load->helper('url');
$action_url = site_url() . "/tag_type/$action/";

?>

<h2>Enter tag_type Details</h2>

<form name="tag_typedetails" id="tag_typedetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='tag_type_id' id='tag_type_id' value='<?= $tag_type_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> tag_type_id:  </b> </td>

            <td>
               <?= $tag_type_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> tag_type_name:  </b> </td>

            <td>
               <input type='text' name='tag_type_name' id='tag_type_name' value='<?= $tag_type_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>