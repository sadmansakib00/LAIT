<?php
    session_start();
    if(isset($_GET['IndeedID'])) {
        $_SESSION['IndeedID'] = $_GET['IndeedID'];
        //echo "<h1>". $_SESSION['IndeedID'] . "</h1>";
        $IndeedID = $_SESSION['IndeedID'];
        $con = mysqli_connect("localhost", "root", "", "JobApplicationLAIT");
        if($con) {
            $query = "SELECT COUNT(*) AS count FROM ApplicantSkills WHERE IndeedID = $IndeedID";
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
    } else {
        echo "<h1 style=\"text-align: center; font-size: 5em;\">No session ID set!</h1>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Application Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4">Apply at LAIT</h1>

    <div class="container">
        <form action="submit_form.php" method="post">
            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control col-sm-6" id="name" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control col-sm-6" id="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="commission">Work for commission:</label>
                    <select class="form-select" name="commission" aria-label="skill select" required>
                        <option disabled selected value> -- Select an option -- </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Maybe">Maybe</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="skills">Skills:</label>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "JobApplicationLAIT");
                        if($con) {
                            $query = "SELECT skillname FROM skills";
                            $result = mysqli_query($con, $query);
                            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach($data as $row) {
                                echo "<div class=\"checkbox\">
                                  <label>
                                    <input type=\"checkbox\" name=\"skills[]\" value=" . $row["skillname"] . "> " . $row["skillname"] . "
                                    </label>
                                </div>";
                            }
                        }
                    ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="skills[]" value="Other" id="other-checkbox"> Other:
                        </label>
                        <input type="text" class="form-control col-sm-6" name="other_skill" id="other-input" placeholder="Enter other skill" style="display:none;">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-sm-2 mt-3" name="submit">Submit</button>
            </div>

        </form>
    </div>


    <script>
        var otherCheckbox = document.getElementById('other-checkbox');
        var otherInput = document.getElementById('other-input');

        otherCheckbox.addEventListener('change', function() {
            if (this.checked) {
                otherInput.style.display = 'block';
            } else {
                otherInput.style.display = 'none';
            }
        });
    </script>

</body>

</html>
