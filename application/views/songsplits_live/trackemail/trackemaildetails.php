<?
$this->load->helper('url');
$action_url = site_url() . "/trackemail/$action/";

?>

<h2>Enter trackemail Details</h2>

<form name="trackemaildetails" id="trackemaildetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='track_id' id='track_id' value='<?= $track_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> track_id:  </b> </td>

            <td>
               <?= $track_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> new_writer_id:  </b> </td>

            <td>
               <input type='text' name='new_writer_id' id='new_writer_id' value='<?= $new_writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='email' id='email' ><?= $email; ?></textarea>
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