<?php

include '../function.php';

extract($_GET);

$db = dbConn();
$sql = "SELECT * FROM  divsecretariat WHERE Dis_Code='$districtId'";
$result = $db->query($sql);
?>
<select name="divisional" id="divisional" class="form-select form-select-lg mb-3 border border-1 border-dark">
    <option value="">--</option>
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
        <option value="<?= $row['id'] ?>"><?= $row['DivSecretariat'] ?></option>
    <?php
    }
    ?>
</select>