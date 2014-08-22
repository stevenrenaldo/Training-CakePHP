<h2>Daftar Siswa</h2>
<h4>Program Studi: 
<?php
if ($datas) {
	echo '<strong>' . $datas[0]['Prodi']['nama'] . '</strong>';
}
?>
</h4>
<table>
	<thead>
		<tr>
			<td>NIM</td>
			<td>Nama Mahasiswa</td>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($datas as $data) {
	?>
		<tr>
			<td><?php echo $data['Student']['nim'] ?></td>
			<td><?php echo $data['Student']['nama'] ?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>