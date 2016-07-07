<?
$this->load->helper('url');
$action_url = site_url() . "/locations/$action/";

?>

<h2>Enter locations Details</h2>

<form name="locationsdetails" id="locationsdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='location_id' id='location_id' value='<?= $location_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> city:  </b> </td>

            <td>
               <input type='text' name='city' id='city' value='<?= $city; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> country:  </b> </td>

            <td>
               <input type='text' name='country' id='country' value='<?= $country; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> location_id:  </b> </td>

            <td>
               <?= $location_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> state_region:  </b> </td>

            <td>
               <input type='text' name='state_region' id='state_region' value='<?= $state_region; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>