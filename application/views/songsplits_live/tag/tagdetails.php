<?
$this->load->helper('url');
$action_url = site_url() . "/tag/$action/";

?>

<h2>Enter tag Details</h2>

<form name="tagdetails" id="tagdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='tag_id' id='tag_id' value='<?= $tag_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> tag_id:  </b> </td>

            <td>
               <?= $tag_id; ?>
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

            <td align='right'> <b> tag_type_id:  </b> </td>

            <td>
               <input type='text' name='tag_type_id' id='tag_type_id' value='<?= $tag_type_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> tag_name:  </b> </td>

            <td>
               <input type='text' name='tag_name' id='tag_name' value='<?= $tag_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> created:  </b> </td>

            <td>
               <input type='text' name='created' id='created' value='<?= $created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> other_id:  </b> </td>

            <td>
               <input type='text' name='other_id' id='other_id' value='<?= $other_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>