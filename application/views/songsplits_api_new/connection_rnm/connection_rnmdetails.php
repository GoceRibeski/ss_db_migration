<?
$this->load->helper('url');
$action_url = site_url() . "/connection_rnm/$action/";

?>

<h2>Enter connection_rnm Details</h2>

<form name="connection_rnmdetails" id="connection_rnmdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <input type='text' name='id' id='id' value='<?= $id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> connection_id:  </b> </td>

            <td>
               <input type='text' name='connection_id' id='connection_id' value='<?= $connection_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>