<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Ambil ID Produk dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    // Jika ada gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "../img/Produk/";
        $target_file = $target_dir . basename($gambar);

        // Upload gambar ke folder
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $gambar_query = ", gambar = '$gambar'";
        } else {
            $error = "Gagal mengunggah gambar.";
        }
    } else {
        $gambar_query = ""; // Jika tidak ada gambar baru
    }

    // Update data produk di database
    $sql = "UPDATE produk SET 
            nama_produk = '$nama_produk', 
            kategori = '$kategori', 
            harga = $harga, 
            stok = $stok, 
            deskripsi = '$deskripsi'
            $gambar_query
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../dashboard/home.php?pesan=success");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Ambil data produk berdasarkan ID
$sql = "SELECT * FROM produk WHERE id = $id";
$result = $conn->query($sql);
$produk = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: rgba(82, 81, 81, 0.15);">
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Edit Data Produk</h2>
        <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data" class="bg-light p-4 shadow-sm rounded"
            style="max-width: 800px; margin: auto;">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="<?= $produk['nama_produk'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $produk['kategori'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk['harga'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= $produk['stok'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                    required><?= $produk['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                <?php if (!empty($produk['gambar'])) : ?>
                <div class="mt-2">
                    <img src="../uploads/<?= $produk['gambar'] ?>" alt="<?= $produk['nama_produk'] ?>"
                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 5px;">
                </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-between">
                <a href="../dashboard/home.php" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

</body>

</html>