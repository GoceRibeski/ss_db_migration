<?
$this->load->helper('url');
$action_url = site_url() . "/work_history/$action/";

?>

<h2>Enter work_history Details</h2>

<form name="work_historydetails" id="work_historydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='work_history_id' id='work_history_id' value='<?= $work_history_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> work_history_id:  </b> </td>

            <td>
               <input type='text' name='work_history_id' id='work_history_id' value='<?= $work_history_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> work_id:  </b> </td>

            <td>
               <input type='text' name='work_id' id='work_id' value='<?= $work_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> note:  </b> </td>

            <td>
               <input type='text' name='note' id='note' value='<?= $note; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> version:  </b> </td>

            <td>
               <input type='text' name='version' id='version' value='<?= $version; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>