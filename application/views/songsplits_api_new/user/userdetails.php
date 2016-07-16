<?php
$this->load->helper('url');
$action_url = site_url() . "/user/$action/";
?>

<h2>User Details</h2>
<div align="left">
    <form name="userdetails" id="userdetails" method="POST" action="<?= $action_url; ?>">
        <input type='hidden' name='user_id' id='user_id' value='<?= $user_id; ?>' >

        <table cellspacing="2" cellpadding="2" border="0" >

            <tr valign='top' height='20'>

                <td align='left'> legal_name:  <b> <?= $legal_name; ?></b> </td>
            </tr>

            <tr valign='top' height='20'>

                <td align='left'> main_user_type: <b>  <?= $main_user_type; ?></b> </td>

            </tr>




            <tr valign='top' height='20'>

                <td align='right'> <b> user_id:  </b> </td>

                <td>
                    <input type='text' name='user_id' id='user_id' value='<?= $user_id; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> group_id:  </b> </td>

                <td>
                    <input type='text' name='group_id' id='group_id' value='<?= $group_id; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> usr_verified:  </b> </td>

                <td>
                    <input type='text' name='usr_verified' id='usr_verified' value='<?= $usr_verified; ?>' />
                </td>
            </tr>


            <tr valign='top' height='20'>

                <td align='right'> <b> alias_1:  </b> </td>

                <td>
                    <input type='text' name='alias_1' id='alias_1' value='<?= $alias_1; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> alias_2:  </b> </td>

                <td>
                    <input type='text' name='alias_2' id='alias_2' value='<?= $alias_2; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> email_1:  </b> </td>

                <td>
                    <input type='text' name='email_1' id='email_1' value='<?= $email_1; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> email_2:  </b> </td>

                <td>
                    <input type='text' name='email_2' id='email_2' value='<?= $email_2; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> phone:  </b> </td>

                <td>
                    <input type='text' name='phone' id='phone' value='<?= $phone; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> img_id:  </b> </td>

                <td>
                    <input type='text' name='img_id' id='img_id' value='<?= $img_id; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> date_joined:  </b> </td>

                <td>
                    <input type='text' name='date_joined' id='date_joined' value='<?= $date_joined; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> last_login:  </b> </td>

                <td>
                    <input type='text' name='last_login' id='last_login' value='<?= $last_login; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> location_id:  </b> </td>

                <td>
                    <input type='text' name='location_id' id='location_id' value='<?= $location_id; ?>' />
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

                <td align='right'> <b> usr_pwdresettoken:  </b> </td>

                <td>
                    <input type='text' name='usr_pwdresettoken' id='usr_pwdresettoken' value='<?= $usr_pwdresettoken; ?>' />
                </td>
            </tr>
            <tr valign='top' height='20'>

                <td align='right'> <b> usr_verify_email_token:  </b> </td>

                <td>
                    <input type='text' name='usr_verify_email_token' id='usr_verify_email_token' value='<?= $usr_verify_email_token; ?>' />
                </td>
            </tr>


        </table>




</div>

<!--<input type="submit" name="Submit" value="Save">
<input type="reset" name="resetForm" value="Clear Form">-->

</form>


<?php
//              echo '<pre>';
//            print_r($work_list);
//            echo '<pre>';
////            die(__FILE__.__LINE__);
?>

<h2>Work Details</h2>  

<br />
<table class="tbl" border="0" cellpadding="2" cellspacing="1" width="100%">
    <thead>
        <tr>
            <th align="right" width="70"> </th>


            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Title
            </th>

            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Split
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Status_id
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Split_type
            </th>


            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Work_id
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Create_user_id
            </th>

            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Alt_title
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Work_type
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Status_id
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Current_version
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Date_created
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Date_confirmed
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Iswc
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Lyrics
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Sample_id
            </th>




            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Confirmed
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Created
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Writer_id
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Role
            </th>

            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Split_id
            </th>



            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Version
            </th>
            <th VALIGN='MIDDLE' ALIGN='CENTER'  class='tbl_headercell'>
                Work_id
            </th>








        </tr>
    </thead>
    <tbody  class="scrollingContent">

<?php
$i = 0;
  $modify_url = site_url('songsplits_api_new/work/modify/');
foreach ($work_list as $work) {
    $i++;
    if (($i % 2) == 0) {
        $bgColor = "#FFFFFF";
    } else {
        $bgColor = "#C0C0C0";
    }
    ?>
            <tr bgcolor="<?= $bgColor; ?>">
                <td align="center" nowrap="nowrap">
                    
                    
                    
                    <a href = "<?= $modify_url."/".$work["work_id"]; ?>" >List Publishers (<?= $work['count_work_publishers']; ?>)</a>
                    <!--            <a href = "< ?= $modify_url."/".$work["work_id"]; ?>" >Edit</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href = "< ?= $delete_url."/".$work["work_id"]; ?>" >Delete</a>-->
                </td>


                <td align="left" nowrap="nowrap"><?= $work['title']; ?></td>

                <td align="left" nowrap="nowrap"><?= $work['split']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['status_id']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['split_type']; ?></td>
                
                
                
                

                <td align="left" nowrap="nowrap"><?= $work['work_id']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['create_user_id']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['alt_title']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['work_type']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['status_id']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['current_version']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['date_created']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['date_confirmed']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['iswc']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['lyrics']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['sample_id']; ?></td>





                <td align="left" nowrap="nowrap"><?= $work['confirmed']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['created']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['writer_id']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['role']; ?></td>

                <td align="left" nowrap="nowrap"><?= $work['split_id']; ?></td>


                <td align="left" nowrap="nowrap"><?= $work['version']; ?></td>
                <td align="left" nowrap="nowrap"><?= $work['work_id']; ?></td>



        </tr>
        <? } ?>
    </tbody>
</table>
<br />