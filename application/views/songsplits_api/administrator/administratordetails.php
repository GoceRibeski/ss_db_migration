<?
$this->load->helper('url');
$action_url = site_url() . "/administrator/$action/";

?>

<h2>Enter administrator Details</h2>

<form name="administratordetails" id="administratordetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='administrator_id' id='administrator_id' value='<?= $administrator_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> administrator_id:  </b> </td>

            <td>
               <input type='text' name='administrator_id' id='administrator_id' value='<?= $administrator_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cae_ipi:  </b> </td>

            <td>
               <input type='text' name='cae_ipi' id='cae_ipi' value='<?= $cae_ipi; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> company_name:  </b> </td>

            <td>
               <input type='text' name='company_name' id='company_name' value='<?= $company_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> location_id:  </b> </td>

            <td>
               <input type='text' name='location_id' id='location_id' value='<?= $location_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> parent_name:  </b> </td>

            <td>
               <input type='text' name='parent_name' id='parent_name' value='<?= $parent_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>