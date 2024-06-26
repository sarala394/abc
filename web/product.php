<html>
    <head>
        <title>
            Cart
        </title>
    </head>
    <body>        
        <?php
        include '../function.php';
        $db = dbConn();
        $sql = "SELECT
    item_stock.id
    , items.item_name
    , items.item_image
    , item_stock.qty
    , item_stock.unit_price
    , item_category.category_name
FROM
    item_stock
    INNER JOIN items 
        ON (items.id = item_stock.item_id)
    INNER JOIN item_category 
        ON (item_category.id = items.item_category)
        GROUP BY items.id, item_stock.unit_price";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div style="border: solid #04414d 1px">
                    <img src="assets/img/<?= $row['item_image'] ?>">
                    <?= $row['item_name'] ?>
                    <?= $row['unit_price'] ?>
                    <form method="post" action="shopping_cart.php">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="operate" value="add_cart">Add to Cart</button>                
                    </form>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
