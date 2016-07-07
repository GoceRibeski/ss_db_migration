<?
$this->load->helper('url');
$action_url = site_url() . "/access_control/$action/";

?>

<h2>Enter access_control Details</h2>

<form name="access_controldetails" id="access_controldetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='ac_id' id='ac_id' value='<?= $ac_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> ac_id:  </b> </td>

            <td>
               <input type='text' name='ac_id' id='ac_id' value='<?= $ac_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> resource_id:  </b> </td>

            <td>
               <input type='text' name='resource_id' id='resource_id' value='<?= $resource_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> resource_type:  </b> </td>

            <td>
               <input type='text' name='resource_type' id='resource_type' value='<?= $resource_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> read_access:  </b> </td>

            <td>
               <input type='text' name='read_access' id='read_access' value='<?= $read_access; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> write_access:  </b> </td>

            <td>
               <input type='text' name='write_access' id='write_access' value='<?= $write_access; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> role:  </b> </td>

            <td>
               <input type='text' name='role' id='role' value='<?= $role; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> granted_by:  </b> </td>

            <td>
               <input type='text' name='granted_by' id='granted_by' value='<?= $granted_by; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>