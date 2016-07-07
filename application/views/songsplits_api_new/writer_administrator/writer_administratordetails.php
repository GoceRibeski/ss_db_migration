<?
$this->load->helper('url');
$action_url = site_url() . "/writer_administrator/$action/";

?>

<h2>Enter writer_administrator Details</h2>

<form name="writer_administratordetails" id="writer_administratordetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='wa_id' id='wa_id' value='<?= $wa_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> wa_id:  </b> </td>

            <td>
               <input type='text' name='wa_id' id='wa_id' value='<?= $wa_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_id:  </b> </td>

            <td>
               <input type='text' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> rel_type:  </b> </td>

            <td>
               <input type='text' name='rel_type' id='rel_type' value='<?= $rel_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> access_type:  </b> </td>

            <td>
               <input type='text' name='access_type' id='access_type' value='<?= $access_type; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>