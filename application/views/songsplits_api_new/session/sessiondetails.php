<?
$this->load->helper('url');
$action_url = site_url() . "/session/$action/";

?>

<h2>Enter session Details</h2>

<form name="sessiondetails" id="sessiondetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='session_id' id='session_id' value='<?= $session_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> expiry_date:  </b> </td>

            <td>
               <input type='text' name='expiry_date' id='expiry_date' value='<?= $expiry_date; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> session_id:  </b> </td>

            <td>
               <input type='text' name='session_id' id='session_id' value='<?= $session_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> token:  </b> </td>

            <td>
               <input type='text' name='token' id='token' value='<?= $token; ?>' />
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