<?php 
	$dt = new lsp();
	$detail = $dt->selectWhere("detailProyek","kd_proyek",$_GET['id']);
    if ($_SESSION['level'] != "admin") {
    header("location:../index.php");
    }
 ?>
<div class="main-content" style="margin-top: 20px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-4">
            		<div class="card">
            			<div class="card-header">
            				<img class="align-self-center mr-3" width="70" src="img/<?php echo $detail['tim'] ?>" alt="">
            				<h4 class="text-right"><?= $detail['nama_proyek'] ?></h4>
            			</div>
            			<div class="card-body">
            				<img style="min-height: 200px; width: 100%; display: block;" src="img/<?php echo $detail['gambar'] ?>">
            			</div>
            		</div>
            	</div>
            	<div class="col-md-8">
            		<div class="card">
            			<div class="card-header">
            				<h3>Detail Proyek</h3>
            			</div>
            			<div class="card-body">
            				<table class="table" cellpadding="10">
	    					<tr>
	    						<td>Kode Proyek</td>
	    						<td>:</td>
	    						<td style="font-weight: bold; color: red;"><?php echo $detail['kd_proyek']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Nama Proyek</td>
	    						<td>:</td>
	    						<td><?php echo $detail['nama_proyek']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Pekerja</td>
	    						<td>:</td>
	    						<td><?php echo $detail['pegawai']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Klien</td>
	    						<td>:</td>
	    						<td><?php echo $detail['nama_customer']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Tanggal Mulai</td>
	    						<td>:</td>
	    						<td><?php echo $detail['tanggal_mulai']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Tanggal Selesai</td>
	    						<td>:</td>
	    						<td><?php echo $detail['tanggal_selesai']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Status</td>
	    						<td>:</td>
	    						<td><?php echo $detail['status']; ?></td>
	    					</tr>
	    					<tr>
	    						<td>Keterangan</td>
	    						<td>:</td>
	    						<td><?php echo $detail['keterangan']; ?></td>
	    					</tr>
	    				</table>
            			</div>
            		</div>
            	</div>
            </div>
            <a href="?page=viewProyek" class="btn btn-danger"><i class="fa fa-repeat"></i> Kembali</a>
        </div>
    </div>
</div>