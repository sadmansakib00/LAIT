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

        $query = "INSERT INTO initial_applicant(IndeedID, CandidateName, Education, Postcode, Email, DateInit)
                    VALUES ('$indeedid','$name','$education','$postcode', '$email', '$date')";

        if(mysqli_query($con, $query)) {
            //echo "Data inserted successfully.";
        } else {
            echo "<p>Error: \" . $query . \"<br>\" . mysqli_error($con)</p>";
            exit();
        }

        // Getting the candidateid for the recent input
        $candidateid = mysqli_insert_id($con); // Get the last auto-generated ID
        $applicant_query = "SELECT * FROM initial_applicant WHERE candidateid = '$candidateid'";
        $result = mysqli_query($con, $applicant_query);
        $data = mysqli_fetch_assoc($result); // Get the entire last inserted row
        $uuid = $data['UUID'];

        var_dump($name, $candidateid, $uuid);

        mysqli_close($con);
        header('Location: /lait_form/generate_url_initial_applicant.php?candidateid=' . $candidateid . '&uuid=' . $uuid . '&name=' . $name);
    }
} else {
    echo "Database connection error!";
}


?>
