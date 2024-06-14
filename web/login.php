<?php
ob_start();

session_start();
include '../function.php';
include 'header.php';
include '../mail.php';
?>
<main id="main">
    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
                
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                extract($_POST);

                $username = dataClean($username);

                $message = array();

                if (empty($username)) {
                    $message['username'] = "User Name shouldn't be empty...!";
                }
                if (empty($password)) {
                    $message['password'] = "Password shouldn't be empty...!";
                }
                 if (empty($message)) {
                    $db = dbConn();
                    $sql = "SELECT * FROM users u INNER JOIN customers c ON c.UserId=u.UserId WHERE UserName='$username'";
                    $result = $db->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();

                        if (password_verify($password, $row['Password'])){
                            $_SESSION['USERID'] = $row['UserId'];
                            $_SESSION['FIRSTNAME']= $row['FirstName'];
                            header("Location:dashboard.php");
                        }else{
                            $message['password'] = "Invalid username or password...!";
                        }
                    }else{
                        $message['password'] = "Invalid username or password...!";
                    }
                }
            }

            ?>

            <div class="row justify-content-center">
                
                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form" class="php-email-form" novalidate>
                        
                        <div class="form-group mt-3">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your User Name" required>
                            <span class="text-danger"> <?= @$message ['username']?></span>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" required>
                            <span class="text-danger"> <?= @$message ['password']?></span>
                        </div>
                        
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Login</button></div>
                    </form>
                </div>

            </div>

        </div>
        
    </section><!-- End Contact Us Section -->
</main>
<?php
include 'footer.php';
ob_end_flush();
?>