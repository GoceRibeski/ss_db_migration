<?
$this->load->helper('url');
$action_url = site_url() . "/referral/$action/";

?>

<h2>Enter referral Details</h2>

<form name="referraldetails" id="referraldetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='referral_id' id='referral_id' value='<?= $referral_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='email' id='email' ><?= $email; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> new_user_id:  </b> </td>

            <td>
               <input type='text' name='new_user_id' id='new_user_id' value='<?= $new_user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> referral_id:  </b> </td>

            <td>
               <?= $referral_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>