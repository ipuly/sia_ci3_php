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
	header("Content-Disposition: attachment; filename=Data Dosen.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	?>
</head>
<body>
	<!-- Main page content-->
	<div class="card mb-4">
		<div class="card-header">Data Dosen</div>
		<div class="card-body">
				<table id="datatablesSimple">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>NIP</th>
							<th>Nama Dosen</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>No Telepon</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($dosen as $key => $value) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $value->nomor_identitas ?></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->email ?></td>
								<td><?= $value->alamat ?></td>
								<td><?= $value->no_hp ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>