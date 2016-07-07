<?
$this->load->helper('url');
$action_url = site_url() . "/work_meta/$action/";

?>

<h2>Enter work_meta Details</h2>

<form name="work_metadetails" id="work_metadetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='work_meta_id_id' id='work_meta_id_id' value='<?= $work_meta_id_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> meta_role:  </b> </td>

            <td>
               <input type='text' name='meta_role' id='meta_role' value='<?= $meta_role; ?>' />
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
	<tr valign='top' height='20'>

            <td align='right'> <b> work_meta_id_id:  </b> </td>

            <td>
               <input type='text' name='work_meta_id_id' id='work_meta_id_id' value='<?= $work_meta_id_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>