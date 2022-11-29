<?php
$active = 'absensi';
$title = 'Absensi | Admin';
include 'config.php';
include 'navbar.php';

session_start();

$now2 = date('Y-m-d');
$query = mysqli_query($conn, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa=tbl_absensi.id_siswa ORDER BY id_absen DESC");
?>

<h1 class="text-center mt-4 fw-bold">
    DATA ABSENSI
</h1>

<!-- Modal tambah -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Absen Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama:</label>
                        <select class="form-control" name="siswa" id="" aria-label="Default select example" required>
                            <option value=""> --Pilih Siswa-- </option>
                            <!-- mengambil data di database -->
                            <?php
                            $now = date('Y-m-d');
                            $sql = mysqli_query($conn, "SELECT * FROM tbl_siswa  WHERE id_siswa NOT IN (SELECT id_siswa FROM tbl_absensi WHERE tanggal = '" . $now . "
                                    ')  ORDER BY nama ASC") or die(mysqli_error($conn));
                            foreach ($sql as $dt) {

                                $newid = $dt['id_siswa'];
                                $nama = $dt['nama'];
                            ?>

                                <option value="<?php echo $newid ?>"><?php
                                                                        echo $nama;
                                                                        ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Keterangan:</label>
                        <select class="form-control" name="keterangan" id="keterangan" aria-label="Default select example" required>
                            <option value=""> --Pilih Keterangan-- </option>
                            <option value="Izin" name="keterangan"> Izin </option>
                            <option value="Sakit" name="keterangan"> Sakit </option>
                            <option value="Alfa" name="keterangan"> Alfa </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tanggal:</label>
                        <input class="form-control" id="recipient-name" name="tanggal" value="<?= $date ?>" readonly>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center px-3 pt-1">
                <h5>Absensi Siswa</h5>
                <button type="button" class="btn text-white" style="background-color: #191970;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Absen</button>
            </div>
        </div>
        <!-- session alert -->
        <?php if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['eksekusi']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['eksekusi']);
        endif;

        ?>
        <!-- akhir -->
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered  d-md-block d-lg-table overflow-auto">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $absensi) {
                        $keterangan = $absensi['keterangan'];
                    ?>
                        <tr class="text-center fw-bold">
                            <td>
                                <?= $no++ ?></td>
                            <td><?= $absensi['nama'] ?></td>
                            <td class="text-center"><?= $absensi['keterangan'] ?></td>
                            <td class="text-center"><?= $absensi['tanggal'] ?></td>
                            <td class="text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $no; ?>" class="btn btn-success">Ubah</button>
                                <a href="proses.php?delete2=<?php echo $absensi['id_absen']; ?>" type="button" class="btn btn-danger" style="" onclick="return confirm('Apakah anda yakin ingin menghapus???')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                            </td>
                        </tr>



                        <!-- modal edit -->

                        <div class="modal fade" id="staticBackdrop<?= $no; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Absen</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $absensi['id_absen']; ?>">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                                <input type="text" class="form-control" name="nama" value="<?= $absensi['nama'] ?>" readonly>

                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                                <select class="form-control" name="keterangan" id="keterangan" aria-label="Default select example" required>

                                                    <option <?php if ($keterangan == 'Izin') {
                                                                echo "selected";
                                                            } ?> value="Izin" name="keterangan"> Izin </option>
                                                    <option <?php if ($keterangan == 'Sakit') {
                                                                echo "selected";
                                                            } ?> value="Sakit" name="keterangan"> Sakit </option>
                                                    <option <?php if ($keterangan == 'Alfa') {
                                                                echo "selected";
                                                            } ?> value="Alfa" name="keterangan"> Alfa </option>


                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                                <input class="form-control" id="recipient-name" name="tanggal" value="<?= $date ?>" readonly>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal -->

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/script/jquery.js"></script>

<script src="assets/datatables/datatables.min.js"></script>

<script src="assets/script/custom.js"></script>

<script src="assets/js/sweetalert.js"></script>

<script src="assets/script/alert.js"></script>

</body>

</html>