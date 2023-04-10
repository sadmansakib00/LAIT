<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Initial Applicants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4">Initial Applicants</h1>

    <div class="container">
        <form action="initial_applicant_submit_form.php" method="post">

            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="IndeedID">Indeed ID:</label>
                    <input type="text" name="IndeedID" class="form-control col-sm-6" id="IndeedID" placeholder="Enter your Indeed ID" required>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="name">Candidate name:</label>
                    <input type="text" name="name" class="form-control col-sm-6" id="name" placeholder="Enter your name" required>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="education">What is the highest level of education you have completed?</label>
                    <input type="text" name="education" class="form-control col-sm-6" id="education" placeholder="Enter your education level" required>
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
                    <label for="postcode">Enter your postcode:</label>
                    <input type="text" name="postcode" class="form-control col-sm-6" id="postcode" placeholder="Enter your postcode">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-sm-6">
                    <label for="date">Application date (YYYY-MM-DD):</label>
                    <input type="date" name="date" class="form-control col-sm-6" id="date" placeholder="Enter the date">
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary col-sm-2 mt-3" name="submit">Submit</button>
            </div>

        </form>
    </div>

</body>

</html>
