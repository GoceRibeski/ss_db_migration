<?
$this->load->helper('url');
$action_url = site_url() . "/admin/$action/";

?>

<h2>Enter admin Details</h2>

<form name="admindetails" id="admindetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_id:  </b> </td>

            <td>
               <input type='text' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_name:  </b> </td>

            <td>
               <input type='text' name='admin_name' id='admin_name' value='<?= $admin_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> adminParent_id:  </b> </td>

            <td>
               <input type='text' name='adminParent_id' id='adminParent_id' value='<?= $adminParent_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> street:  </b> </td>

            <td>
               <input type='text' name='street' id='street' value='<?= $street; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> country:  </b> </td>

            <td>
               <input type='text' name='country' id='country' value='<?= $country; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> password:  </b> </td>

            <td>
               <input type='text' name='password' id='password' value='<?= $password; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> last_login:  </b> </td>

            <td>
               <input type='text' name='last_login' id='last_login' value='<?= $last_login; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>