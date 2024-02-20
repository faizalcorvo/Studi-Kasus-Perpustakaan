<?php
// Ambil Data Buku
$query1 = "SELECT * FROM tblbuku";

$hasil1 = mysqli_query($koneksi, $query1);
mysqli_connect_error();
// ... menampung semua data kategori
$data_buku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row1 = mysqli_fetch_assoc($hasil1)) {
    $data_buku[] = $row1;
}

// Ambil data anggota
$query = "SELECT * FROM member";

$hasil = mysqli_query($koneksi, $query);

// ... menampung semua data anggota
$data_member = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_member[] = $row;
}

?>
<h1 class="text-center">Input Peminjaman</h1>
<div class="container">
    <form action="index.php?page=tambahpinjam" method="post">
        <div class="mb-3">
            <label>Buku</label>
            <select name="no_buku" class="form-control">
                <?php foreach ($data_buku as $b) : ?>
                    <option value="<?php echo $b['no_buku'] ?>"><?php echo $b['judul'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Anggota</label>
            <select name="anggota" class="form-control">
                <?php foreach ($data_member as $member) : ?>
                    <option value="<?php echo $member['no_anggota'] ?>"><?php echo $member['nama'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <label id='p'></label>
            <input id="tanggal_pinjam" name="tanggal_pinjam" type="date" class="form-control">
            <script>
                var dt = new Date();
                document.getElementById("tanggal_pinjam").valueAsDate = new Date();
                var today = moment().format('DD-MM-YYYY');
                document.getElementById("tanggal_pinjam").value = today;
            </script>
        </div>
        <div class="mb-3">
            <label>Tanggal Jatuh Tempo</label>
            <input id="jatuh_tempo" name="jatuh_tempo" type="date" class="form-control">
            <script>
                // var d = new Date('DD-MM-YYYY');

                // document.write('Today is: ' + d.toLocaleString());

                // d.setDate(d.getDate() + 10);

                // document.write('<br>5 days ago was: ' + d.toLocaleString());
                // document.getElementById("jatuh_tempo").value = d;
            </script>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-primary mx-2">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $no_buku                 = $_POST['no_buku'];
    $anggota              = $_POST['anggota'];
    $tgl_pinjam         = $_POST['tanggal_pinjam'];
    $tgl_jatuh_tempo    = $_POST['jatuh_tempo'];

    // cek stok buku
    $stok_buku = cek_stok($koneksi, $no_buku);

    if ($stok_buku < 1) {
        // echo '<script>alert("Stok Buku = '.$stok_buku.'"); document.location="index.php?page=pinjam";</script>';
        echo "SELECT stok FROM buku WHERE no_buku = $no_buku";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO pinjam VALUES('', '$anggota', '$no_buku', '$tgl_pinjam', '$tgl_jatuh_tempo')") or die(mysqli_error($koneksi));
        echo $sql;
        if ($sql) {
            kurangi_stok($koneksi, $_POST['no_buku']);
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=pinjam";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    }
}
?>