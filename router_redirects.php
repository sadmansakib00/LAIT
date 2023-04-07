<?php
    function applicant_validate($vars) {
        session_start();
        //echo "<h1>". $_SESSION['CandidateID'] . "</h1>";
        $UUID = $vars['id'];
        // var_dump($vars['id']);
        $con = mysqli_connect("localhost", "root", "", "lait_hr");
        if($con) {
            //Get CandidateID from InitialApplicant
            $query = "SELECT CandidateID FROM InitialApplicant WHERE UUID = '$UUID'";
            $result = mysqli_query($con, $query);
            $row =  $result->fetch_assoc();
            $CandidateID = $row["CandidateID"];
            $_SESSION['CandidateID'] = $CandidateID;
            //Get applicantion count from Applicant table
            $query = "SELECT COUNT(*) AS count FROM Applicant WHERE CandidateID = $CandidateID";
            $result = mysqli_query($con, $query);
            $row = $result->fetch_assoc();
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

    function initial_applicant() {
        session_start();
        //header('Location: /LAIT Form/InitialApplicant.php');
        include("InitialApplicant.php");
    }

    function invalid_address() {
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        exit();
    }
?>
