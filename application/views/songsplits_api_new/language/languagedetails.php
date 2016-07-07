<?
$this->load->helper('url');
$action_url = site_url() . "/language/$action/";

?>

<h2>Enter language Details</h2>

<form name="languagedetails" id="languagedetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='language_id' id='language_id' value='<?= $language_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> language_id:  </b> </td>

            <td>
               <input type='text' name='language_id' id='language_id' value='<?= $language_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> language_name:  </b> </td>

            <td>
               <input type='text' name='language_name' id='language_name' value='<?= $language_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>