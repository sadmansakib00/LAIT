<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Application Form</title>

    <link rel="stylesheet" href="styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4">Apply at LAIT</h1>

    <div class="container">
        <form action="applicant_submit_form.php" method="post">
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
                    <label for="skills">What you can do?</label>
                    <?php
                        $con = mysqli_connect("localhost", "root", "", "lait_hr");
                        if($con) {
                            $query = "SELECT skillid, skill FROM SkillsLookup";
                            $result = mysqli_query($con, $query);
                            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach($data as $row) {
                                echo "<div class=\"checkbox\">
                                  <label>
                                    <input type=\"checkbox\" name=\"skills[]\" value=" . $row["skillid"] . "> " . $row["skill"] . "
                                    </label>
                                </div>";
                            }
                        } else {
                            echo "Database connection error!";
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
                <div class="form-group col-sm-6">
                    <label for="ukpermit">Are you eligible to work as a freelancer / self-employed in the UK?</label>
                    <select class="form-select" name="ukpermit" id="ukpermit" aria-label="ukpermit select" required>
                        <option disabled selected value> -- Select an option -- </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Maybe">Maybe</option>
                    </select>
                    <input type="text" class="form-control col-sm-6" name="ukpermit_note" id="ukpermit_note_input" placeholder="Enter your note" style="display:block;">
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="commission">You will be paid a 5% to 20% commission for each sale made by you. Are you willing to do this commission-based job?</label>
                    <select class="form-select" name="commission" id="commission" aria-label="commission select" required>
                        <option disabled selected value> -- Select an option -- </option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Maybe">Maybe</option>
                    </select>
                    <input type="text" class="form-control col-sm-6" name="commission_note" id="commission_note_input" placeholder="Enter your note" style="display:block;">
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-sm-2 mt-3" name="submit">Submit</button>
            </div>

        </form>
    </div>


    <script>
        var otherCheckbox = document.getElementById("other-checkbox");
        var otherInput = document.getElementById("other-input");

        // var ukpermitSelect = document.getElementById("ukpermit");
        // var ukpermitNote = document.getElementById("ukpermit_note_input");
        //
        // var commissionSelect = document.getElementById("commission");
        // var commissionNote = document.getElementById("commission_note_input");

        otherCheckbox.addEventListener("change", function() {
            if (this.checked) {
                otherInput.style.display = "block";
            } else {
                otherInput.style.display = "none";
                otherInput.value = "";
            }
        });

        // ukpermitSelect.addEventListener("change", function() {
        //     if(ukpermitSelect.value == "Maybe") {
        //         ukpermitNote.style.display = "block";
        //     } else {
        //         ukpermitNote.style.display = "none";
        //         ukpermitNote.value = "";
        //     }
        // });
        //
        // commissionSelect.addEventListener("change", function() {
        //     if(commissionSelect.value == "Maybe") {
        //         commissionNote.style.display = "block";
        //     } else {
        //         commissionNote.style.display = "none";
        //         commissionNote.value = "";
        //     }
        // })

    </script>

</body>

</html>
