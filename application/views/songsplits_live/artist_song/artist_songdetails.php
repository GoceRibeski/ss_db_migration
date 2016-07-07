<?
$this->load->helper('url');
$action_url = site_url() . "/artist_song/$action/";

?>

<h2>Enter artist_song Details</h2>

<form name="artist_songdetails" id="artist_songdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='artist_song_id' id='artist_song_id' value='<?= $artist_song_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> artist_song_id:  </b> </td>

            <td>
               <input type='text' name='artist_song_id' id='artist_song_id' value='<?= $artist_song_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> artist_id:  </b> </td>

            <td>
               <input type='text' name='artist_id' id='artist_id' value='<?= $artist_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> song_id:  </b> </td>

            <td>
               <input type='text' name='song_id' id='song_id' value='<?= $song_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>