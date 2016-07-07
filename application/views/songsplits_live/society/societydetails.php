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
               <?= $society_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_name:  </b> </td>

            <td>
               <input type='text' name='society_name' id='society_name' value='<?= $society_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_contact:  </b> </td>

            <td>
               <input type='text' name='society_contact' id='society_contact' value='<?= $society_contact; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> stated_writers:  </b> </td>

            <td>
               <input type='text' name='stated_writers' id='stated_writers' value='<?= $stated_writers; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> actual_writers:  </b> </td>

            <td>
               <input type='text' name='actual_writers' id='actual_writers' value='<?= $actual_writers; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> stated_publishers:  </b> </td>

            <td>
               <input type='text' name='stated_publishers' id='stated_publishers' value='<?= $stated_publishers; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> actual_publishers:  </b> </td>

            <td>
               <input type='text' name='actual_publishers' id='actual_publishers' value='<?= $actual_publishers; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>