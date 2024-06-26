<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = array();
    // print_r($_FILES['itemImages']);

    if (isset($_FILES['itemImages'])) {

        $itemImages = $_FILES['itemImages'];
        $uploadResult = uploadFiles($itemImages);
        foreach ($uploadResult as $key => $value) {
            if ($value['upload']) {
                echo $value['file'];
            } else {
                foreach ($value as $result) {
                    echo $result;
                }
            }
        }
    }
}

function uploadFiles($files)
{
    $messages = array();
    foreach ($files['name'] as $key => $filename) {
        $filetmp = $files['tmp_name'][$key];
        $filesize = $files['size'][$key];
        $fileerror = $files['error'][$key];

        $file_ext = explode('.', $filename);
        $file_ext = strtolower(end($file_ext));

        $allowed_ext = array('pdf', 'png', 'jpg', 'gif', 'jpeg');

        if (in_array($file_ext, $allowed_ext)) {
            if ($fileerror === 0) {
                if ($filesize <= 2097152) {
                    $file_name = uniqid('', true) . '.' . $file_ext;
                    $file_destination = '../uploads/' . $file_name;
                    move_uploaded_file($filetmp, $file_destination);
                    $messages[$key]['upload'] = true;
                    $messages[$key]['file'] = $file_name;
                } else {
                    $messages[$key]['upload'] = false;
                    $messages[$key]['size'] = "The file size is invalid for $filename";
                }
            } else {
                $messages[$key]['upload'] = false;
                $messages[$key]['uploading'] = "Error occurred while uploading $filename";
            }
        } else {
            $messages[$key]['upload'] = false;
            $messages[$key]['type'] = "Invalid file type for $filename";
        }
    }
    return $messages;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item Images</title>
</head>

<body>
    <h2>Upload Item Images</h2>
    <form action="add.php" method="post" enctype="multipart/form-data" novalidate>
        <label for="itemName">Item Name:</label><br>
        <input type="text" id="itemName" name="itemName" required><br><br>

        <label for="itemDescription">Item Description:</label><br>
        <textarea id="itemDescription" name="itemDescription"></textarea><br><br>

        <label for="itemPrice">Item Price:</label><br>
        <input type="text" id="itemPrice" name="itemPrice" required><br><br>

        <label for="itemImages">Select Images (Max 3):</label><br>
        <input type="file" id="itemImages1" name="itemImages[]"><br><br>
        <input type="file" id="itemImages2" name="itemImages[]"><br><br>
        <input type="file" id="itemImages3" name="itemImages[]"><br><br>

        <input type="submit" value="Upload Images" name="submit">
    </form>
</body>

</html>