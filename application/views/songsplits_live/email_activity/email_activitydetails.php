<?
$this->load->helper('url');
$action_url = site_url() . "/email_activity/$action/";

?>

<h2>Enter email_activity Details</h2>

<form name="email_activitydetails" id="email_activitydetails" method="POST" action="<?= $action_url; ?>">
<input type='hidden' name='id' id='id' value='<?= $id; ?>' >
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	<tr valign='top' height='20'>

            <td align='right'> <b> id:  </b> </td>

            <td>
               <?= $id; ?>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sender_id:  </b> </td>

            <td>
               <input type='text' name='sender_id' id='sender_id' value='<?= $sender_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> song_id:  </b> </td>

            <td>
               <input type='text' name='song_id' id='song_id' value='<?= $song_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> songtitle:  </b> </td>

            <td>
               <input type='text' name='songtitle' id='songtitle' value='<?= $songtitle; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> event:  </b> </td>

            <td>
               <input type='text' name='event' id='event' value='<?= $event; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> email:  </b> </td>

            <td>
               <input type='text' name='email' id='email' value='<?= $email; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> date_created:  </b> </td>

            <td>
               <input type='text' name='date_created' id='date_created' value='<?= $date_created; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> ip:  </b> </td>

            <td>
               <input type='text' name='ip' id='ip' value='<?= $ip; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sg_message_id:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='sg_message_id' id='sg_message_id' ><?= $sg_message_id; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> timestamp:  </b> </td>

            <td>
               <input type='text' name='timestamp' id='timestamp' value='<?= $timestamp; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> smtp-id:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='smtp-id' id='smtp-id' ><?= $smtp-id; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> category:  </b> </td>

            <td>
               <input type='text' name='category' id='category' value='<?= $category; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> url:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='url' id='url' ><?= $url; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> asm_group_id:  </b> </td>

            <td>
               <input type='text' name='asm_group_id' id='asm_group_id' value='<?= $asm_group_id; ?>' />
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> useragent:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='useragent' id='useragent' ><?= $useragent; ?></textarea>
            </td>
         </tr>
	<tr valign='top' height='20'>

            <td align='right'> <b> sg_event_id:  </b> </td>

            <td>
               <textarea cols=35 rows=7 NAME='sg_event_id' id='sg_event_id' ><?= $sg_event_id; ?></textarea>
            </td>
         </tr>


</table>

<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">

</form>