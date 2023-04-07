<?php

session_start();

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
        //$query1 = "INSERT INTO ApplicantInfo (indeedid, name, email, commission) VALUES ('$indeedid', '$name', '$email', '$commission')";

        if(mysqli_query($con, $query)) {
            echo "Data inserted successfully.";
        } else {
            echo "<p>Error: \" . $query . \"<br>\" . mysqli_error($con)</p>";
        }
    }
    mysqli_close($con);
} else {
    echo "Database connection error!";
}


?>
