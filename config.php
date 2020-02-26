<?php
    $database = mysqli_connect("localhost", "root", "", "webdb");
    
    function query($query) {
        global $database;
        $result = mysqli_query($database, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }

        return $rows;
    }


    function upload () {
        $namaFile = $_FILES['photo']['name'];
        $ukuranFile = $_FILES['photo']['size'];
        $tmpFile = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];

        if ($error === 4) {
            echo "<script> 
                alert('Pilih gambar terlebih dahulu!'); 
                </script>";
            
            return false;
        }
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = strtolower(end($ekstensi));

        if (!in_array($ekstensi, $ekstensiValid)) {
            echo "<script> 
                alert('Yang anda upload bukan gambar!'); 
                </script>";
            
            return false;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensi;

        move_uploaded_file($tmpFile, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }

?>