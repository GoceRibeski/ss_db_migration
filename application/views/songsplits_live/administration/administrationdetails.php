<?
$this->load->helper('url');
$action_url = site_url() . "/administration/$action/";

?>

<h2>Enter administration Details</h2>

<form name="administrationdetails" id="administrationdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='administration_id' id='administration_id' value='<?= $administration_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> administration_id:  </b> </td>

            <td>
               <input type='text' name='administration_id' id='administration_id' value='<?= $administration_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> company_name:  </b> </td>

            <td>
               <input type='text' name='company_name' id='company_name' value='<?= $company_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> ipi:  </b> </td>

            <td>
               <input type='text' name='ipi' id='ipi' value='<?= $ipi; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_society_id:  </b> </td>

            <td>
               <input type='text' name='publisher_society_id' id='publisher_society_id' value='<?= $publisher_society_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_admin_id:  </b> </td>

            <td>
               <input type='text' name='publisher_admin_id' id='publisher_admin_id' value='<?= $publisher_admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> created:  </b> </td>

            <td>
               <input type='text' name='created' id='created' value='<?= $created; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>