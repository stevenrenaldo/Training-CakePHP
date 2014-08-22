<header>
<h3>Daftar Siswa</h3>
</header>
<?php 
echo $this->Html->link(
			'Tambah Siswa', 
			array('controller'=>'students', 'action' => 'add'),
			array('class' => 'btn btn-primary')
		);
?>
<table>
	<thead>
		<tr>
			<td></td>
			<td>NIM</td>
			<td>Nama Lengkap</td>
			<td>Prodi</td>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($datas as $data) {
	?>
		<tr>
			<td><?php 
			echo $this->Html->link('Sunting', array('action'=>'edit', $data['Student']['id']));
			echo $this->Form->postLink(' | Hapus', 
							array('action'=>'delete', $data['Student']['id']),
							array('confirm' => 'Apakah yakin akan menghapus data ' . 
								  $data['Student']['nama']));
			echo $this->Html->link(' | Detil', 
							array('action'=>'detil', $data['Student']['nim']));
			?></td>
			<td>
				<?php echo 
				$this->Html->link($data['Student']['nim'], '#', 
							array('class'=>'anim btn btn-warning', 'nim' => $data['Student']['id'])); 
				?>
			</td>
			<td><?= $data['Student']['nama']; ?></td>
			<td><?= $data['Prodi']['nama']; ?></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
<div class="paging">
	<?php
	echo $this->Paginator->prev(). ' ' . 
	     $this->Paginator->numbers(array('before'=>false, 'after'=>false,'separator'=>false)) . ' ' .
		 $this->Paginator->next();
	?>
</div>

<div id="infodetil" style="margin: 40px auto; padding: 60px 20px; background-color: #31B0D5;">
[Detil Siswa]
</div>