<?php

ob_start();

session_start();
include 'header.php';
include '../function.php';
?>
<main id="main">
    <!-- ======= Contact Us Section ======= -->
    <section class="d-flex flex-column min-vh-100 justify-content-center align-items-left">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row">
                <div class="col-md-10 mx-auto rounded shadow bg-white">
                    <div class="row">
                        <div class="col-md-6"> <!-- ======= 1st form======= -->
                            <div class="m-5 text-left">
                                <h2>Welcome!</h2>
                                <hr />
                            </div>

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                extract($_POST);
                                $first_name = dataClean($first_name);
                                $last_name = dataClean($last_name);
                                $address_line1 = dataClean($address_line1);
                                $address_line2 = dataClean($address_line2);
                                $address_line3 = dataClean($address_line3);

                                $message = array();
                                //Required validation-----------------------------------------------
                                if (empty($first_name)) {
                                    $message['first_name'] = "The first name should not be blank...!";
                                }
                                if (empty($last_name)) {
                                    $message['last_name'] = "The last name should not be blank...!";
                                }
                                if (!isset($gender)) {
                                    $message['gender'] = "Gender is required";
                                }
                                if (empty($user_name)) {
                                    $message['user_name'] = "User name is required";
                                }
                                if (empty($password)) {
                                    $message['password'] = "Password is required";
                                }

                                //Advance validation------------------------------------------------
                                if (ctype_alpha(str_replace(' ', '', $first_name)) === false) {
                                    $message['first_name'] = "Only letters and white space allowed";
                                }
                                if (ctype_alpha(str_replace(' ', '', $last_name)) === false) {
                                    $message['last_name'] = "Only letters and white space allowed";
                                }
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $message['email'] = "Invalid Email Address...!";
                                } else {
                                    $db = dbConn();
                                    $sql = "SELECT * FROM customers WHERE Email='$email'";
                                    $result = $db->query($sql);

                                    if ($result->num_rows > 0) {
                                        $message['email'] = "This Email address is already exist.....!";
                                    }
                                }

                                if (!empty($user_name)) {
                                    $db = dbConn();
                                    $sql = "SELECT * FROM users WHERE UserName='$user_name'";
                                    $result = $db->query($sql);

                                    if ($result->num_rows > 0) {
                                        $message['user_name'] = "This User Name already exsist...!";
                                    }
                                }

                                if (!empty($password)) {
                                    if (strlen($password) < 8) {
                                        $message['password'] = "The password should be 8 characters more";
                                    }
                                }
                                //--------incomplete-------

                                if (empty($message)) {
                                    //Use bcrypt hasing algorithem----------------
                                    $pw = password_hash($password, PASSWORD_DEFAULT);
                                    $db = dbConn();
                                    $sql = "INSERT INTO `users`(`UserName`, `Password`, `UserType`) VALUES ('$user_name','$pw', 'customer')";
                                    $db->query($sql);

                                    $user_id = $db->insert_id;

                                    $reg_number = date('Y') . date('m') . date('d') . $user_id;
                                    $_SESSION['RNO'] = $reg_number;
                                    $sql = "INSERT INTO `customers`(`FirstName`, `LastName`, `Email`, `AddressLine1`, `AddressLine2`, `AddressLine3`, `TelNo`, `MobileNo`, `Gender`, `DistrictId`,`RegNo`,`UserId`) VALUES ('$first_name','$last_name','$email','$address_line1','$address_line2','$address_line3','$telno','$mobile_no','$gender','$district','$reg_number','$user_id')";
                                    $db->query($sql);

                                    header("Location:register_success.php");
                                }
                            }
                            ?>

                            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form" class="php-email-form" novalidate>
                                <div class="m-2 text-left">
                                    <label for="email">User name</label>
                                    <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                    <span class="text-danger"><?= @$message['email'] ?></span>
                                </div>

                                <div class="m-2 text-left">
                                    <label for="email">User name</label>
                                    <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                    <span class="text-danger"><?= @$message['email'] ?></span>
                                </div>

                                <div class="m-2 text-left">
                                    <label for="email">User name</label>
                                    <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                    <span class="text-danger"><?= @$message['email'] ?></span>
                                </div>

                                <div class="m-2 text-left">
                                    <label for="email">User name</label>
                                    <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                    <span class="text-danger"><?= @$message['email'] ?></span>
                                </div>
                                <div class="m-2 text-left">
                                    <label for="email">User name</label>
                                    <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                    <span class="text-danger"><?= @$message['email'] ?></span>
                                </div>

                                <div class="col-md-6"> <!-- ======= 2nd form======= -->
                                    <div class="m-5 text-left">
                                        <h2>Welcome!</h2>
                                        <hr />
                                    </div>
                                    <div class="m-2 text-left">
                                        <label for="email">User name</label>
                                        <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                        <span class="text-danger"><?= @$message['email'] ?></span>
                                    </div>
                                    <div class="m-2 text-left">
                                        <label for="email">User name</label>
                                        <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                        <span class="text-danger"><?= @$message['email'] ?></span>
                                    </div>
                                    <div class="m-2 text-left">
                                        <label for="email">User name</label>
                                        <input type="text" class="form-control border border-1 border-dark" name="email" id="email" value="<?= @$email ?>" placeholder="Email" required>
                                        <span class="text-danger"><?= @$message['email'] ?></span>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section><!-- End Contact Us Section -->
</main>
<?php
include 'footer.php';
ob_end_flush();
?>