<?
$this->load->helper('url');
$action_url = site_url() . "/social/$action/";

?>

<h2>Enter social Details</h2>

<form name="socialdetails" id="socialdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='social_id' id='social_id' value='<?= $social_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> facebook_access_token:  </b> </td>

            <td>
               <input type='text' name='facebook_access_token' id='facebook_access_token' value='<?= $facebook_access_token; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> facebook_id:  </b> </td>

            <td>
               <input type='text' name='facebook_id' id='facebook_id' value='<?= $facebook_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> google_plus_id:  </b> </td>

            <td>
               <input type='text' name='google_plus_id' id='google_plus_id' value='<?= $google_plus_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> social_id:  </b> </td>

            <td>
               <?= $social_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> twitter_access_token:  </b> </td>

            <td>
               <input type='text' name='twitter_access_token' id='twitter_access_token' value='<?= $twitter_access_token; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> twitter_id:  </b> </td>

            <td>
               <input type='text' name='twitter_id' id='twitter_id' value='<?= $twitter_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> twitter_secret:  </b> </td>

            <td>
               <input type='text' name='twitter_secret' id='twitter_secret' value='<?= $twitter_secret; ?>' />
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