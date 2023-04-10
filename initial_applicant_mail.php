<?php
    $applicant_id = $_GET['applicant_id'];
    $name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail body for initial applicants</title>
</head>
<body>
    <?php
        echo "$name";
    ?>

    Hi [Name],
    You have been pre-selected for this position. Could you visit the following website and complete it:
    https://ma.laitmail.co.uk/applicant/[indeed_id]

    Thank you,
    Name.
</body>
</html>