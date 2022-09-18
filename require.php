<?php
$date = date('d-m-Y');
$servername = "localhost";
$database = "cusf_test";
$username = "root";
// Create connection
$conn1 = mysqli_connect($servername, $username, "", $database);
// Check connection
if (!$conn1) {
      die("Connection failed: " . mysqli_connect_error());
}
 
$connection = "Connected successfully";
$sent = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $date_proj_r = $_POST['date_r'];
    $name_r = $_POST['Name_r'];
    $ids_r = $_POST['_ID_r'];

    $essential1_r = $_POST['essential1'];
    $essential2_r = $_POST['essential2'];
    $essential3_r = $_POST['essential3'];

    $desirable1_r = $_POST['desirable1'];
    $desirable2_r = $_POST['desirable2'];
    $desirable3_r = $_POST['desirable3'];

    $preferable1_r = $_POST['preferable1'];
    $preferable2_r = $_POST['preferable2'];
    $preferable3_r = $_POST['preferable3'];

    $sysi1_r = $_POST['sysi1'];
    $sysi2_r = $_POST['sysi2'];
    $sysi3_r = $_POST['sysi3']; 
    
    $perfval1_r = $_POST['perfval1'];
    $perfval2_r = $_POST['perfval2'];
    $perfval3_r = $_POST['perfval3']; 

    $intpro1_r = $_POST['intpro1'];
    $intpro2_r = $_POST['intpro2'];
    $intpro3_r = $_POST['intpro3'];

    $failerror1_r = $_POST['failerrorhandle1'];
    $failerror2_r = $_POST['failerrorhandle2'];
    $failerror3_r = $_POST['failerrorhandle3'];

    $designdocu1_r = $_POST['designdocu1'];
    $designdocu2_r = $_POST['designdocu2'];
    $designdocu3_r = $_POST['designdocu3'];

    $funcdocu1_r = $_POST['funcdocu1'];
    $funcdocu2_r = $_POST['funcdocu2'];
    $funcdocu3_r = $_POST['funcdocu3']; 

    $opspro1_r = $_POST['opspro1'];
    $opspro2_r = $_POST['opspro2'];
    $opspro3_r = $_POST['opspro3'];

    //Now look who is good at SQL, TC? - BW
    $sql_r = "INSERT INTO requirements (dateval, Namedesc , sys_id, desirable_1, desirable_2, desirable_3, essential_1, essential_2, essential_3, preferable_1,
    preferable_2, preferable_3, sysint_1, sysint_2, sysint_3, perfvals_1, perfvals_2, perfvals_3, intproc_1, intproc_2, intproc_3, failmodes_1, 
    failmodes_2, failmodes_3, designdocu_1, designdocu_2, designdocu_3, funcdocu_1, funcdocu_2, funcdocu_3, opsproc_1, opsproc_2, opsproc_3) 
   VALUES ('$date_proj_r', '$name_r', '$ids_r', '$essential1_r', '$essential2_r', '$essential3_r', '$desirable1_r', '$desirable2_r', '$desirable3_r', '$preferable1_r', 
      '$preferable2_r', '$preferable3_r', '$sysi1_r', '$sysi2_r','$sysi3_r','$perfval1_r', '$perfval2_r', '$perfval3_r', '$intpro1_r', '$intpro2_r', '$intpro3_r',
     '$failerror1_r', '$failerror2_r', '$failerror3_r', '$designdocu1_r', '$designdocu2_r', '$designdocu3_r', '$funcdocu1_r', '$funcdocu2_r', '$funcdocu3_r', 
     '$opspro1_r', '$opspro2_r', '$opspro3_r')";
    if (mysqli_query($conn1, $sql_r)) {
        $result = "New record created successfully";
        header( "refresh:1;url=./projects.php" );
    }
    else {
        $result =  "Error: " . $sql . "<br>" . mysqli_error($conn2);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet.css">
    <title>Document</title>
    
    <style>

    </style>
</head>


<body>
    <nav class="topnav">
        <ul class="navbar">
            <li><a  href="./landing.php">Expenses</a></li>
            <li><a class="active" href="./projects.php">Project Tracker</a></li>
          </ul>
    </nav>

    <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
            <div class="new_expense">
                <h4>Projects</h4>
            </div>

            <div class="sidebaritems">
            <table cellpadding=3 width="580" class="sidebartable">
                <tr>
                </tr>
            <?php
            $rec_sql = "SELECT name_sys, system_id, progress, dateval FROM `projects`";
            $res=mysqli_query($conn1, $rec_sql);
            while ($row=mysqli_fetch_array($res)) {
                echo "<tr>\n";
                echo "\t<td>".$row["dateval"]."</td>\n";
                echo "\t<td>".$row["name_sys"]."</td>\n";
                echo "\t<td>".$row["system_id"]."</td>\n";
                echo "\t<td>".$row["progress"]."</td>\n";
                echo "</tr>\n";
            }
            ?>
            </table>
            </div>

            <div class="new_expense">
                <h4>Requirements</h4>
            </div>

            <div class="sidebaritems">
            <table cellpadding=3 width="580" class="sidebartable">
                <tr>
                </tr>
            <?php
            $rec_sql2 = "SELECT Namedesc, sys_id, dateval FROM `requirements`";
            $res=mysqli_query($conn1, $rec_sql2);
            while ($row=mysqli_fetch_array($res)) {
                echo "<tr>\n";
                echo "\t<td>".$row["dateval"]."</td>\n";
                echo "\t<td>".$row["Namedesc"]."</td>\n";
                echo "\t<td>".$row["sys_id"]."</td>\n";
                echo "</tr>\n";
            }

            mysqli_close($conn1);
            ?>
            </table>
            </div>

        </div>

    </div>

    <div class="welcome_text">
        <h3>CUSF Expenses and Project Management</h3>
        <p><em>Add a New Requirement</em></p>
    </div>

    <div class="cancel">
        <a href="./projects.php"><h4 id="cancel">Cancel</h4></a>
    </div>

    
    <div class="createexpform">
        <form class="createexpform" method="POST" id="projectform">
            <p class="createexpform">
            <label for="q1">Date</label>
            <input type="text" id="q1" name="date_r" value="<?php echo $date?>">
            </p>

            <p class="createexpform">
            <span><label for="q2">Requirement Name</label></span>
            <input type="text" id="q2" name="Name_r">
            </p>

            <p class="createexpform">
            <span><label for="q3">ID</label></span>
            <input type="text" id="q3" name="_ID_r">
            </p>

            <p class="requiretitle">
            Functional Requirements
            </p>

            <p  class="createexpform4">
            <label for="q11">Desirable</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="essential1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="essential2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="essential3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4">
            <label for="q11">Essential</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="desirable1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="desirable2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="desirable3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4" id="bottomfour">
            <label for="q11">Preferable</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="preferable1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="preferable2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="preferable3" rows="1" cols="100"></textarea>
            </p>

            <p class="requiretitle">
            Integration Requirements
            </p>

            <p  class="createexpform4">
            <label for="q11">System Interfaces</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="sysi1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="sysi2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="sysi3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4">
            <label for="q11">Performance Validations</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="perfval1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="perfval2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="perfval3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4">
            <label for="q11">Integration Processes</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="intpro1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="intpro2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="intpro3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4" id="bottomfour">
            <label for="q11">Failure Modes and Error Handling</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="failerrorhandle1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="failerrorhandle2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="failerrorhandle3" rows="1" cols="100"></textarea>
            </p>

            <p class="requiretitle">
            Reporting Requirements
            </p>

            <p  class="createexpform4">
            <label for="q11">Design Documentation</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="designdocu1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="designdocu2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="designdocu3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4">
            <label for="q11">Functionality Documentation</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="funcdocu1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="funcdocu2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="funcdocu3" rows="1" cols="100"></textarea>
            </p>

            <p  class="createexpform4" id="bottomfour">
            <label for="q11">Operations Procedures</label>
            <br>
            1. <textarea style="resize: none;" id="q11" name="opspro1" rows="1" cols="100"></textarea>
            <br>
            2. <textarea style="resize: none;" name="opspro2" rows="1" cols="100"></textarea>
            <br>
            3. <textarea style="resize: none;" name="opspro3" rows="1" cols="100"></textarea>
            </p>

            <p class="createexpform">
            <input type="submit" value="Submit">
            <input type="reset">
            </p>
        </form>
    </div>

</body>

<footer class="footer">
    <p><em>The original CUSF expenses system was written in 2009 by Henry Hallam and was updated by Tim Clifford in 2021.</em></p>
    <p>It was then rebuilt in 2022 to include management by Barty Wardell. You can email him <a id="email" href = "mailto: barty.wardell@gmail.com">here</a>.</p>
</footer>

</html>