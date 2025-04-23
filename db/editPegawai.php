<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Ambil ID Pegawai dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Update data pegawai di database
    $sql = "UPDATE pegawai SET 
            nama = '$nama', 
            jabatan = '$jabatan', 
            jenis_kelamin = '$jenis_kelamin', 
            status = '$status', 
            email = '$email', 
            telepon = '$telepon', 
            alamat = '$alamat' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../dashboard/home.php?pesan=success");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Ambil data pegawai berdasarkan ID
$sql = "SELECT * FROM pegawai WHERE id = $id";
$result = $conn->query($sql);
$pegawai = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: rgba(82, 81, 81, 0.15);">
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4" style="font-family: 'Arial', sans-serif; color: #333;">Edit Data Pegawai</h2>
        <?php if (isset($error)) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php endif; ?>
        <form method="POST" class="bg-light p-4 shadow-sm rounded" style="max-width: 800px; margin: auto;">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $pegawai['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $pegawai['jabatan'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>
                        Laki-laki
                    </option>
                    <option value="Perempuan" <?= $pegawai['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>
                        Perempuan
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?= $pegawai['status'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $pegawai['email'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $pegawai['telepon'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                    required><?= $pegawai['alamat'] ?></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="../dashboard/home.php" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

</body>

</html>