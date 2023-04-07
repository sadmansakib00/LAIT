<?php
    session_start();

    //Connecting to database
    $con = mysqli_connect("localhost", "root", "", "lait_hr");
    $var_dump("here I am");
    if($con) {
        if (isset($_POST['submit'])) {
            //Indeed id given as global variable
            $candidateid = $_SESSION['CandidateID'];
            $var_dump($candidateid);
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $commission = mysqli_real_escape_string($con, $_POST['commission']);
            $ukpermit = mysqli_real_escape_string($con, $_POST['ukpermit']);
            $ukpermit_note = mysqli_real_escape_string($con, $_POST['ukpermit_note']);
            $commission_note = mysqli_real_escape_string($con, $_POST['commission_note']);
            $skillnote = mysqli_real_escape_string($con, $_POST['other_skill']);

            $query1 = "INSERT INTO Applicant (CandidateID, ApplicantName, Email, UKPermit, UKPermitNote, CommissionWork, CommissionWorkNote, SkillNote)
                        VALUES ('$candidateid', '$name', '$email', '$ukpermit', '$ukpermit_note', '$commission', '$commission_note', '$skillnote')";

            if(mysqli_query($con, $query1)) {
                echo "Data inserted successfully.";
            } else {
                echo "<p>Error: " . $query1 . "<br>" . mysqli_error($con) . "</p>";
            }

            $applicant_id_query = "SELECT ApplicantID FROM Applicant WHERE CandidateID = '$candidateid'";
            $result = mysqli_query($con, $applicant_id_query);
            $applicant_id;
            if($result && mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $applicant_id = $data['ApplicantID'];

                $flag = -1;
                if (isset($_POST['skills'])) {
                    $selectedSkills = $_POST['skills'];
                    $check = $_POST['other_skill'];
                    $flag = 1;
                    if($check=="")
                        $flag = 0;
                    $i = 0;
                    foreach ($selectedSkills as $skillid) {
                        $query2 = "INSERT INTO ApplicantSkill (ApplicantID, SkillID) VALUES ('$applicant_id', '$skillid')";
                        if(!(++$i == count($selectedSkills) && $flag == 1)) {
                            mysqli_query($con, $query2);
                        }
                    }
                }
            } else {
                echo "Error: Unable to retrieve ApplicantID";
            }

            mysqli_close($con);

            echo "<h1>Your application is received, thank you!</h1>";

            //Clearing the already set CandidateID from Session
            session_unset();
            session_destroy();

            //header( "refresh:3; url=.php?ApplicantID=$applicant_id" );
        }
    } else {
        echo "Database connection error!";
    }
?>
