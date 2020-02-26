<?php

            // include database connection file
            include "config.php";
            $nama = $_POST['nama'];

            // Insert user data into table
            $result = mysqli_query($database, "INSERT INTO hobby_tb VALUES ('', '$nama')");

            header('location: index.php');

    ?>