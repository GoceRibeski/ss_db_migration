<?
$this->load->helper('url');
$action_url = site_url() . "/song/$action/";

?>

<h2>Enter song Details</h2>

<form name="songdetails" id="songdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='song_id' id='song_id' value='<?= $song_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> song_id:  </b> </td>

            <td>
               <?= $song_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> create_by_id:  </b> </td>

            <td>
               <input type='text' name='create_by_id' id='create_by_id' value='<?= $create_by_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <input type='text' name='status_id' id='status_id' value='<?= $status_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> song_title:  </b> </td>

            <td>
               <input type='text' name='song_title' id='song_title' value='<?= $song_title; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alt_title1:  </b> </td>

            <td>
               <input type='text' name='alt_title1' id='alt_title1' value='<?= $alt_title1; ?>' />
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

            <td align='right'> <b> sampled:  </b> </td>

            <td>
               <input type='text' name='sampled' id='sampled' value='<?= $sampled; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> is_cue:  </b> </td>

            <td>
               <input type='text' name='is_cue' id='is_cue' value='<?= $is_cue; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> is_track:  </b> </td>

            <td>
               <input type='text' name='is_track' id='is_track' value='<?= $is_track; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> is_lyrics:  </b> </td>

            <td>
               <input type='text' name='is_lyrics' id='is_lyrics' value='<?= $is_lyrics; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> current_version:  </b> </td>

            <td>
               <input type='text' name='current_version' id='current_version' value='<?= $current_version; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> lyrics:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='lyrics' id='lyrics' ><?= $lyrics; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> iswc:  </b> </td>

            <td>
               <input type='text' name='iswc' id='iswc' value='<?= $iswc; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>