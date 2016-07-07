<?
$this->load->helper('url');
$action_url = site_url() . "/manager/$action/";

?>

<h2>Enter manager Details</h2>

<form name="managerdetails" id="managerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='attorney_id' id='attorney_id' value='<?= $attorney_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_id:  </b> </td>

            <td>
               <input type='text' name='attorney_id' id='attorney_id' value='<?= $attorney_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> company:  </b> </td>

            <td>
               <input type='text' name='company' id='company' value='<?= $company; ?>' />
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