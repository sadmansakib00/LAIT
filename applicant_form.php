<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Application Form</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center">Apply at LAIT</h1>

        <div class="container">
            <form action="submit_form.php" method="post">
              <div class="row justify-content-center">
                  <div class="form-group col-sm-6">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control col-sm-6" id="name" placeholder="Enter your name">
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="form-group col-sm-6">
                      <label for="email">Email address:</label>
                      <input type="email" class="form-control col-sm-6" id="email" placeholder="Enter your email">
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="form-group col-sm-6">
                    <label for="skills">Skills:</label>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="skills[]" value="HTML"> HTML
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="skills[]" value="CSS"> CSS
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
                      </label>
                    </div>
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
