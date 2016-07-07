<?
$this->load->helper('url');
$action_url = site_url() . "/status/$action/";

?>

<h2>Enter status Details</h2>

<form name="statusdetails" id="statusdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='status_id' id='status_id' value='<?= $status_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <?= $status_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_name:  </b> </td>

            <td>
               <input type='text' name='status_name' id='status_name' value='<?= $status_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>