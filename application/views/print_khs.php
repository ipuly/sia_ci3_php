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
</head>
<body>

	<div class="card mb-4">
		<div class="card-header">Data Kartu Hasil Studi</div>
		<div class="card-body">



			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Matakuliah</th>
						<th scope="col">Dosen</th>
						<th>SKS</th>
						<th scope="col">Nilai</th>
						<th>Grade</th>
						<th scope="col">Poin</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($khs as $key => $value) : ?>
						<tr>
							<td><?= $key + 1 ?></td>
							<td><?= $value->nama_matakuliah ?></td>
							<td><?= $value->nama ?></td>
							<td><?= $value->jumlah_sks?></td>
							<td><?= $value->nilai ?></td>
							<td><?= $value->grade ?></td>
							<td><?= $value->poin ?></td>
						</tr>
					<?php endforeach ?>
					<tr>
						<td colspan="6"><strong>IPK</strong></td>
						<?php $total = 0; $totalSks = 0;?>
						<?php foreach ($khs as $key => $value) : ?>
							<?php $total += $value->jumlah_sks * $value->poin; $totalSks += $value->jumlah_sks; ?>
						<?php endforeach ?>

						<td><?= $total / $totalSks?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>