<?
$this->load->helper('url');
$action_url = site_url() . "/publisher/$action/";

?>

<h2>Enter publisher Details</h2>

<form name="publisherdetails" id="publisherdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='publisher_id' id='publisher_id' value='<?= $publisher_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_id:  </b> </td>

            <td>
               <input type='text' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_id:  </b> </td>

            <td>
               <?= $publisher_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>