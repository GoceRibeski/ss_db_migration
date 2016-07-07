<?
$this->load->helper('url');
$action_url = site_url() . "/work/$action/";

?>

<h2>Enter work Details</h2>

<form name="workdetails" id="workdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='work_id' id='work_id' value='<?= $work_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> alt_title:  </b> </td>

            <td>
               <input type='text' name='alt_title' id='alt_title' value='<?= $alt_title; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> create_user_id:  </b> </td>

            <td>
               <input type='text' name='create_user_id' id='create_user_id' value='<?= $create_user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> current_version:  </b> </td>

            <td>
               <input type='text' name='current_version' id='current_version' value='<?= $current_version; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_confirmed:  </b> </td>

            <td>
               <input type='text' name='date_confirmed' id='date_confirmed' value='<?= $date_confirmed; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> iswc:  </b> </td>

            <td>
               <input type='text' name='iswc' id='iswc' value='<?= $iswc; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> lyrics:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='lyrics' id='lyrics' ><?= $lyrics; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sample_id:  </b> </td>

            <td>
               <input type='text' name='sample_id' id='sample_id' value='<?= $sample_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> status_id:  </b> </td>

            <td>
               <select name='status_id' id='status_id' ><option value='1'>1</option><option value='2'>2</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> title:  </b> </td>

            <td>
               <input type='text' name='title' id='title' value='<?= $title; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> work_id:  </b> </td>

            <td>
               <?= $work_id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> work_type:  </b> </td>

            <td>
               <select name='work_type' id='work_type' ><option value='song'>song</option><option value='cue'>cue</option><option value='track'>track</option></select>
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>