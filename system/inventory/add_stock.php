<?php
ob_start();
include_once '../init.php';
?>
<div class="row">
    <div class="col-12">
        <a href="<?= SYS_URL ?>inventory/manage.php" class="btn btn-dark mb-2"><i class="fas fa-plus-circle"></i> View Stock</a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Stock</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    extract($_POST);
                    $item_id = dataClean($item_id);
                    $qty = dataClean($qty);
                    $unit_price = dataClean($unit_price);
                    $purchase_date = dataClean($purchase_date);
                    $supplier_id = dataClean($supplier_id);

                    $message = array();
                    //Required validation-----------------------------------------------
                    if (empty($item_id)) {
                        $message['item_id'] = "The Item should not be blank...!";
                    }
                    if (empty($qty)) {
                        $message['qty'] = "The qty should not be blank...!";
                    }
                    if (empty($message)) {
                        $db = dbConn();
                        $sql = "INSERT INTO `item_stock`(`item_id`,`qty`,`unit_price`,`purchase_date`,`supplier_id`) VALUES ('$item_id','$qty','$unit_price','$purchase_date','$supplier_id')";
                        $db->query($sql);
                    }
                }
                ?>

                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <label for="supplier_id">Supplier:</label>
                        <select name="supplier_id" id="supplier_id" class="form-control" required>
                            <option value="">--</option>
                            <?php
                            $db = dbConn();
                            $sql = "SELECT id, supplier_name FROM supplier";
                            $result = $db->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row['id'] ?>" <?= @$supplier_id == $row['id'] ? 'selected' : '' ?>><?= $row['supplier_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="purchase_date">Purchase Date:</label>
                        <input type="date" name="purchase_date" id="purchase_date" class="form-control" required value="<?= @$purchase_date ?>">
                    </div>
                    <div class="form-group">
                        <label for="item_id">Item Name:</label>
                        <select name="item_id" id="item_id" class="form-control" required>
                            <option value="">--</option>
                            <?php
                            $db = dbConn();
                            $sql = "SELECT id, item_name FROM items";
                            $result = $db->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['item_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="number" name="qty" id="qty" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price:</label>
                        <input type="text" name="unit_price" id="unit_price" class="form-control" required>
                    </div>


                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>


            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
<?php
$content = ob_get_clean();
include '../layouts.php';
?>