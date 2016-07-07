<?
$this->load->helper('url');
$action_url = site_url() . "/versions/$action/";

?>

<h2>Enter versions Details</h2>

<form name="versionsdetails" id="versionsdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='version_id' id='version_id' value='<?= $version_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> version_id:  </b> </td>

            <td>
               <?= $version_id; ?>
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

            <td align='right'> <b> version:  </b> </td>

            <td>
               <input type='text' name='version' id='version' value='<?= $version; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> additional_info:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='additional_info' id='additional_info' ><?= $additional_info; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> old_song_title:  </b> </td>

            <td>
               <input type='text' name='old_song_title' id='old_song_title' value='<?= $old_song_title; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_added:  </b> </td>

            <td>
               <input type='text' name='date_added' id='date_added' value='<?= $date_added; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>