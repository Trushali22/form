<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Login</h2>
        <form id="login-form" method="post">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
            <div id="login-message" class="mt-3"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                
                // Show loading message
                $('#login-message').html('<span>Logging in...</span>');

                $.ajax({
                    type: 'POST',
                    url: 'login_process.php',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        var res = JSON.parse(response); // Parse the JSON response
                        if (res.redirect) {
                            window.location.href = res.redirect; // Redirect to the dashboard
                        } else {
                            $('#login-message').html(res.message); // Display error message
                        }
                    },
                    error: function() {
                        $('#login-message').html('<span class="text-danger">An error occurred. Please try again.</span>');
                    }
                });
            });
        });
    </script>
</body>
</html>
