<?php
    // include database connection file
    include "config.php";

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $born_date = $_POST['born_date'];
    $address = $_POST['address'];
    $hobby_id = $_POST['hobby_id'];
    $oldPhoto = $_POST['oldPhoto'];
    $photo = $_POST['photo'];

    if($_FILES['photo']['error'] === 4) {
        $photo = $oldPhoto;
    } else {
        $photo = upload();
    }

    // Update user data into table
    mysqli_query($database, "UPDATE profile_tb SET nama='$nama', born_date='$born_date', hobby_id='$hobby_id', photo='$photo' WHERE id = $id");

    header('location: index.php');
?>