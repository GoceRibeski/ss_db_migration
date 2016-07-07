<?
$this->load->helper('url');
$action_url = site_url() . "/writer/$action/";

?>

<h2>Enter writer Details</h2>

<form name="writerdetails" id="writerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <?= $writer_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> img_id:  </b> </td>

            <td>
               <input type='text' name='img_id' id='img_id' value='<?= $img_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> first_name:  </b> </td>

            <td>
               <input type='text' name='first_name' id='first_name' value='<?= $first_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> middle_name:  </b> </td>

            <td>
               <input type='text' name='middle_name' id='middle_name' value='<?= $middle_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> last_name:  </b> </td>

            <td>
               <input type='text' name='last_name' id='last_name' value='<?= $last_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> suffix_name:  </b> </td>

            <td>
               <input type='text' name='suffix_name' id='suffix_name' value='<?= $suffix_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alias_name:  </b> </td>

            <td>
               <input type='text' name='alias_name' id='alias_name' value='<?= $alias_name; ?>' />
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
               <textarea cols=35 rows=7 NAME='password' id='password' ><?= $password; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> bcryptPassword:  </b> </td>

            <td>
               <input type='password' name='bcryptPassword' id='bcryptPassword' value='<?= $bcryptPassword; ?>' />
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

            <td align='right'> <b> gender:  </b> </td>

            <td>
               <input type='text' name='gender' id='gender' value='<?= $gender; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> birthday:  </b> </td>

            <td>
               <input type='text' name='birthday' id='birthday' value='<?= $birthday; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> full_name:  </b> </td>

            <td>
               <input type='text' name='full_name' id='full_name' value='<?= $full_name; ?>' />
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

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> language_id:  </b> </td>

            <td>
               <input type='text' name='language_id' id='language_id' value='<?= $language_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_id:  </b> </td>

            <td>
               <input type='text' name='society_id' id='society_id' value='<?= $society_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> ipi:  </b> </td>

            <td>
               <input type='text' name='ipi' id='ipi' value='<?= $ipi; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_ascap:  </b> </td>

            <td>
               <input type='text' name='publisher_ascap' id='publisher_ascap' value='<?= $publisher_ascap; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_bmi:  </b> </td>

            <td>
               <input type='text' name='publisher_bmi' id='publisher_bmi' value='<?= $publisher_bmi; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_sesac:  </b> </td>

            <td>
               <input type='text' name='publisher_sesac' id='publisher_sesac' value='<?= $publisher_sesac; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> other_publisher_alias:  </b> </td>

            <td>
               <input type='text' name='other_publisher_alias' id='other_publisher_alias' value='<?= $other_publisher_alias; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> admin_contact_id:  </b> </td>

            <td>
               <input type='text' name='admin_contact_id' id='admin_contact_id' value='<?= $admin_contact_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_id:  </b> </td>

            <td>
               <input type='text' name='attorney_id' id='attorney_id' value='<?= $attorney_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_authorized:  </b> </td>

            <td>
               <input type='text' name='attorney_authorized' id='attorney_authorized' value='<?= $attorney_authorized; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_id:  </b> </td>

            <td>
               <input type='text' name='manager_id' id='manager_id' value='<?= $manager_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_authorized:  </b> </td>

            <td>
               <input type='text' name='manager_authorized' id='manager_authorized' value='<?= $manager_authorized; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notification:  </b> </td>

            <td>
               <input type='text' name='notification' id='notification' value='<?= $notification; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notifiy_manager:  </b> </td>

            <td>
               <input type='text' name='notifiy_manager' id='notifiy_manager' value='<?= $notifiy_manager; ?>' />
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

            <td align='right'> <b> t_id:  </b> </td>

            <td>
               <input type='text' name='t_id' id='t_id' value='<?= $t_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> t_oauth_token:  </b> </td>

            <td>
               <input type='text' name='t_oauth_token' id='t_oauth_token' value='<?= $t_oauth_token; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> t_oauth_token_secret:  </b> </td>

            <td>
               <input type='text' name='t_oauth_token_secret' id='t_oauth_token_secret' value='<?= $t_oauth_token_secret; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> display_name:  </b> </td>

            <td>
               <input type='text' name='display_name' id='display_name' value='<?= $display_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> backup_email:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='backup_email' id='backup_email' ><?= $backup_email; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> locations:  </b> </td>

            <td>
               <input type='text' name='locations' id='locations' value='<?= $locations; ?>' />
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

            <td align='right'> <b> admin_id:  </b> </td>

            <td>
               <input type='text' name='admin_id' id='admin_id' value='<?= $admin_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> temp:  </b> </td>

            <td>
               <input type='text' name='temp' id='temp' value='<?= $temp; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>