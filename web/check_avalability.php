<?php
session_start();
include 'header.php';
include '../function.php';
?>

<!---- START HTML PART -------->
<main id="main">
    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Appoinments</h2>
                <p>Availability</p>
            </div>

<!----  HTML PART -------->

<?php
extract ($_POST);

$db=dbConn();

$time_duration='01:00:00'; //Should be come from a table

$sql = "SELECT * FROM appointments WHERE DATE = '$date'
AND ((start_time >= '$start_time' AND start_time < ADDTIME('$start_time', '$time_duration')) OR (end_time > '$start_time' AND end_time <= ADDTIME('$start_time', '$time_duration')) OR (start_time <= '$start_time' AND end_time >= ADDTIME('$start_time', '$time_duration')));";

$result=$db->query($sql);

if ($result->num_rows >0){
    echo "<h2 class='text-warning'>Slot is not available for $date at $start_time</h2>";
}else{
    echo "<h2 class='text-success'>Slot is available for $date at $start_time <br>";
    $_SESSION['action']= 'booking';
    $_SESSION['date']= $date;
    $_SESSION['time']=$start_time;
    if(isset($_SESSION['USERID'])){
        echo "Book Now";
    }else{
        echo "<a href='login.php'> Please Login before booking </a>";
    }
}
?>
<!---- END HTML PART -------->
</div>
</section>
</main>


<?php
include 'footer.php';
?>