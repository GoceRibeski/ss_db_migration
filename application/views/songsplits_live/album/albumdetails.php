<?
$this->load->helper('url');
$action_url = site_url() . "/album/$action/";

?>

<h2>Enter album Details</h2>

<form name="albumdetails" id="albumdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='album_id' id='album_id' value='<?= $album_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> album_id:  </b> </td>

            <td>
               <input type='text' name='album_id' id='album_id' value='<?= $album_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> temp_id:  </b> </td>

            <td>
               <input type='text' name='temp_id' id='temp_id' value='<?= $temp_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> artist_id:  </b> </td>

            <td>
               <input type='text' name='artist_id' id='artist_id' value='<?= $artist_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> release:  </b> </td>

            <td>
               <input type='text' name='release' id='release' value='<?= $release; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> artist:  </b> </td>

            <td>
               <input type='text' name='artist' id='artist' value='<?= $artist; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> label:  </b> </td>

            <td>
               <input type='text' name='label' id='label' value='<?= $label; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>