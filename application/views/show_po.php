<?php
include('session.php');
$tahun = $_SESSION['tahuncek_msal'];
if (isset($_GET['pt']) && !empty($_GET['pt'])) {
	$pt = trim($_GET['pt']);
}
$kodept = "02";
$ho = "01";
$lokasi = "HO";
$batal = "1";

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 50;

$config = (object) array(
	'perpage'	=> $limit,
	'page'		=> $page,
	'offset'	=> $page > 1 ? ($page * $limit) - $limit : 0
);

$no = $page == 1 ? 0 : ($limit * ($page - 1));

$pagLink = "<nav><ul class='pagination'>";

$total = 10000;


?>

<html>

<link rel="stylesheet" href="simplePagination.css" />

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Menu Logistik Transit Online HO PT.MSAL</title>



</head>

<body topmargin="0">
	<style>
		h3 {
			text-align: center;
		}

		table {
			border-collapse: collapse;
			border-spacing: 0;
			font-family: Arial, sans-serif;
			font-size: 11px;
			padding-left: 100px;
		}

		table th {
			font-weight: bold;
			padding: 10px;
			color: #fff;
			background-color: #1C94C4;
			border-top: 1px black solid;
			border-bottom: 1px black solid;
		}
	</style>

	<div align="center">
		<table border="0" cellspacing="1" cellpadding="0">
			<tr>
				<td align="center">

				</td>
			</tr>
			<tr>
				<td background="../images/backgroud_msal.jpg" valign="top">
					<div align="center">
						<table border="1" cellspacing="0" cellpadding="0" width="967" style="border-style: dotted; border-width: 1px">
							<tr>
								<div>
									<h3>TABEL PO</h3>
								</div>

								<form method="POST" action="show_po.php" onSubmit="" webbot-action="--WEBBOT-SELF--" rel="facebox">

									<div></div>

									<div align="left">
										<label>No PO</label>
										<input class="form-control" type="text" id="nopo" name="nopo" size="30">
										<label>Nama PT</label>
										<select class="form-control" name="pt" id="pt" onchange="window.location='show_po.php?pt='+this.value" rel="facebox">
											<option value="">All</option>
											<option value="1">MSAL</option>
											<option value="2">PSAM</option>
											<option value="3">MAPA</option>
											<option value="4">PEAK</option>
											<option value="5">KPP</option>

										</select>
										<input class="form-control" type="submit" value="Tampilkan" name="semua">
									</div>

								</form>

					</div>


			<tr>
				<td bgcolor="#1C94C4" align="center" width="57"><b>
						<font face="Verdana" size="2">No</font>
				</td>
				<td bgcolor="#1C94C4" align="center" width="57"><b>
						<font face="Verdana" size="2">PT</font>
				</td>

				<td bgcolor="#1C94C4" align="center" width="206"><b>
						<font face="Verdana" size="2">No PO</font>
					</b></td>
				<td bgcolor="#1C94C4" align="center" width="158"><b>
						<font face="Verdana" size="2">Tgl</font>
					</b></td>
				<td bgcolor="#1C94C4" align="center" width="254"><b>
						<font face="Verdana" size="2">Supplier</font>
					</b></td>
				<td bgcolor="#1C94C4" align="center" width="92">
					<p align="center"><b>
							<font face="Verdana" size="2">Status LPB</font>
						</b>
				</td>
			</tr>
			<?php
			if (isset($pt) && !empty($pt)) {
				if ($pt == '1') {
					$namapt = 'PT.MULIA SAWIT AGRO LESTARI';
				} else if ($pt == '2') {
					$namapt = 'PT.PERSADA SEJAHTERA AGRO';
				} else if ($pt == '3') {
					$namapt = 'PT.MITRA AGRO PERSADA ABADI';
				} else if ($pt == '4') {
					$namapt = 'PT.PERSADA ERA AGRO KENCANA';
				} else if ($pt == '5') {
					$namapt = 'PT. KERENG PANGI PERDANA';
				}
				$result = $db->query("SELECT * FROM po where namapt LIKE '%$namapt%' and thn='$tahun' and trim(po.kodept)<>'$ho' and po.batal <>'$batal' and po.lokasi='$lokasi'  ORDER BY namapt asc,tglpo DESC,nopo desc limit $config->perpage offset $config->offset");
				$getPage = $db->query("SELECT id FROM po where namapt LIKE '%$namapt%' and thn='$tahun' and trim(po.kodept)<>'$ho' and po.batal <>'$batal' and po.lokasi='$lokasi'");
				$row12 = mysqli_num_rows($getPage);
				$total_records = $row12;
				$total_pages = ceil($total_records / $limit);
			} else {
				$result = $db->query("SELECT * FROM po where thn='$tahun' and trim(po.kodept)<>'$ho' and po.batal <>'$batal' and po.lokasi='$lokasi'  ORDER BY namapt asc,tglpo DESC,nopo desc limit $config->perpage offset $config->offset");
				$getPage = $db->query("SELECT id FROM po where thn='$tahun' and trim(po.kodept)<>'$ho' and po.batal <>'$batal' and po.lokasi='$lokasi' ");
				$row12 = mysqli_num_rows($getPage);
				$total_records = $row12;
				$total_pages = ceil($total_records / $limit);
			}





			while ($row = mysqli_fetch_array($result)) {
				$no = $no + 1;

				$nopo = $row['noreftxt'];

				$totalpo = 0;
				$totalpb = 0;




				$result2 = $db->query("SELECT * FROM lpb where potxt='$nopo' ");
				$row2 = mysqli_num_rows($result2);
				if ($row2 >= 1) {
					$status = "LPB";
				} else {
					$status = "-";
				}

				echo "<tr>";
				echo "<td>" . $no . "</td>";
				echo "<td>" . $row['namapt'] . "</td>";

				$tanggal = date("j F Y", strtotime($row['tglpo']));
			?>
				<td><a href="input_lpb.php?nopo=<?php echo urlencode($row['noreftxt']) ?>&suply=<?php echo urlencode($row['nama_supply']) ?> "><?php echo $row['noreftxt']; ?></a></td>
			<?php

				echo "<td>" . $tanggal . "</td>";
				echo "<td>" . $row['nama_supply'] . "</td>";
				echo "<td>" . $status . "</td>";

				echo "</tr>";
			}
			mysqli_close($db);
			?>



		</table>
	</div>
	<?php

	for ($i = 1; $i <= $total_pages; $i++) {
		$pagLink .= "<li><a href='show_po.php?page=" . $i . "'>" . $i . "</a></li>";
	};
	echo $pagLink . "</ul></nav>";
	?>

	</td>
	</tr>
	<tr>
		<td height="19">
			<p align="center"><i>
					<font face="Verdana" size="2">Copyright@2016.
						MIS MSAL GROUP</font>
				</i>

		</td>
	</tr>
	</table>
	</div>
	<script src="jquery-3.1.1.js"></script>
	<script src="jquery.simplePagination.js"></script>

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
		$('.pagination').pagination({
			items: <?php echo $total_records; ?>,
			itemsOnPage: <?php echo $limit; ?>,
			cssStyle: 'light-theme',
			currentPage: <?php echo $page; ?>,
			hrefTextPrefix: 'show_po.php?page='
		});
	});
</script>

<!-- Start css3menu.com BODY section -->