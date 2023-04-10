<?php
    function applicant_validate($vars) {
        session_start();
        $UUID = $vars['id'];
        // var_dump($vars['id']);
        $con = mysqli_connect("localhost", "root", "", "lait_hr");
        if($con) {
            //Get CandidateID from initial_applicant
            $query = "SELECT CandidateID FROM InitialApplicant WHERE UUID = '$UUID'";
            $result = mysqli_query($con, $query);

            //Check if the given UUID is valid
            if (!$result) {
                die('Invalid query: ' . mysqli_error($conn));
            }
            if (mysqli_num_rows($result) == 0) {
                echo 'Invalid ID in the URL!';
                exit();
            }

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
        //header('Location: /lait_form/applicant_form.php');
    }

    // function applicant_submit() {
    //     var_dump("in applicant_submit function");
    //     header('Location: /lait_form/applicant_submit_form.php');
    // }

    function initial_applicant() {
        session_start();
        //header('Location: /lait_form/initial_applicant.php');
        include("initial_applicant.php");
    }

    function invalid_address() {
        header('HTTP/1.0 404 Not Found');
        echo '404 Not Found';
        exit();
    }
?>
