<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rock Online Finances</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="css/home.css">
        <script src="javascript/home.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;600&display=swap" rel="stylesheet">
        <?php
            include("config.php");
            session_start();
            $userId = $_SESSION['phnumber'];
            $sql = "SELECT * FROM account_info WHERE phnumber = '$userId'";
            $result = mysqli_query($con, $sql);
            $userData = mysqli_fetch_assoc($result);
        ?>
    </head>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <div class="sidebar">
        <div class="top-content">
            <h1><i class="fas fa-mountain"></i><span>Rock <br>Finances</span></h1>
            <a class="active" href="banking.html"><i class="fas fa-university"></i> Banking</a>
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
<!--------------------------------- MAIN BODY -------------------------------------- -->
    <div class="main_body">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="Css/Images/Get Started With rockfinance.com.png" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Css/Images/Get Started With rockfinance.com (1).png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="Css/Images/Get Started With rockfinance.com (2).png" alt="Third slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="tiles_head">
            <h2> Recent Used Service</h2>
        </div>
        <div class="container">
            <article class="tiles">
                <div class="tile-header">
                    <i class="fa-solid fa-bolt"></i>
                    <span>Electricity</span>
                    <p>Pay electricity bill</p>
                </div>
                <a href="#">
                    <span>Go to service</span>
                    <span class="icon-button">
                        <i class="fas fa-circle-right fa-beat-fade"></i>
                    </span>
                </a>
            </article>
        
            <article class="tiles">
                <div class="tile-header">
                    <i class="fa-solid fa-droplet"></i>
                    <span>Water Bill</span>
                    <p>Pay water bill</p>
                </div>
                <a href="#">
                    <span>Go to service</span>
                    <span class="icon-button">
                        <i class="fas fa-circle-right fa-beat-fade"></i>
                    </span>
                </a>
            </article>
        
            <article class="tiles">
                <div class="tile-header">
                    <i class="fa-solid fa-filter-circle-dollar"></i>
                    <span>Tax Online</span>
                    <p>Secure online tax payments</p>
                </div>
                <a href="#">
                    <span>Go to service</span>
                    <span class="icon-button">
                        <i class="fas fa-circle-right fa-beat-fade"></i>
                    </span>
                </a>
            </article>
        
            <article class="tiles">
                <div class="tile-header">
                    <i class="fa-solid fa-satellite-dish"></i>
                    <span>DTH</span>
                    <p>Pay for DTH services</p>
                </div>
                <a href="#">
                    <span>Go to service</span>
                    <span class="icon-button">
                        <i class="fas fa-circle-right fa-beat-fade"></i>
                    </span>
                </a>
            </article>

            <article class="tiles">
                <div class="tile-header">
                    <i class="fa-solid fa-fire-flame-simple"></i>
                    <span>LPG</span>
                    <p>Book LPG</p>
                </div>
                <a href="#">
                    <span>Go to service</span>
                    <span class="icon-button">
                        <i class="fas fa-circle-right fa-beat-fade"></i>
                    </span>
                </a>
            </article>
        
            
        </div>
        
    </div>
<!-- ------------------------------- APP BODY SIDEBAR-------------------------------- -->

<!-- --------------------------------PHP----------------------------------------------------- -->
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

    <div class="app-body-sidebar">
        <div class="profile_view">
            <img src="CSS\Images\index\user-1.jpg" alt="profile_image">
            
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
        <section class="payment-section">
            <div class="newpayment" onclick="openOverlay()">
                Transfer Money
            </div>

            <div class="payments">
                <div class="payment">
                    <div class="card1">
                        <span>IDFC BANK</span>
                        <span>
                            •••• •••• ••••
                        </span>
                    </div>
                    <div class="payment-details">
                        <h3>Balance</h3>
                        <div>
                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 5,000</span>
                        </div>
                    </div>
                </div>
                <div class="payment">
                    <div class="card1">
                        <span> SIB BANK</span>
                        <span>
                            •••• •••• ••••
                        </span>
                    </div>
                    <div class="payment-details">
                        <h3>Balance</h3>
                        <div>
                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 5,000</span>
                        </div>
                    </div>
                </div>
                <div class="payment">
                    <div class="card1">
                        <span>SBI BANK</span>
                        <span>
                            •••• •••• ••••
                        </span>
                    </div>
                    <div class="payment-details">
                        <h3>Internet</h3>
                        <div>
                            <span><i class="fa-solid fa-indian-rupee-sign"></i> 5,000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq">
                <p>Have a question? Ask us below!</p>
                <div>
                <label for="questionInput">Your Question:</label>
                <input type="text" id="questionInput" placeholder="Type your question here">
                </div>
            </div>
            
            <div class="payment-section-footer">
                <button class="save-button">
                    Save
                </button>
            </div>
        </section>
    </div>

<!-- ------------------------ NEW PAYMENT OVERLAP--------------------------- -->
<div id="backdrop"></div>

    <div class="newpayment_overlap">
        <div class="close">
            <i class="fa-solid fa-circle-xmark" onclick="closeOverlay('scan-and-pay1')"></i>
        </div>
        
        <div class="option_container">
            <div class="payment_options">
                <div class="payment_option">
                    <i class="fa-solid fa-qrcode payment-icon fa-beat-fade"></i> QR code
                </div>
                <div class="payment_option">
                    <i class="fa-solid fa-mobile-screen-button fa-beat-fade"></i> To Mobile number
                </div>
                <div class="payment_option">
                    <i class="fa-solid fa-building payment-icon fa-beat-fade"></i> To Account
                </div>
                <div class="payment_option">
                    <i class="fa-solid fa-at fa-beat-fade"></i> To upi
                </div>
                <div class="payment_option">
                    <i class="fa-solid fa-user payment-icon fa-beat-fade"></i> To self
                </div>
            </div>
        
            <div class="payment_detail">
                <form class="qr_code_pay" method="post">
                    <label for="account_number">Account Number</label>
                    <input type="number" name="account_number" id="account" required>
                    
                    <label for="ifsc_code">IFSC Code</label>
                    <input type="text" name="ifsc_code" id="ifsc_code" required>
                    
                    <label for="branch">Branch</label>
                    <input type="text" name="branch" id="branch" required>
                
                    <label for="amount">Amount (in INR)</label>
                    <input type="number" name="amount" id="amount" required>
                
                    <button type="submit" name="send_submit">Submit</button>
                </form>
                <?php
                        if (isset($_POST['send_submit'])) {
                            $accountNumber = $_POST['account_number']; 
                            $amount = $_POST['amount'];
                            $sqlUserBalance = "SELECT Available_Balance FROM bank_accounts WHERE phnumber = '$userId'";
                            $resultUserBalance = mysqli_query($con, $sqlUserBalance);
                            $rowUserBalance = mysqli_fetch_assoc($resultUserBalance);

                    
                            $userBalance = $rowUserBalance['Available_Balance'];

                            $newUserBalance = $userBalance - $amount;
                            $sqlUpdateUserBalance = "UPDATE bank_accounts SET Available_Balance = '$newUserBalance' WHERE phnumber = '$userId'";
                            mysqli_query($con, $sqlUpdateUserBalance);

                            // Transfer money to the specified account
                            $sqlTransferMoney = "UPDATE bank_accounts SET Available_Balance = Available_Balance + $amount WHERE Account_Number = '$accountNumber'";
                            mysqli_query($con, $sqlTransferMoney);
                        }
                    
                    ?>

                
            </div>
        </div>
    </div>
</body>
</html>
