<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAGE Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form id="registrationForm">
            <div class="input-group">
                <label for="Fname">First Name</label>
                <input type="text" id="Fname" name="Fname">
                <span id="FnameError" class="error"></span>
            </div>

            <div class="input-group">
                <label for="Lname">Last Name</label>
                <input type="text" id="Lname" name="Lname">
                <span id="LnameError" class="error"></span>
            </div>
            
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span id="emailError" class="error"></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="passwordError" class="error"></span>
            </div>

            <button type="button" id="submitBtn">Submit</button>
            <div id="result"></div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                $.ajax({
                    url: 'validate.php',
                    type: 'POST',
                    data: $('#registrationForm').serialize(),
                    success: function(response) {
                        const data = JSON.parse(response);
                        
                        $('#FnameError').text(data.FnameError);
                        $('#LnameError').text(data.LnameError);
                        $('#emailError').text(data.emailError);
                        $('#passwordError').text(data.passwordError);

                        if (data.success) {
                            $('#result').html('<span class="success">Form submitted successfully!</span>');
                        } else {
                            $('#result').html('<span class="error">Please fix the errors and try again.</span>');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
