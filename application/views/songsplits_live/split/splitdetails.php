<?
$this->load->helper('url');
$action_url = site_url() . "/split/$action/";

?>

<h2>Enter split Details</h2>

<form name="splitdetails" id="splitdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='split_id' id='split_id' value='<?= $split_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> split_id:  </b> </td>

            <td>
               <?= $split_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> song_id:  </b> </td>

            <td>
               <input type='text' name='song_id' id='song_id' value='<?= $song_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <input type='text' name='status_id' id='status_id' value='<?= $status_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> split_type:  </b> </td>

            <td>
               <input type='text' name='split_type' id='split_type' value='<?= $split_type; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> percent:  </b> </td>

            <td>
               <input type='text' name='percent' id='percent' value='<?= $percent; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> created:  </b> </td>

            <td>
               <input type='text' name='created' id='created' value='<?= $created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> modified:  </b> </td>

            <td>
               <input type='text' name='modified' id='modified' value='<?= $modified; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> version:  </b> </td>

            <td>
               <input type='text' name='version' id='version' value='<?= $version; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> role_id:  </b> </td>

            <td>
               <input type='text' name='role_id' id='role_id' value='<?= $role_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>