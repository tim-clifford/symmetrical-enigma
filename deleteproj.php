<?php
    $date = date('d-m-Y');
    include('/societies/cuspaceflight/management_mysqlconnect.inc.php');
    include("auth_session.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $ID_delete = $_POST['ID_delete'];
        $rec_del = "DELETE FROM `management_projects`" ."WHERE ID='" . $ID_delete . "'";
        if (mysqli_query($conn, $rec_del)) {
            $result = "Successfully Deleted";
            header( "refresh:1;url=./projects.php" );
        }
        else {
            $result =  "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>
