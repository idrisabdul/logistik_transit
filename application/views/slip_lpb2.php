<?php
include('session.php');
include('../phpqrcode/qrlib.php');

@$nopo = $_GET['id'];
@$supply = $_GET['suply'];
//$db = mysql_select_db("msalgrou_logistiktransit_ho", $connection);

$result = $db->query("SELECT * FROM lpb where lpbtxt ='$nopo' ORDER BY nabar ASC");
$row = mysqli_fetch_array($result);
QRcode::png($nopo, "image.png", "L", 2, 2);


?>

<html>

<head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>SLIP LPB RO</title>
</head>

<body topmargin="0">

	<script language="javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>


	<p align="left"><input type="button" onclick="printDiv('printableArea')" value="Cetak" /></p>


	<div align="center" id="printableArea">
		<style>
			h3 {
				text-align: center;
			}

			table {
				border-collapse: collapse;
				border-spacing: 0;
				font-family: Arial, sans-serif;
				font-size: 11px;
			}
		</style>

		<table border="0" width="716" height="362" cellspacing="0" cellpadding="0">
			<tr>
				<td width="716" colspan="7"><b>
						<font face="Verdana" size="2">HEAD
							OFFICE - PT MULIA SAWIT AGRO LESTARI </font>
					</b>
			</tr>
			<tr>
				<td width="716" colspan="7">&nbsp;</td>
			</tr>
			<tr>
				<td width="716" colspan="7" height="21">
					<p align="center"><u><b>
								<font size="3" face="Verdana">Laporan Penerimaan Barang (LPB)</font>
							</b></u>
				</td>
			</tr>
			<tr>
				<td width="716" colspan="7" align="center"><?php echo $row['lpbtxt']; ?></td>
			</tr>
			<tr>
				<td width="133" height="19">&nbsp;</td>
				<td width="10" height="19">&nbsp;</td>
				<td width="171" height="19">&nbsp;</td>
				<td width="14" height="19">&nbsp;</td>
				<td width="165" height="19">&nbsp;</td>
				<td width="11" height="19">&nbsp;</td>
				<td width="212" height="19">&nbsp;</td>
			</tr>
			<tr>
				<td width="133" height="19">
					<font face="Verdana" size="1">Nama Supplier </font>
				</td>
				<td width="10" height="19">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="171" height="19">
					<font face="Verdana" size="1"><?php echo $row['suplier']; ?></font>
				</td>
				<td width="14" height="19">&nbsp;</td>
				<td width="165" height="19">
					<font face="Verdana" size="1">No.Pesanan Pembeliaan</font>
				</td>
				<td width="11" height="19">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="212" height="19">
					<font face="Verdana" size="1"><?php echo $row['potxt']; ?></font>
				</td>
			</tr>
			<tr>
				<td width="133">
					<font face="Verdana" size="1">Surat Pengantar No</font>
				</td>
				<td width="10">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="171">
					<font face="Verdana" size="1"><?php echo $row['sj']; ?></font>
				</td>
				<td width="14">&nbsp;</td>
				<td width="165">
					<font face="Verdana" size="1">Tanggal Penerimaan</font>
				</td>
				<td width="11">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="212">
					<font face="Verdana" size="1"><?php echo $row['tgl']; ?></font>
				</td>
			</tr>
			<tr>
				<td width="133">
					<font face="Verdana" size="1">Lokasi Gudang</font>
				</td>
				<td width="10">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="171"></td>
				<td width="14">&nbsp;</td>
				<td width="165">
					<font face="Verdana" size="1">Tanggal Pembuatan LPB</font>
				</td>
				<td width="11">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="212">
					<font face="Verdana" size="1"><?php echo $row['tglinput']; ?></font>
				</td>
			</tr>
			<tr>
				<td width="133">
					<font face="Verdana" size="1">Alokasi</font>
				</td>
				<td width="10">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="171">&nbsp;</td>
				<td width="14">&nbsp;</td>
				<td width="165">
					<font face="Verdana" size="1">No.Perkiraan</font>
				</td>
				<td width="11">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="212">&nbsp;</td>
			</tr>
			<tr>
				<td width="133" valign="top">
					<font face="Verdana" size="1">Departemen/Divisi</font>
				</td>
				<td width="10" valign="top">
					<font face="Verdana" size="1">:</font>
				</td>
				<td width="171" valign="top">
					<font face="Verdana" size="1"><?php echo $row['depart']; ?></font>
				</td>
				<td width="14" valign="top"></td>
				<td width="165" valign="top">&nbsp;</td>
				<td width="11" valign="top">&nbsp;</td>
				<td width="212" valign="top">

					&nbsp;<img src='image.png' width="45" height="41"></td>
			</tr>


			<tr>
				<td width="716" colspan="7" height="177" valign="top" style="font-family: Verdana; font-size: 8pt">
					<table border="1" width="100%" cellspacing="0" cellpadding="0">
						<tr>
							<td align="center">
								<font face="Verdana" size="1">NO</font>
							</td>
							<td align="center" width="116">
								<font face="Verdana" size="1">KODE BRG</font>
							</td>
							<td align="center">
								<font face="Verdana" size="1">Nama Barang</font>
							</td>
							<td align="center">
								<font face="Verdana" size="1">QTY</font>
							</td>
							<td align="center" width="76">
								<font face="Verdana" size="1">SATUAN</font>
							</td>
							<td align="center">
								<font face="Verdana" size="1">Keterangan</font>
							</td>
						</tr>

						<?php
						$result = $db->query("SELECT * FROM lpb where lpbtxt ='$nopo' ORDER BY nabar ASC");

						$no = 0;

						while ($row = mysqli_fetch_array($result)) {
							$no = $no + 1;

							echo "<tr>";
							echo "<td>" . $no . "</td>";
							echo "<td>" . $row['kodebar'] . "</td>";
							echo "<td>" . $row['nabar'] . "</td>";
							echo "<td>" . $row['qty_lpb'] . "</td>";
							echo "<td>" . $row['sat'] . "</td>";
							echo "<td>" . $row['merek'] . "</td>";
							echo "</tr>";
						}
						mysqli_close($db);
						?>
					</table>
					<p>&nbsp;</p>
					<table border="0" width="100%" cellspacing="0" cellpadding="0" height="112">
						<tr>
							<td align="center" height="17" width="26%">
								<font face="Verdana" size="1">Dibuat Oleh,</font>
							</td>
							<td align="center" height="17" width="22%">
								<font face="Verdana" size="1">Diperiksa,</font>
							</td>
							<td align="center" height="17" width="24%">
								<font face="Verdana" size="1">Menyetujui,</font>
							</td>
							<td align="center" height="17" width="28%">
								<font face="Verdana" size="1">Penerima,</font>
							</td>
						</tr>
						<tr>
							<td valign="bottom" height="80" align="center" width="26%">
								<p style="margin-top: 0; margin-bottom: 0"><u>
										<font size="1" face="Verdana">(_____________________)</font>
									</u></p>
								<p style="margin-top: 0; margin-bottom: 0">
									<font size="1" face="Verdana">Admin Purchasing</font>
							</td>
							<td valign="bottom" height="80" align="center" width="22%">
								<p style="margin-top: 0; margin-bottom: 0"><u>
										<font face="Verdana" size="1">(_____________________)</font>
									</u></p>
								<p style="margin-top: 0; margin-bottom: 0">
									<font face="Verdana" size="1">Supervisi Purchasing</font>
							</td>
							<td valign="bottom" height="80" align="center" width="24%">
								<p style="margin-top: 0; margin-bottom: 0"><u>
										<font face="Verdana" size="1">(_____________________)</font>
									</u></p>
								<p style="margin-top: 0; margin-bottom: 0">
									<font face="Verdana" size="1">Dept Head</font>
							</td>
							<td valign="bottom" height="80" align="center" width="28%">
								<p style="margin-top: 0; margin-bottom: 0">
									<font face="Verdana" size="1">(_____________________)</font>
								</p>
								<p style="margin-top: 0; margin-bottom: 0">
									<font face="Verdana" size="1">Petugas Penerima</font>
							</td>
						</tr>
						<tr>
							<td valign="bottom" colspan="4">
								<p align="left"><i>
										<font size="1">By MMOP Online - <?php echo date("Y-m-d H:i:s"); ?></font>
									</i>
							</td>
						</tr>
					</table>
				</td>

			</tr>
		</table>
	</div>

</body>

</html>