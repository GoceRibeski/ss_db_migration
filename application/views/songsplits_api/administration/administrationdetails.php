<?
$this->load->helper('url');
$action_url = site_url() . "/administration/$action/";

?>

<h2>Enter administration Details</h2>

<form name="administrationdetails" id="administrationdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> access:  </b> </td>

            <td>
               <input type='text' name='access' id='access' value='<?= $access; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> administrator_id:  </b> </td>

            <td>
               <input type='text' name='administrator_id' id='administrator_id' value='<?= $administrator_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> deal_type:  </b> </td>

            <td>
               <input type='text' name='deal_type' id='deal_type' value='<?= $deal_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <input type='text' name='id' id='id' value='<?= $id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_id:  </b> </td>

            <td>
               <input type='text' name='publisher_id' id='publisher_id' value='<?= $publisher_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>