<?
$this->load->helper('url');
$action_url = site_url() . "/reminder/$action/";

?>

<h2>Enter reminder Details</h2>

<form name="reminderdetails" id="reminderdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='reminder_id' id='reminder_id' value='<?= $reminder_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> recieve_user_id:  </b> </td>

            <td>
               <input type='text' name='recieve_user_id' id='recieve_user_id' value='<?= $recieve_user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> reminder_id:  </b> </td>

            <td>
               <?= $reminder_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> send_user_id:  </b> </td>

            <td>
               <input type='text' name='send_user_id' id='send_user_id' value='<?= $send_user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split_id:  </b> </td>

            <td>
               <input type='text' name='split_id' id='split_id' value='<?= $split_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> work_id:  </b> </td>

            <td>
               <input type='text' name='work_id' id='work_id' value='<?= $work_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>