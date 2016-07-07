<?
$this->load->helper('url');
$action_url = site_url() . "/user_group_perm/$action/";

?>

<h2>Enter user_group_perm Details</h2>

<form name="user_group_permdetails" id="user_group_permdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='per_id' id='per_id' value='<?= $per_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> per_id:  </b> </td>

            <td>
               <?= $per_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> per_group_id:  </b> </td>

            <td>
               <input type='text' name='per_group_id' id='per_group_id' value='<?= $per_group_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> per_flag:  </b> </td>

            <td>
               <input type='text' name='per_flag' id='per_flag' value='<?= $per_flag; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>