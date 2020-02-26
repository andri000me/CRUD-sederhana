<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="header mb-3">
            <div>
                <h2>HELU SCHOOL</h2>
            </div>
            <div>
                <a href="index.php" class="btn btn-info">Kembali</a>
            </div>
        </div>
        <div>

        <?php 
            require 'config.php';
            $id = $_GET['id'];
            $data = query("SELECT * FROM profile_tb WHERE id = $id");
            $nama_hobby = mysqli_query($database, "SELECT * FROM hobby_tb ORDER BY id ASC");
            foreach($data as $user_data): 
        ?>
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $user_data["id"]; ?>">
                    <input type="hidden" name="oldPhoto" value="<?= $user_data["photo"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $user_data["nama"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Born Date :</label>
                    <input type="text" id="born-date" name="born_date" class="form-control" value="<?= $user_data["born_date"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Address :</label>
                    <input type="text" id="address" name="address" class="form-control" value="<?= $user_data["address"]; ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Hobby ID :</label>
                    <input type="number" id="hobby_id" name="hobby_id" class="form-control" value="<?= $user_data["hobby_id"]; ?>">
                    <select name="" id="hobby_name">
                    <option value="">Referensi no. hobby : </option>
                        <?php while ($row = mysqli_fetch_assoc($nama_hobby)) : ?>
                            <option><?=$row['id']; ?>. <?=$row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Photo :</label> <br>
                    <img src="img/<?= $user_data["photo"]; ?>" alt="" width="100">
                    <input type="file" id="photo" name="photo" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        
        <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>