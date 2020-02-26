<?php 
    // Coneksi database dari file config
    require "config.php";

    // Fetch semua user data
    $data = query("SELECT * FROM profile_tb");
    $hobby = query("SELECT * FROM hobby_tb");
    $nama_hobby = mysqli_query($database, "SELECT * FROM hobby_tb ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">

    <title>CRUD</title>
</head>
<body>
    <div class="container" id="content">
        <div class="header mb-3">
            <div>
                <h1>HELU SCHOOL</h1>
            </div>
            <div class="tombol">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_profile">Tambah Profile</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_hobby">Tambah Hobby</button>
            </div>
        </div>

        <div class="row">
            <?php foreach($data as $user_data): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-2 card">
                <img src="img/<?= $user_data["photo"]; ?>" alt="">
                <h4><?= $user_data["nama"]; ?></h4>
                <p><?= $user_data["hobby_id"]; ?></p>
                <a type="button" class="btn btn-info" href="detail.php?id=<?= $user_data["id"]; ?>"> Detail </a>
                <a type="button" class="btn btn-warning" href="edit_form.php?id=<?= $user_data["id"]; ?>">Edit</a>
                <a type="button" class="btn btn-danger" href="delete.php?id=<?= $user_data["id"]; ?>">Delete</a>
            </div>
            <?php endforeach; ?>
            
        </div>






        <!-- Modal Profile -->
        <div class="modal fade" id="add_profile" tabindex="-1" role="dialog" aria-labelledby="add-profile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-profile">Tambah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addprofile.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Born Date :</label>
                        <input type="text" id="born-date" name="born_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Address :</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Hobby ID :</label>
                        <select name="" id="hobby_name">
                                <?php while ($row = mysqli_fetch_assoc($nama_hobby)) : ?>
                                    <option><?=$row['id']; ?>. <?=$row['name']; ?></option>
                                <?php endwhile; ?>
                        </select>
                        <input type="number" id="hobby_id" name="hobby_id" placeholder="Masukkan no. hobby">
                        
                    </div>
                    <div class="form-group">
                        <label for="nama">Photo :</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal Hobby -->
        <div class="modal fade" id="add_hobby" tabindex="-1" role="dialog" aria-labelledby="add-profile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-profile">Tambah Hobby</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addhobby.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Masukkan Hobby :</label>
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>

                    <div class="hobby-list">
                    <h5>Daftar Hobby : </h5>
                        <ul>
                        <?php foreach($hobby as $user_hobby): ?>
                            <input type="hidden" name="id" value="<?= $user_hobby["id"]; ?>">
                            <li><?= $user_hobby["name"];?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>


    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>