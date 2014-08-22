<h2>Daftar Program Studi</h2>
<?php 
echo $this->Html->link(
			'Tambah Prodi', 
			array('controller'=>'prodis', 'action' => 'add'),
			array('class' => 'button')
		);
?>
<table>
	<thead>
		<tr>
			<td></td>
			<td>Kode</td>
			<td>Program Studi</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($datas as $data) {?>
	<tr>
		<td><?php 
		echo $this->Html->link('Sunting', array('action'=>'edit', $data['Prodi']['id']));
		echo $this->Form->postLink(' | Hapus', 
						array('action'=>'delete', $data['Prodi']['id']),
						array('confirm' => 'Apakah yakin akan menghapus data ' . 
						      $data['Prodi']['nama']));
		echo $this->Html->link(' | Siswa', array('action'=>'lihat', $data['Prodi']['id']));
		?></td>
		<td><?php echo $data['Prodi']['kode']; ?></td>
		<td><?php echo $data['Prodi']['nama']; ?></td>
	</tr>
	<?php }?>
	</tbody>
</table>