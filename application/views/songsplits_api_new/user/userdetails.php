<?
$this->load->helper('url');
$action_url = site_url() . "/user/$action/";

?>

<h2>Enter user Details</h2>

<form name="userdetails" id="userdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='user_id' id='user_id' value='<?= $user_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> group_id:  </b> </td>

            <td>
               <input type='text' name='group_id' id='group_id' value='<?= $group_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> usr_verified:  </b> </td>

            <td>
               <input type='text' name='usr_verified' id='usr_verified' value='<?= $usr_verified; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> main_user_type:  </b> </td>

            <td>
               <input type='text' name='main_user_type' id='main_user_type' value='<?= $main_user_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> legal_name:  </b> </td>

            <td>
               <input type='text' name='legal_name' id='legal_name' value='<?= $legal_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alias_1:  </b> </td>

            <td>
               <input type='text' name='alias_1' id='alias_1' value='<?= $alias_1; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alias_2:  </b> </td>

            <td>
               <input type='text' name='alias_2' id='alias_2' value='<?= $alias_2; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email_1:  </b> </td>

            <td>
               <input type='text' name='email_1' id='email_1' value='<?= $email_1; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email_2:  </b> </td>

            <td>
               <input type='text' name='email_2' id='email_2' value='<?= $email_2; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> img_id:  </b> </td>

            <td>
               <input type='text' name='img_id' id='img_id' value='<?= $img_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_joined:  </b> </td>

            <td>
               <input type='text' name='date_joined' id='date_joined' value='<?= $date_joined; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> last_login:  </b> </td>

            <td>
               <input type='text' name='last_login' id='last_login' value='<?= $last_login; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> location_id:  </b> </td>

            <td>
               <input type='text' name='location_id' id='location_id' value='<?= $location_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> password:  </b> </td>

            <td>
               <input type='text' name='password' id='password' value='<?= $password; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> language_id:  </b> </td>

            <td>
               <input type='text' name='language_id' id='language_id' value='<?= $language_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> usr_pwdresettoken:  </b> </td>

            <td>
               <input type='text' name='usr_pwdresettoken' id='usr_pwdresettoken' value='<?= $usr_pwdresettoken; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> usr_verify_email_token:  </b> </td>

            <td>
               <input type='text' name='usr_verify_email_token' id='usr_verify_email_token' value='<?= $usr_verify_email_token; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>