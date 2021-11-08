<?php

include 'db.php';

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "image/" . $filename;

    // Get all the submitted data from the form
    $sql = "INSERT INTO image (filename) VALUES ('$filename')";

    // Execute query
    mysqli_query($connect, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM image");
