<?
$this->load->helper('url');
$action_url = site_url() . "/img/$action/";

?>

<h2>Enter img Details</h2>

<form name="imgdetails" id="imgdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='img_id' id='img_id' value='<?= $img_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> img_id:  </b> </td>

            <td>
               <?= $img_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> img_name:  </b> </td>

            <td>
               <input type='text' name='img_name' id='img_name' value='<?= $img_name; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>