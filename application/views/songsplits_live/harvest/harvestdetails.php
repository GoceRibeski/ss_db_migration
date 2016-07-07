<?
$this->load->helper('url');
$action_url = site_url() . "/harvest/$action/";

?>

<h2>Enter harvest Details</h2>

<form name="harvestdetails" id="harvestdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <?= $id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> first_name:  </b> </td>

            <td>
               <input type='text' name='first_name' id='first_name' value='<?= $first_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> last_name:  </b> </td>

            <td>
               <input type='text' name='last_name' id='last_name' value='<?= $last_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='email' id='email' ><?= $email; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society:  </b> </td>

            <td>
               <input type='text' name='society' id='society' value='<?= $society; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> code:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='code' id='code' ><?= $code; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status:  </b> </td>

            <td>
               <input type='text' name='status' id='status' value='<?= $status; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> created_datatime:  </b> </td>

            <td>
               <input type='text' name='created_datatime' id='created_datatime' value='<?= $created_datatime; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>