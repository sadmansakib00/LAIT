<?php

session_start();

//var_dump("In initial_applicant_submit_form.php");

$con = mysqli_connect("localhost", "root", "", "lait_hr");

if($con) {
    if(isset($_POST["submit"])) {
        $indeedid = $_POST['IndeedID'];
        $name = $_POST['name'];
        $education = $_POST['education'];
        $postcode = $_POST['postcode'];
        $email = $_POST['email'];
        $date = $_POST['date'];

        $query = "INSERT INTO InitialApplicant(IndeedID, CandidateName, Education, Postcode, Email, DateInit)
                    VALUES ('$indeedid','$name','$education','$postcode', '$email', '$date')";
       
        if(mysqli_query($con, $query)) {
            //echo "Data inserted successfully.";
        } else {
            echo "<p>Error: \" . $query . \"<br>\" . mysqli_error($con)</p>";
        }

        var_dump("yo");
        $$applicant_id_query = "SELECT ApplicantID FROM Applicant WHERE CandidateID = '$candidateid'";
        $result = mysqli_query($con, $applicant_id_query);
        $applicant_id = $data['ApplicantID'];

        mysqli_close($con);
        header('Location: /lait_form/initial_applicant_mail.php?applicant_id=' . $applicant_id . '&name=' . $name);
    }
} else {
    echo "Database connection error!";
}


?>
