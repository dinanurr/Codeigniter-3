<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/profil.png') ?>">
    <link rel="icon" type="img/png" href="<?= base_url('assets/img/profil.png') ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Apotek || Tambah Stok Obat</title>
</head>

<body>
    <div class="container">
        <hr>
        <h3>Tambah Stok Obat</h3>
        <hr>
        <form action="<?= base_url('index.php/master/simpan/' ); ?>" method="POST">
            <div class="mb-3">
                <label for="cari">Kode Barang</label>
                <input type="text" class="form-control" id="kode_obat" name="kode_obat"
                    value="JRD<?php echo sprintf("%04s", $kode_obat) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="cari">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="cari">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis">
            </div>
            <div class="form-group">
                <label for="cari">Kemasan</label>
                <input type="text" class="form-control" id="kemasan" name="kemasan">
            </div>
            <div class="form-group">
                <label for="cari">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
            <input class="btn btn-primary" type="submit" value="Simpan">
            <input class="btn btn-primary" type="reset" value="Reset">
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>