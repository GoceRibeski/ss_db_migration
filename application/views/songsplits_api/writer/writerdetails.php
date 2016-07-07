<?
$this->load->helper('url');
$action_url = site_url() . "/writer/$action/";

?>

<h2>Enter writer Details</h2>

<form name="writerdetails" id="writerdetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='writer_id' id='writer_id' value='<?= $writer_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_control:  </b> </td>

            <td>
               <select name='attorney_control' id='attorney_control' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_notify:  </b> </td>

            <td>
               <select name='attorney_notify' id='attorney_notify' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_view:  </b> </td>

            <td>
               <select name='attorney_view' id='attorney_view' ><option value='on'>on</option><option value='off'>off</option></select>
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

            <td align='right'> <b> manager_control:  </b> </td>

            <td>
               <select name='manager_control' id='manager_control' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_notify:  </b> </td>

            <td>
               <select name='manager_notify' id='manager_notify' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> manager_view:  </b> </td>

            <td>
               <select name='manager_view' id='manager_view' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> promo_email:  </b> </td>

            <td>
               <select name='promo_email' id='promo_email' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_control:  </b> </td>

            <td>
               <select name='publisher_control' id='publisher_control' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_notify:  </b> </td>

            <td>
               <select name='publisher_notify' id='publisher_notify' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> publisher_view:  </b> </td>

            <td>
               <select name='publisher_view' id='publisher_view' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> realtime_email:  </b> </td>

            <td>
               <select name='realtime_email' id='realtime_email' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> society_id:  </b> </td>

            <td>
               <input type='text' name='society_id' id='society_id' value='<?= $society_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> user_id:  </b> </td>

            <td>
               <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> weekly_email:  </b> </td>

            <td>
               <select name='weekly_email' id='weekly_email' ><option value='on'>on</option><option value='off'>off</option></select>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> writer_id:  </b> </td>

            <td>
               <?= $writer_id; ?>
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>