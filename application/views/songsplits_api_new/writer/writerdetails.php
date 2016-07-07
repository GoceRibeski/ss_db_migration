<?
$this->load->helper('url');
$action_url = site_url() . "/writer/$action/";

?>

<h2>Enter writer Details</h2>

<form name="writerdetails" id="writerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <input type='text' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_id:  </b> </td>

            <td>
               <input type='text' name='society_id' id='society_id' value='<?= $society_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cae_ipi:  </b> </td>

            <td>
               <input type='text' name='cae_ipi' id='cae_ipi' value='<?= $cae_ipi; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cae_ipi_2:  </b> </td>

            <td>
               <input type='text' name='cae_ipi_2' id='cae_ipi_2' value='<?= $cae_ipi_2; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> cae_ipi_3:  </b> </td>

            <td>
               <input type='text' name='cae_ipi_3' id='cae_ipi_3' value='<?= $cae_ipi_3; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> realtime_email:  </b> </td>

            <td>
               <input type='text' name='realtime_email' id='realtime_email' value='<?= $realtime_email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> weekly_email:  </b> </td>

            <td>
               <input type='text' name='weekly_email' id='weekly_email' value='<?= $weekly_email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> promo_email:  </b> </td>

            <td>
               <input type='text' name='promo_email' id='promo_email' value='<?= $promo_email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_control:  </b> </td>

            <td>
               <input type='text' name='manager_control' id='manager_control' value='<?= $manager_control; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_notify:  </b> </td>

            <td>
               <input type='text' name='manager_notify' id='manager_notify' value='<?= $manager_notify; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_view:  </b> </td>

            <td>
               <input type='text' name='manager_view' id='manager_view' value='<?= $manager_view; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_control:  </b> </td>

            <td>
               <input type='text' name='attorney_control' id='attorney_control' value='<?= $attorney_control; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_notify:  </b> </td>

            <td>
               <input type='text' name='attorney_notify' id='attorney_notify' value='<?= $attorney_notify; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_view:  </b> </td>

            <td>
               <input type='text' name='attorney_view' id='attorney_view' value='<?= $attorney_view; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_control:  </b> </td>

            <td>
               <input type='text' name='publisher_control' id='publisher_control' value='<?= $publisher_control; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_notify:  </b> </td>

            <td>
               <input type='text' name='publisher_notify' id='publisher_notify' value='<?= $publisher_notify; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_view:  </b> </td>

            <td>
               <input type='text' name='publisher_view' id='publisher_view' value='<?= $publisher_view; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>