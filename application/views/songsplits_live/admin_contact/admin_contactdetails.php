<?
$this->load->helper('url');
$action_url = site_url() . "/admin_contact/$action/";

?>

<h2>Enter admin_contact Details</h2>

<form name="admin_contactdetails" id="admin_contactdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='adminContact_id' id='adminContact_id' value='<?= $adminContact_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> adminContact_id:  </b> </td>

            <td>
               <input type='text' name='adminContact_id' id='adminContact_id' value='<?= $adminContact_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> adminContact_name:  </b> </td>

            <td>
               <input type='text' name='adminContact_name' id='adminContact_name' value='<?= $adminContact_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_id:  </b> </td>

            <td>
               <input type='text' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> authorized:  </b> </td>

            <td>
               <input type='text' name='authorized' id='authorized' value='<?= $authorized; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notification:  </b> </td>

            <td>
               <input type='text' name='notification' id='notification' value='<?= $notification; ?>' />
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

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> fax:  </b> </td>

            <td>
               <input type='text' name='fax' id='fax' value='<?= $fax; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>