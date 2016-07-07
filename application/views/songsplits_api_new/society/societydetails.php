<?
$this->load->helper('url');
$action_url = site_url() . "/society/$action/";

?>

<h2>Enter society Details</h2>

<form name="societydetails" id="societydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='society_id' id='society_id' value='<?= $society_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> society_id:  </b> </td>

            <td>
               <input type='text' name='society_id' id='society_id' value='<?= $society_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> full_name:  </b> </td>

            <td>
               <input type='text' name='full_name' id='full_name' value='<?= $full_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> short_name:  </b> </td>

            <td>
               <input type='text' name='short_name' id='short_name' value='<?= $short_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> contact_name:  </b> </td>

            <td>
               <input type='text' name='contact_name' id='contact_name' value='<?= $contact_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> contact_email:  </b> </td>

            <td>
               <input type='text' name='contact_email' id='contact_email' value='<?= $contact_email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_type:  </b> </td>

            <td>
               <input type='text' name='society_type' id='society_type' value='<?= $society_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_country:  </b> </td>

            <td>
               <input type='text' name='society_country' id='society_country' value='<?= $society_country; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> territory_code:  </b> </td>

            <td>
               <input type='text' name='territory_code' id='territory_code' value='<?= $territory_code; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> affiliation_code:  </b> </td>

            <td>
               <input type='text' name='affiliation_code' id='affiliation_code' value='<?= $affiliation_code; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>