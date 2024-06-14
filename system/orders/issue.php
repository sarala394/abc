<?php

include_once '../init.php';
$db = dbConn();

$issue_qty = 3;
$item_id = 1;

while ($issue_qty > 0) {

    $sql = "SELECT *
            FROM `item_stock`
            WHERE item_id = $item_id
              AND (qty - COALESCE(issued_qty, 0)) > 0
            ORDER BY `purchase_date` ASC
            LIMIT 1";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $remaining_qty = $row['qty'] - ($row['issued_qty'] ?? 0);

        if ($issue_qty <= $remaining_qty) {
            $i_qty = $issue_qty;
            $s_id = $row['id'];
            $sql = "UPDATE `item_stock` SET issued_qty = COALESCE(issued_qty, 0) + $i_qty WHERE id = $s_id";
            $db->query($sql);
            $issue_qty = 0;
        } else {
            $i_qty = $remaining_qty;
            $s_id = $row['id'];
            $sql = "UPDATE `item_stock` SET issued_qty = COALESCE(issued_qty, 0) + $i_qty WHERE id = $s_id";
            $db->query($sql);
            $issue_qty -= $i_qty;
        }
    } else {
        break;
    }
}
