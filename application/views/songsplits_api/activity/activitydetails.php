<?
$this->load->helper('url');
$action_url = site_url() . "/activity/$action/";

?>

<h2>Enter activity Details</h2>

<form name="activitydetails" id="activitydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='activity_id' id='activity_id' value='<?= $activity_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> action:  </b> </td>

            <td>
               <input type='text' name='action' id='action' value='<?= $action; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> activity:  </b> </td>

            <td>
               <input type='text' name='activity' id='activity' value='<?= $activity; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> activity_id:  </b> </td>

            <td>
               <input type='text' name='activity_id' id='activity_id' value='<?= $activity_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
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