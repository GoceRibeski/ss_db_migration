<?
$this->load->helper('url');
$action_url = site_url() . "/publisher_split/$action/";

?>

<h2>Enter publisher_split Details</h2>

<form name="publisher_splitdetails" id="publisher_splitdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='split_id' id='split_id' value='<?= $split_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> confirmed:  </b> </td>

            <td>
               <input type='text' name='confirmed' id='confirmed' value='<?= $confirmed; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> created:  </b> </td>

            <td>
               <input type='text' name='created' id='created' value='<?= $created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_id:  </b> </td>

            <td>
               <input type='text' name='publisher_id' id='publisher_id' value='<?= $publisher_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> role:  </b> </td>

            <td>
               <input type='text' name='role' id='role' value='<?= $role; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split:  </b> </td>

            <td>
               <input type='text' name='split' id='split' value='<?= $split; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split_id:  </b> </td>

            <td>
               <input type='text' name='split_id' id='split_id' value='<?= $split_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split_type:  </b> </td>

            <td>
               <input type='text' name='split_type' id='split_type' value='<?= $split_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <input type='text' name='status_id' id='status_id' value='<?= $status_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> version:  </b> </td>

            <td>
               <input type='text' name='version' id='version' value='<?= $version; ?>' />
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