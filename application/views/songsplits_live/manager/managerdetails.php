<?
$this->load->helper('url');
$action_url = site_url() . "/manager/$action/";

?>

<h2>Enter manager Details</h2>

<form name="managerdetails" id="managerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='manager_id' id='manager_id' value='<?= $manager_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_id:  </b> </td>

            <td>
               <?= $manager_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> full_name:  </b> </td>

            <td>
               <input type='text' name='full_name' id='full_name' value='<?= $full_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alias:  </b> </td>

            <td>
               <input type='text' name='alias' id='alias' value='<?= $alias; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> language_id:  </b> </td>

            <td>
               <input type='text' name='language_id' id='language_id' value='<?= $language_id; ?>' />
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
               <textarea cols=35 rows=7 NAME='email' id='email' ><?= $email; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> password:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='password' id='password' ><?= $password; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alt_email:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='alt_email' id='alt_email' ><?= $alt_email; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> super:  </b> </td>

            <td>
               <input type='text' name='super' id='super' value='<?= $super; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> locations:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='locations' id='locations' ><?= $locations; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> company:  </b> </td>

            <td>
               <input type='text' name='company' id='company' value='<?= $company; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notifiy_client:  </b> </td>

            <td>
               <input type='text' name='notifiy_client' id='notifiy_client' value='<?= $notifiy_client; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notifiy_attorney:  </b> </td>

            <td>
               <input type='text' name='notifiy_attorney' id='notifiy_attorney' value='<?= $notifiy_attorney; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notifiy_admin:  </b> </td>

            <td>
               <input type='text' name='notifiy_admin' id='notifiy_admin' value='<?= $notifiy_admin; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notifiy_society:  </b> </td>

            <td>
               <input type='text' name='notifiy_society' id='notifiy_society' value='<?= $notifiy_society; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> u_id:  </b> </td>

            <td>
               <input type='text' name='u_id' id='u_id' value='<?= $u_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> access_token:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='access_token' id='access_token' ><?= $access_token; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> t_id:  </b> </td>

            <td>
               <input type='text' name='t_id' id='t_id' value='<?= $t_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> t_oauth_token:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='t_oauth_token' id='t_oauth_token' ><?= $t_oauth_token; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> t_oauth_token_secret:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='t_oauth_token_secret' id='t_oauth_token_secret' ><?= $t_oauth_token_secret; ?></textarea>
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


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>