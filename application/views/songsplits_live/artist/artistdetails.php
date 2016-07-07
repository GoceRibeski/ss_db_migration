<?
$this->load->helper('url');
$action_url = site_url() . "/artist/$action/";

?>

<h2>Enter artist Details</h2>

<form name="artistdetails" id="artistdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='artist_id' id='artist_id' value='<?= $artist_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> artist_id:  </b> </td>

            <td>
               <input type='text' name='artist_id' id='artist_id' value='<?= $artist_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> temp_id:  </b> </td>

            <td>
               <input type='text' name='temp_id' id='temp_id' value='<?= $temp_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> artist_name:  </b> </td>

            <td>
               <input type='text' name='artist_name' id='artist_name' value='<?= $artist_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> alt_names:  </b> </td>

            <td>
               <input type='text' name='alt_names' id='alt_names' value='<?= $alt_names; ?>' />
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