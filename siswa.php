<?php
$active = 'siswa';
$title = 'Data Siwa | Admin';
include 'config.php';
include 'navbar.php';
session_start();
$query = mysqli_query($conn, "SELECT * FROM tbl_siswa");

$no = 1;
?>
<h1 class="text-center mt-4 fw-bold">
    DATA SISWA
</h1>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses.php" method="post">

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="recipient-name" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="recipient-name" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">No. Telepon:</label>
                        <input type="text" class="form-control" id="recipient-name" name="tlp">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="message-text" name="alamat"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="add">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- session alert -->

<!-- akhir -->
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center px-3 pt-1">
                <h5>Data Siswa</h5>
                <button type="button" class="btn text-white" style="background-color: 	#191970;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Absen</button>
            </div>
        </div>
        <?php if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
                <a><?php echo $_SESSION['eksekusi']; ?></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            session_destroy();
        endif;

        ?>

        <div class="card-body">
            <table id="table" class="table table-striped table-bordered  d-md-block d-lg-table overflow-auto">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $result) {
                    ?>
                        <tr class="text-center fw-bold">
                            <td><?= $no++; ?></td>
                            <td><?= $result['nama'];    ?></td>
                            <td><?= $result['email'] ?></td>
                            <td><?= $result['no_telp'] ?></td>
                            <td><?= $result['alamat'] ?></td>
                            <td class="text-center">
                                <!-- Button trigger modal -->
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $no ?>" type="button" class="btn btn-success"><i class="bi bi-pencil-square"></i></i> Edit</a>
                                <a href="proses.php?delete=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger" style="" onclick="return confirm('Apakah anda yakin ingin menghapus???')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                            </td>
                        </tr>


                        <!-- modal edit -->
                        <div class="modal fade" id="staticBackdrop<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Siswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses.php" method="post">
                                            <input type="hidden" name="id_siswa" value="<?= $result['id_siswa']; ?>">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="nama" value="<?= $result['nama']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="email" value="<?= $result['email']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">No. Telepon:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="tlp" value="<?= $result['no_telp']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Alamat:</label>
                                                <textarea class="form-control" id="message-text" name="alamat"><?= $result['alamat']; ?></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal -->
                        </tr>

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