<?
$this->load->helper('url');
$action_url = site_url() . "/request/$action/";

?>

<h2>Enter request Details</h2>

<form name="requestdetails" id="requestdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> device_type:  </b> </td>

            <td>
               <input type='text' name='device_type' id='device_type' value='<?= $device_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <input type='text' name='id' id='id' value='<?= $id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> ip_address:  </b> </td>

            <td>
               <input type='text' name='ip_address' id='ip_address' value='<?= $ip_address; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> timestamp:  </b> </td>

            <td>
               <input type='text' name='timestamp' id='timestamp' value='<?= $timestamp; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>