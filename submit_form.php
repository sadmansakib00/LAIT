<?php
    session_start();

    //Connecting to database
    $con = mysqli_connect("localhost", "root", "", "JobApplicationLAIT");

    if (isset($_POST['submit'])) {
        //Indeed id given as global variable
        $indeedid = $_SESSION['IndeedID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $commission = $_POST['commission'];

        $query1 = "INSERT INTO ApplicantInfo (indeedid, name, email, commission) VALUES ('$indeedid', '$name', '$email', '$commission')";
        //$query2 = "INSERT INTO ApplicantSkills (indeedid, email, skill) VALUES ('$indeedid', '$email', '$skills')";
        $flag = -1;
        if (isset($_POST['skills'])) {
            $selectedSkills = $_POST['skills'];
            $check = $_POST['other_skill'];
            $flag = 1;
            if($check=="")
                $flag = 0;
            $i = 0;
            foreach ($selectedSkills as $skill) {
                $skills = $skill;
                //echo "<h1>" . $skills . "</h1>";
                $query2 = "INSERT INTO ApplicantSkills (indeedid, email, skill) VALUES ('$indeedid', '$email', '$skills')";
                if(!(++$i == count($selectedSkills) && $flag == 1)) {
                    mysqli_query($con, $query2);
                }
            }
        }
        if ($flag == 1) {
            $skills = $_POST['other_skill'];
            //echo "<h1>" . $skills . "</h1>";
            $query2 = "INSERT INTO ApplicantSkills (indeedid, email, skill) VALUES ('$indeedid', '$email', '$skills')";
            mysqli_query($con, $query2);
        }

        mysqli_query($con, $query1);
        // mysqli_query($con, $query2);

        mysqli_close($con);
        echo "<h1>Your application is received, thank you!</h1>";
        //Clearing the already set IndeedID from Session
        session_unset();
        session_destroy();
        header( "refresh:3; url=applicant_form.php" );
    }
?>
