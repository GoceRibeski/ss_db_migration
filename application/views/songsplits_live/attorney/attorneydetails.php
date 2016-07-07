<?
$this->load->helper('url');
$action_url = site_url() . "/attorney/$action/";

?>

<h2>Enter attorney Details</h2>

<form name="attorneydetails" id="attorneydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='attorney_id' id='attorney_id' value='<?= $attorney_id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_id:  </b> </td>

            <td>
               <input type='text' name='attorney_id' id='attorney_id' value='<?= $attorney_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> attorney_name:  </b> </td>

            <td>
               <input type='text' name='attorney_name' id='attorney_name' value='<?= $attorney_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> company_name:  </b> </td>

            <td>
               <input type='text' name='company_name' id='company_name' value='<?= $company_name; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> notification:  </b> </td>

            <td>
               <input type='text' name='notification' id='notification' value='<?= $notification; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> password:  </b> </td>

            <td>
               <input type='text' name='password' id='password' value='<?= $password; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> language_id:  </b> </td>

            <td>
               <input type='text' name='language_id' id='language_id' value='<?= $language_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> phone:  </b> </td>

            <td>
               <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> fax:  </b> </td>

            <td>
               <input type='text' name='fax' id='fax' value='<?= $fax; ?>' />
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>