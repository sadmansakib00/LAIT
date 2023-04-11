<?php
    $candidateid = $_GET['candidateid'];
    $uuid = $_GET['uuid'];
    $name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail body for initial applicants</title>
</head>
<body>
    <p>Hi <?php echo $name ?>, </p>
    <p>
    You have been pre-selected for this position. Could you visit the following website and complete the form:
    <a href="applicant_form/<?php echo $uuid ?>" target="_blank">Apply</a>
    </p>

    <p>Thank you,</p>
    <p>LAIT Admin.</p>
</body>
</html>