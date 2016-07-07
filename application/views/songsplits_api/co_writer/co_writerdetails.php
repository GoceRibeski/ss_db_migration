<?
$this->load->helper('url');
$action_url = site_url() . "/co_writer/$action/";

?>

<h2>Enter co_writer Details</h2>

<form name="co_writerdetails" id="co_writerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> co_writer_id:  </b> </td>

            <td>
               <input type='text' name='co_writer_id' id='co_writer_id' value='<?= $co_writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <input type='text' name='id' id='id' value='<?= $id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>