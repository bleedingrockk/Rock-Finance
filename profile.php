<?php
            include("config.php");
            session_start();
            $userId = $_SESSION['phnumber'];
            $sql = "SELECT * FROM profile_info WHERE phnumber = '$userId'";
            $result = mysqli_query($con, $sql);
            $userData = mysqli_fetch_assoc($result);
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Online Finances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-...">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/profile.css">
    <script src="JAVASCRIPT/profile.js"></script>


</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<!-- --------------------SIDEBAR------------------------- -->
    <div class="sidebar">
        <div class="top-content">
            <h1><i class="fas fa-mountain"></i><span>Rock <br>Finances</span></h1>
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
    <h3>Profile Information</h3>
    <div class="main_body_container">
        <div class="block1">
            <div class="tiles">
                <div class="picture">
                    <img src="CSS\Images\index\user-1.jpg" alt="profile_photo">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" accept="image/*">
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
        <div class="block2">
            <div class="tiles">
                <table>
                    <tr>
                        <th colspan="2">
                            <div class="open">
                                <i class="fa-solid fa-pen-to-square fa-beat-fade" onclick="openOverlay()"></i>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td><b>Full Name:</b></td>
                        <td>    
                            <?php
                                $fullName = isset($userData['firstName']) && isset($userData['lastName']) ? $userData['firstName'] . ' ' . $userData['lastName'] : 'N/A';
                                echo $fullName;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Gender: </td>
                        <td>
                            <?php
                                echo isset($userData['gender']) ? $userData['gender'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <?php
                                echo isset($userData['email']) ? $userData['email'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td>
                            <?php
                                echo isset($userData['phnumber']) ? $userData['phnumber'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Address:</td>
                        <td>
                            <?php
                                echo isset($userData['address']) ? $userData['address'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="tiles">
                <table>
                    <tr>
                        <td> Father's Name:</td>
                        <td>
                            <?php
                                echo isset($userData['father_name']) ? $userData['father_name'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Mother's Name:</td>
                        <td>
                            <?php
                                echo isset($userData['mother_name']) ? $userData['mother_name'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Spouse: <br>(if applicable)</td>
                        <td>
                            <?php
                                echo isset($userData['mother_name']) ? $userData['mother_name'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Nominee:</td>
                        <td>
                            <?php
                                echo isset($userData['nominee_name']) ? $userData['nominee_name'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> Nationality:</td>
                        <td>
                            <?php
                                echo isset($userData['nationality']) ? $userData['nationality'] : 'N/A';
                            ?>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>

    <div id="backdrop"></div>

    <div class="edit_overlay">
        <div class="close">
            <i class="fa-solid fa-circle-xmark" onclick="closeOverlay('scan-and-pay1')"></i>
        </div>
        <div class="form_container">
            <form id="profileForm" method="post" onsubmit="return validateForm()">
                <!-- Personal Information -->
        
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" required><br>
        
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>
        
                <!-- Family Information -->
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="father_name" required><br>
        
                <label for="mother_name">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" required><br>
        
                <label for="spouse_name">Spouse Name:</label>
                <input type="text" id="spouse_name" name="spouse_name"><br>
        
                <label for="nominee_name">Nominee Name:</label>
                <input type="text" id="nominee_name" name="nominee_name" required><br>
        
                <!-- Additional Information -->
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" required><br>
        
                <button type="submit" name="submit">Submit</button>
            </form>
<!-- -------------------------------------php------------------------------------------------------ -->
    <?php
    if (isset($_POST['submit'])) 
    {
        // Retrieve form data
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $spouse_name = $_POST['spouse_name'];
        $nominee_name = $_POST['nominee_name'];
        $nationality = $_POST['nationality'];


        // Perform additional validation if needed
        $phnumber = $userData['phnumber'];
        // Now, insert data into 'profile_info'
        $sqlProfileInfo = "UPDATE profile_info 
                            SET gender = '$gender', 
                                address = '$address', 
                                father_name = '$father_name', 
                                mother_name = '$mother_name', 
                                spouse_name = '$spouse_name', 
                                nominee_name = '$nominee_name',
                                nationality = '$nationality'                                 
                            WHERE phnumber = '$phnumber'";
    
        if (mysqli_query($con, $sqlProfileInfo)) {
            // Profile info added successfully
            echo '<meta http-equiv="refresh" content="0">';
            // You can redirect to a login page or do additional actions here
        } else {
            // Failed to add profile info
            $loginMessage = "Registration failed. Error: " . mysqli_error($con);
        }
    }
    ?>
<!-- --------------------------------php end--------------------------- -->
        </div>
    </div>
</body>

</html>
