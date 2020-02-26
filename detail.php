<?php 
    require 'config.php';
    $id = $_GET['id'];
    
    $data = query("SELECT * FROM profile_tb WHERE id = $id");
    $nama_hobby = mysqli_query($database, "SELECT * FROM hobby_tb ORDER BY id ASC");
foreach($data as $user_data): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Detail Profil</title>
</head>
<body>
    <div class="container">

        <a href="index.php" class="btn btn-info">Kembali</a>

        <h2>Detail</h2>
        <h3>Nama : <?= $user_data["nama"]; ?></h3>
        <h3>Tanggal Lahir : <?= $user_data["born_date"]; ?></h3>
        <h3>Alamat : <?= $user_data["address"]; ?></h3>
        <h3>Hobby : <?= $user_data["hobby_id"]; ?></h3>
        <h3>Photo : </h3>
        <img src="img/<?= $user_data["photo"]; ?>" alt="" >
    </div>

    <?php endforeach; ?>
    
</body>
</html>
