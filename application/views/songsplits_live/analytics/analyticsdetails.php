<?
$this->load->helper('url');
$action_url = site_url() . "/analytics/$action/";

?>

<h2>Enter analytics Details</h2>

<form name="analyticsdetails" id="analyticsdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='' id='' value='<?= $; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split_count:  </b> </td>

            <td>
               <input type='text' name='split_count' id='split_count' value='<?= $split_count; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>