<?
$this->load->helper('url');
$action_url = site_url() . "/signup/$action/";

?>

<h2>Enter signup Details</h2>

<form name="signupdetails" id="signupdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='signup_id' id='signup_id' value='<?= $signup_id; ?>' >
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
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> full_name:  </b> </td>

            <td>
               <input type='text' name='full_name' id='full_name' value='<?= $full_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> salt:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='salt' id='salt' ><?= $salt; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> signup_id:  </b> </td>

            <td>
               <?= $signup_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society:  </b> </td>

            <td>
               <input type='text' name='society' id='society' value='<?= $society; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <input type='text' name='status_id' id='status_id' value='<?= $status_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>