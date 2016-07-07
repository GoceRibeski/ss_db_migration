<?
$this->load->helper('url');
$action_url = site_url() . "/user_group/$action/";

?>

<h2>Enter user_group Details</h2>

<form name="user_groupdetails" id="user_groupdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='gr_id' id='gr_id' value='<?= $gr_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> gr_id:  </b> </td>

            <td>
               <input type='text' name='gr_id' id='gr_id' value='<?= $gr_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> gr_name:  </b> </td>

            <td>
               <input type='text' name='gr_name' id='gr_name' value='<?= $gr_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>