<?php 
    $qb = new lsp();
    $dataB = $qb->select("detailProyek");
    if ($_SESSION['level'] != "admin") {
    header("location:../index.php");
    }
    if (isset($_GET['delete'])) {
        $response = $qb->delete("proyek","kd_proyek",$_GET['id'],"?page=viewProyek");
    }
 ?>
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                       <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Data Jadwal Proyek</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="main-content" style="margin-top: -60px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="au-card-title" style="background-image:url('');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                            <i class="zmdi zmdi-account-calendar"></i>Data Jadwal Proyek</h3>
                        </div>
                        <div class="card-body">
                            <a href="?page=addProyek" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jadwal Proyek</a>
                           </button>
                           <br>
                           <br>
                           <div class="table-responsive">
                               <table id="example" class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Kode Proyek</th>
                                            <th>Nama Proyek</th>
                                            <th>Pegawai</th>
                                            <th>Customer</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach($dataB as $ds) { 
                                         ?>
                                        <tr>
                                            <td><?= $ds['kd_proyek'] ?></td>
                                            <td><?= $ds['nama_proyek'] ?></td>
                                            <td><?= $ds['pegawai'] ?></td>
                                            <td><?= $ds['customer'] ?></td>
                                            <td><?= $ds['tanggal_mulai'] ?></td>
                                            <td><?= $ds['tanggal_selesai']?></td>
                                            <td><?= $ds['harga'] ?></td>
                                            <td><?= $ds['status'] ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="?page=viewProyekDetail&id=<?php echo $ds['kd_proyek'] ?>" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning"><i class="fa fa-search"></i></a>
                                                    <a href="?page=viewProyekEdit&edit&id=<?= $ds['kd_proyek'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                                                        <i class="fa fa-trash" id="btdelete<?php echo $no; ?>" ></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <script src="vendor/jquery-3.2.1.min.js"></script>
                                        <script>
                                            $('#btdelete<?php echo $no; ?>').click(function(e){
                                                  e.preventDefault();
                                                    swal({
                                                    title: "Hapus",
                                                    text: "Yakin Hapus?",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonText: "Yes",
                                                    cancelButtonText: "Cancel",
                                                    closeOnConfirm: false,
                                                    closeOnCancel: true
                                                  }, function(isConfirm) {
                                                    if (isConfirm) {
                                                        window.location.href="?page=viewProyek&delete&id=<?php echo $ds['kd_proyek'] ?>";
                                                    }
                                                  });
                                                });
                                        </script>
                                        <?php $no++; } ?>
                                    </tbody>
                               </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
