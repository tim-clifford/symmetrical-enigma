<?php
include('/societies/cuspaceflight/management_mysqlconnect.inc.php');
include("auth_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $update_select = mysqli_real_escape_string($conn, mysqli_real_escape_string($conn, $_POST['save_ID']);

    $date_proj_rupd = mysqli_real_escape_string($conn, $_POST['date_r_update']);
    $name_rupd = mysqli_real_escape_string($conn, $_POST['Name_r_update']);
    $ids_rupd = mysqli_real_escape_string($conn, $_POST['_ID_r_update']);
    $relap_rupd = mysqli_real_escape_string($conn, $_POST['rela_project_update']);
    $user_rupd = mysqli_real_escape_string($conn, $_POST['Personnel_1_update']);

    $essential1_rupd = mysqli_real_escape_string($conn, $_POST['essential1_update']);
    $essential2_rupd = mysqli_real_escape_string($conn, $_POST['essential2_update']);
    $essential3_rupd = mysqli_real_escape_string($conn, $_POST['essential3_update']);

    $desirable1_rupd = mysqli_real_escape_string($conn, $_POST['desirable1_update']);
    $desirable2_rupd = mysqli_real_escape_string($conn, $_POST['desirable2_update']);
    $desirable3_rupd = mysqli_real_escape_string($conn, $_POST['desirable3_update']);

    $preferable1_rupd = mysqli_real_escape_string($conn, $_POST['preferable1_update']);
    $preferable2_rupd = mysqli_real_escape_string($conn, $_POST['preferable2_update']);
    $preferable3_rupd = mysqli_real_escape_string($conn, $_POST['preferable3_update']);

    $sysi1_rupd = mysqli_real_escape_string($conn, $_POST['sysi1_update']);
    $sysi2_rupd = mysqli_real_escape_string($conn, $_POST['sysi2_update']);
    $sysi3_rupd = mysqli_real_escape_string($conn, $_POST['sysi3_update']);

    $perfval1_rupd = mysqli_real_escape_string($conn, $_POST['perfval1_update']);
    $perfval2_rupd = mysqli_real_escape_string($conn, $_POST['perfval2_update']);
    $perfval3_rupd = mysqli_real_escape_string($conn, $_POST['perfval3_update']);

    $intpro1_rupd = mysqli_real_escape_string($conn, $_POST['intpro1_update']);
    $intpro2_rupd = mysqli_real_escape_string($conn, $_POST['intpro2_update']);
    $intpro3_rupd = mysqli_real_escape_string($conn, $_POST['intpro3_update']);

    $failerror1_rupd = mysqli_real_escape_string($conn, $_POST['failerrorhandle1_update']);
    $failerror2_rupd = mysqli_real_escape_string($conn, $_POST['failerrorhandle2_update']);
    $failerror3_rupd = mysqli_real_escape_string($conn, $_POST['failerrorhandle3_update']);

    $designdocu1_rupd = mysqli_real_escape_string($conn, $_POST['designdocu1_update']);
    $designdocu2_rupd = mysqli_real_escape_string($conn, $_POST['designdocu2_update']);
    $designdocu3_rupd = mysqli_real_escape_string($conn, $_POST['designdocu3_update']);

    $funcdocu1_rupd = mysqli_real_escape_string($conn, $_POST['funcdocu1_update']);
    $funcdocu2_rupd = mysqli_real_escape_string($conn, $_POST['funcdocu2_update']);
    $funcdocu3_rupd = mysqli_real_escape_string($conn, $_POST['funcdocu3_update']);

    $opspro1_rupd = mysqli_real_escape_string($conn, $_POST['opspro1_update'];
    $opspro2_rupd = mysqli_real_escape_string($conn, $_POST['opspro2_update'];
    $opspro3_rupd = mysqli_real_escape_string($conn, $_POST['opspro3_update'];

    $last_user_upds = mysqli_real_escape_string($conn, $_POST['last_user_upd']);
    $last_changed_upds = mysqli_real_escape_string($conn, $_POST['last_time_upd']);
    $change_comments_upds = mysqli_real_escape_string($conn, $_POST['change_comments_upd']);

    $sql_update = "UPDATE management_requirements SET dateval='$date_proj_rupd', Namedesc='$name_rupd', sys_id='$ids_rupd', Related_project='$relap_rupd', personName='$user_rupd', desirable_1='$desirable1_rupd', desirable_2='$desirable2_rupd', desirable_3='$desirable3_rupd',
        essential_1='$essential1_rupd', essential_2='$essential2_rupd', essential_3='$essential3_rupd', preferable_1='$preferable1_rupd', preferable_2='$preferable2_rupd', preferable_3='$preferable3_rupd',
        sysint_1='$sysi1_rupd', sysint_2='$sysi2_rupd', sysint_3='$sysi3_rupd', perfvals_1='$perfval1_rupd', perfvals_2='$perfval2_rupd', perfvals_3='$perfval3_rupd',
        intproc_1='$intpro1_rupd', intproc_2='$intpro2_rupd', intproc_3='$intpro3_rupd', failmodes_1='$failerror1_rupd', failmodes_2='$failerror2_rupd', failmodes_3='$failerror3_rupd',
        designdocu_1='$designdocu1_rupd', designdocu_2='$designdocu2_rupd', designdocu_3='$designdocu3_rupd', funcdocu_1='$funcdocu1_rupd', funcdocu_2='$funcdocu2_rupd',
        funcdocu_3='$funcdocu3_rupd', opsproc_1='$opspro1_rupd', opsproc_2='$opspro2_rupd', opsproc_3='$opspro3_rupd', last_editor='$last_user_upds', last_edited='$last_changed_upds', change_comments='$change_comments_upds'
         " . " WHERE ID='" . $update_select . "'";
    //Now look who is good at SQL, TC? - BW
    if (mysqli_query($conn, $sql_update)) {
        $result = "Record Updated";
        header( "refresh:2;url=./index.php" );
    }
    else {
        $result =  "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
</html>
