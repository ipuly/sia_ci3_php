<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>SIA Coding PGT</title>
	<link href="<?php echo base_url(); ?>assets/template/css/styles.css" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/template/assets/img/icon.png" />

	<?php 
	header("Content-Type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	?>
</head>
<body>
	<!-- Main page content-->
	<div class="card mb-4">
		<div class="card-header">Data Mahasiswa</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th>Kode Mata Kuliah</th>
						<th>Nama Mata Kuliah</th>
						<th>Nama Dosen</th>
						<th>Kurikulum</th>
						<th>Semester</th>
						<th>SKS</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					foreach ($matakuliah as $p) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $p->kode_matakuliah; ?></td>
							<td><?php echo $p->nama_matakuliah; ?></td>
							<td><?php echo $p->nama; ?></td>
							<td><?php echo $p->nama_kurikulum; ?></td>
							<td>
								<?php if ($p->semester == '1') : ?>
									Ganjil
								<?php else : ?>
									Genap
								<?php endif ?>
							</td>
							<td><?php echo $p->jumlah_sks; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>