<?php
    function applicant_validate($vars) {
        session_start();
        $_SESSION['CandidateID'] = $vars['id'];
        //echo "<h1>". $_SESSION['CandidateID'] . "</h1>";
        $CandidateID = $_SESSION['CandidateID'];
        // var_dump($vars['id']);
        $con = mysqli_connect("localhost", "root", "", "lait_hr");
        if($con) {
            $query = "SELECT COUNT(*) AS count FROM Applicant WHERE CandidateID = $CandidateID";
            $result = mysqli_query($con, $query);
            $row =  $result->fetch_assoc();
            //echo "<h1>" . $row["count"] . "</h1>";
            if($row["count"] > 0) {
                echo "<h1 style=\"text-align: center; font-size: 5em;\">You have already applied!!!</h1>";
                exit();
            }
        } else {
            echo "Connection error!";
        }
        include('applicant_form.php');
    }
?>
