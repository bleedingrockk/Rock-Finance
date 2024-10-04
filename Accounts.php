<?php
    include("config.php");
    session_start();
    $phnumber = $_SESSION['phnumber'];
    $sql = "SELECT * FROM profile_info WHERE phnumber = '$phnumber'";
    $result = mysqli_query($con, $sql);
    $userData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Online Finances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/accounts.css">
    <script src="JAVASCRIPT/profile.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;600&display=swap" rel="stylesheet">
    <style>
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<!-- --------------------SIDEBAR------------------------- -->
    <div class="sidebar">
        <div class="top-content">
            <h1 id="rockFinancesHeader"><i class="fas fa-mountain"></i><span>Rock <br>Finances</span></h1>
            <a href="home.html"><i class="fas fa-university"></i> Banking</a>
            <a href="insurance.html"><i class="fas fa-shield-alt"></i> Recharges</a>
            <a href="digital-services.html"><i class="fas fa-laptop"></i> Bill Payments</a>
            <a href="financial-products.html"><i class="fas fa-coins"></i> Investments</a>
            <a href="utilities.html"><i class="fas fa-wrench"></i> Insurance</a>
            <a href="travel-leisure.html"><i class="fas fa-plane"></i> Travel</a>
            <a href="gift-rewards.html"><i class="fas fa-gift"></i> Gift and Rewards</a>
        </div>
        <footer class="footer">
            <div class="footer-social">
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
            <div>
                Rock Finance ©<br />
                All Rights Reserved 2021
            </div>
        </footer>
    </div>
<?php
    // Check if user details are fetched successfully
    if ($userData) {
        // Concatenate the first name and last name
        $fullName = $userData['firstName'] . ' ' . $userData['lastName'];
    } else {
        // Default to a generic name if user details cannot be retrieved
        $fullName = 'User';
    }
?>
    <div class="profile_view_container">
        <div class="profile_view">
            <img src="CSS\Images\index\user-1.jpg">
            
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $fullName; ?>
                </a>
            
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="Accounts.php">Accounts</a>
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
<!-- ---------------------------- MAIN BODY CONTENT------------------------ -->
    <div class="main_body_container">
        
        <?php
    // Fetch user accounts data from the database
    $sqlFetchAccounts = "SELECT * FROM bank_accounts WHERE phnumber = '$phnumber'";
    $result = mysqli_query($con, $sqlFetchAccounts);

    // Check if there are rows returned
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo '<table>';
        echo '<tr><th>Account Number</th><td>' . $row['Account_Number'] . '</td></tr>';
        echo '<tr><th>Account Type</th><td>' . $row['Account_Type'] . '</td></tr>';
        echo '<tr><th>Branch</th><td>' . $row['Branch'] . '</td></tr>';
        echo '<tr><th>IFSC</th><td>' . $row['IFSC'] . '</td></tr>';
        echo '<tr><th>Available Balance</th><td>' . $row['Available_Balance'] . '</td></tr>';
        echo '<tr><th>Bank Name</th><td>' . $row['Bank_Name'] . '</td></tr>';
        echo '</table>';
    } else {
        // Handle the case when there are no rows
        echo 'No account information found.';
    }
?>


        <button class="add_account" onclick="openOverlay()"> Add Account</button>
    
    </div>
    <!-- ------------------- php tables------------------------------ -->
    

    <!-- ----------------Overlap--------------------- -->
    <div id="backdrop"></div>

    <div class="edit_overlay">
        <div class="close">
            <i class="fa-solid fa-circle-xmark" onclick="closeOverlay('scan-and-pay1')"></i>
        </div>
        <div class="form_container">
        <form id="accountDetailsForm" method="post" onsubmit="return validateForm()">
            <label for="accountNumber">Account Number:</label><br>
            <input type="text" id="accountNumber" name="accountNumber" required pattern="[0-9]{16}" title="Please enter a 16-digit account number"><br><br>
        
            <label for="accountType">Account Type:</label><br>
            <input type="text" id="accountType" name="accountType" required><br><br>
        
            <label for="branch">Branch:</label><br>
            <input type="text" id="branch" name="branch" required><br><br>
        
            <label for="ifsc">IFSC:</label><br>
            <input type="text" id="ifsc" name="ifsc" required><br><br>
        
            <label for="bankName">Bank Name:</label><br>
            <input type="text" id="bankName" name="bankName" required><br><br>
        
            <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $accountNumber = $_POST['accountNumber'];
        $accountType = $_POST['accountType'];
        $branch = $_POST['branch'];
        $ifsc = $_POST['ifsc'];
        $balance = $_POST['balance'];
        $bankName = $_POST['bankName'];

        // Perform additional validation if needed
        $phnumber = $_SESSION['phnumber'];

        // Now, insert data into 'user_accounts' table
        $sqlUserAccounts = "INSERT INTO bank_accounts (phnumber, account_number, account_type, branch, IFSC, available_balance, bank_name) 
                            VALUES ('$phnumber', '$accountNumber', '$accountType', '$branch', '$ifsc', 0, '$bankName')";
    
        if (mysqli_query($con, $sqlUserAccounts)) {
            // User account added successfully
            echo '<meta http-equiv="refresh" content="0">';
            // You can redirect to a login page or do additional actions here
        } else {
            // Failed to add user account
            $loginMessage = "Account creation failed. Error: " . mysqli_error($con);
        }
    }
    ?>
</body>
<script>
                // Get the h1 element by its ID
                var rockFinancesHeader = document.getElementById('rockFinancesHeader');

                // Add a click event listener to the h1 element
                rockFinancesHeader.addEventListener('click', function() {
                    // Replace 'your_link_url_here' with the actual URL you want to navigate to
                    window.location.href = 'home.php';
                });
            </script>

</html>
