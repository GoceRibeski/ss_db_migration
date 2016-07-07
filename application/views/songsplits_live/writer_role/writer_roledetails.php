<?
$this->load->helper('url');
$action_url = site_url() . "/writer_role/$action/";

?>

<h2>Enter writer_role Details</h2>

<form name="writer_roledetails" id="writer_roledetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='role_id' id='role_id' value='<?= $role_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> role_id:  </b> </td>

            <td>
               <?= $role_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> role_name:  </b> </td>

            <td>
               <input type='text' name='role_name' id='role_name' value='<?= $role_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> shortcode:  </b> </td>

            <td>
               <input type='text' name='shortcode' id='shortcode' value='<?= $shortcode; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>