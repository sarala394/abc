<?php

ob_start();
include_once '../init.php';

$link = "User Management";
$breadcrumb_item = "User";
$breadcrumb_item_active = "Update";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    extract($_GET);
    $db = dbConn();
    $sql = "SELECT * FROM users u INNER JOIN employee e ON e.UserId=u.UserId WHERE u.UserId='$userid'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $DesignationId = $row['DesignationId'];
    $DepartmentId = $row['DepartmentId'];
    $AppDate = $row['AppDate'];
    $UserId = $row['UserId']; //----Should be added to UserId of input form

}


//Connect form and check insert data validation------
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_POST);
    $FirstName = dataClean($FirstName);
    $LastName = dataClean($LastName);
    $DesignationId = dataClean($DesignationId);
    $DepartmentId = dataClean($DepartmentId);
    $AppDate = dataClean($AppDate);
    $UserName = dataClean($UserName);

    $message = array();
    if (empty($FirstName)) {
        $message['FirstName'] = "The First Name should not be blank...!";
    }
    if (empty($LastName)) {
        $message['LastName'] = "The Last Name should not be blank...!";
    }
    if (empty($DesignationId)) {
        $message['DesignationId'] = "The Designation should not be blank...!";
    }
    if (empty($DepartmentId)) {
        $message['DepartmentId'] = "The Department should not be blank...!";
    }
    if (empty($AppDate)) {
        $message['AppDate'] = "The App. Date should not be blank...!";
    }





    //----------------------
    if (empty($message)) {

        $db = dbConn();
        $sql = "UPDATE users SET FirstName='$FirstName', LastName='$LastName' WHERE UserId='$UserId'";
        $db->query($sql);


        $sql = "UPDATE employee SET AppDate='$AppDate',DesignationId='$DesignationId',DepartmentId='$DepartmentId' WHERE UserId='$UserId'";
        $db->query($sql);

        header("Location:manage.php");
    }
}

?>

<div class="col-12">
    <a href="" class="btn btn-dark mb-2"><i class="fas fa-plus-circle"></i>Edit</a>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update User</h3>
        </div>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Enter First Name" value="<?= @$FirstName ?>">
                    <span class="text-danger"><?= @$message['FirstName'] ?></span>
                </div>

                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter Last Name" value="<?= @$LastName ?>">
                    <span class="text-danger"><?= @$message['LastName'] ?></span>
                </div>

                <div class="form-group">
                    <label for="DesignationId">Designation</label>
                    <?php
                    $db = dbConn();
                    $sql = "SELECT * FROM designations";
                    $result = $db->query($sql);
                    ?>
                    <select class="form-control" id="DesignationId" name="DesignationId" value="<?= @$DesignationId ?>">
                        <option value="">--</option>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?= $row['Id'] ?>" <?= @$DesignationId == $row['Id'] ? 'selected' : '' ?>> <?= $row['Designation'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= @$message['DesignationId'] ?></span>
                </div>

                <div class="form-group">
                    <label for="DepartmentId">Department</label>
                    <?php
                    $db = dbConn();
                    $sql = "SELECT * FROM departments";
                    $result = $db->query($sql);
                    ?>
                    <select class="form-control" id="DepartmentId" name="DepartmentId" value="<?= @$DepartmentId ?>">
                        <option value="">--</option>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <option value="<?= $row['Id'] ?>" <?= @$DepartmentId == $row['Id'] ? 'selected' : '' ?>> <?= $row['Department'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="text-danger"><?= @$message['DepartmentId'] ?></span>
                </div>
                <div class="form-group">
                    <label for="AppDate">Appointment Date</label>
                    <input type="date" class="form-control" id="AppDate" name="AppDate" value="<?= @$AppDate ?>">
                    <span class="text-danger"><?= @$message['AppDate'] ?></span>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="UserId" value="<?= $UserId ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>
</div>




<?php
$content = ob_get_clean();
include '../layouts.php';
?>