<?php
        include("config.php");
        session_start();
        $loginMessage = "";
        if (isset($_POST['login_submit'])) {
            $phnumber = $_POST['phnumber'];  
            $password = $_POST['password']; 


            $sql = "select * from account_info where phnumber = '$phnumber' and Password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_assoc($result); 
            $count = mysqli_num_rows($result);  

            if($count == 1){  
                $loginMessage = "Login successful. Welcome, " . $row['firstName']; 
                $_SESSION['phnumber'] = $row['phnumber']; 
                header("location: home.php");   
                exit(); 
            }  
            else{  
                $loginMessage = "Login failed. Invalid username or password.";
            }
        }

        if (isset($_POST['register_submit'])) 
        {
            // Retrieve form data
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $phnumber = $_POST['phnumber'];
            $email = $_POST['email'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            // Perform additional validation if needed

            // Check if an account with the same phone number already exists
            $checkIfExistsQuery = "SELECT * FROM account_info WHERE phnumber = '$phnumber'";
            $result = mysqli_query($con, $checkIfExistsQuery);

            if (mysqli_num_rows($result) > 0) {
                // An account with the same phone number already exists
                $loginMessage = "Registration failed. An account with the provided phone number already exists.";
            } else {
                // No account with the same phone number exists, proceed with registration

                // Assuming you have a registration table named 'account_info'
                $sqlAccountInfo = "INSERT INTO account_info (firstName, lastName, phnumber, email, password) VALUES ('$firstName', '$lastName', '$phnumber', '$email', '$newPassword')";

                if (mysqli_query($con, $sqlAccountInfo)) {
                    // Registration successful for account_info

                    // Now, insert data into 'profile_info'
                    $sqlProfileInfo = "INSERT INTO profile_info (firstName, lastName, phnumber, email) VALUES ('$firstName', '$lastName', '$phnumber', '$email')";

                    if (mysqli_query($con, $sqlProfileInfo)) {
                        // Profile info added successfully
                        $loginMessage = "Registration successful. Please login, $firstName!";
                        // You can redirect to a login page or do additional actions here
                    } else {
                        // Failed to add profile info
                        $loginMessage = "Registration failed. Error: " . mysqli_error($con);
                    }
                } else {
                    // Failed to add account_info
                    $loginMessage = "Registration failed. Error: " . mysqli_error($con);
                }
            }
        }
            ?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Online Finances</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/login.css">
    <script src="javascript/login.js"></script>
</head>

<body>
    <div class="header">
        <h1> <i class="fas fa-mountain"></i> <span> Rock <br> Finances </span> </h1>
    </div>
    <div class="outer-container">

        <div class="form-container">

            <div class="form-head">
                <h2 id="loginTab" class="active" onclick="toggleForm('loginForm')"> Login </h2>
                <h2 id="signupTab" onclick="toggleForm('signupForm')"> Sign Up </h2>
            </div>

            <form id="loginForm" class="active" onsubmit="return validateLogin()" method="post">
                <h3> Welcome Back !</h3>

                <input type="tel" id="phnumber" name="phnumber" required autocomplete="off" placeholder="Phone Number"><br>
                <input type="password" id="password" name="password" required autocomplete="off" placeholder="Password"><br>
                <button type="submit" name="login_submit">Login</button>
                <?php
                    if(isset($_POST['login_submit'])){
                        echo "<label>$loginMessage</label>";  // Added a semicolon at the end
                    }
                    if(isset($_POST['register_submit'])){
                        echo "<label>$loginMessage</label>";  // Added a semicolon at the end
                    }

                ?>

            </form>

            <form id="signupForm" onsubmit="return validateSignup()" method="post">
                <h3>Sign Up for Free</h3>
                <div class="top-row">
                    <input type="text" id="firstName" name="firstName" required autocomplete="off" placeholder="First Name"><br>
                    <input type="text" id="lastName" name="lastName" required autocomplete="off" placeholder="Last Name"><br>
                </div>
                <input type="tel" id="phnumberSignup" name="phnumber" required autocomplete="off" placeholder="Phone Number">
                <input type="email" id="email" name="email" required autocomplete="off" placeholder="Email Address">
                <input type="password" id="newPassword" name="newPassword" required autocomplete="off" placeholder="Set A Password">
                <input type="password" id="confirmPassword" name="confirmPassword" required autocomplete="off" placeholder="Write Password Again">

                <button type="submit" name="register_submit">Get Started</button>
                <p> <?php echo $loginMessage ?> </p>
            </form>

        </div>
    </div>
    <script>
        function validateLogin() {
            var phnumber = document.getElementById('phnumber').value;
            var password = document.getElementById('password').value;

            if (phnumber === '' || password === '') {
                alert('Please fill in all required fields for login.');
                return false;
            }

            // You can add more specific validation if needed
            return true;
        }

        function validateSignup() {
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var phnumber = document.getElementById('phnumberSignup').value;
            var email = document.getElementById('email').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            var emptyFields = [];

            if (firstName === '') {
                emptyFields.push('First Name');
            }

            if (lastName === '') {
                emptyFields.push('Last Name');
            }

            if (phnumber === '') {
                emptyFields.push('Phone Number');
            }

            if (email === '') {
                emptyFields.push('Email');
            }

            if (newPassword === '') {
                emptyFields.push('Password');
            }

            if (confirmPassword === '') {
                emptyFields.push('Confirm Password');
            }

            if (emptyFields.length > 0) {
                alert('Please fill in the following required fields: ' + emptyFields.join(', '));
                return false;
            }

            if (newPassword !== confirmPassword) {
                alert('Passwords do not match.');
                return false;
            }

            // You can add more specific validation if needed
            return true;
            }
    </script>
</body>

</html>