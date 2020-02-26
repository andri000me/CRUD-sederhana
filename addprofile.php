<?php

            // include database connection file
            include "config.php";

            $nama = $_POST['nama'];
            $born_date = $_POST['born_date'];
            $address = $_POST['address'];
            $hobby_id = $_POST['hobby_id'];
            
            // Upload Gambar
            $photo = upload();
            if ($photo === false) {
                return false;
            }

            // Insert user data into table
            $result = mysqli_query($database, "INSERT INTO profile_tb VALUES ('', '$nama', '$born_date', '$address', '$hobby_id', '$photo')");

            header('location: index.php');
?>