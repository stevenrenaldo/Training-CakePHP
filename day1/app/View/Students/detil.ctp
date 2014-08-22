<h2>Detil Siswa</h2>
<?php
echo $this->Html->link('Kembali', array('action'=>'index'));
?>
<hr/>
<p>NIM : <?php echo $data['Student']['nim']; ?></p>
<p>Nama : <?php echo $data['Student']['nama']; ?></p>
<p>Program studi : <?php echo $data['Prodi']['nama']; ?></p>
<p>
<img src="<?php echo $this->Html->url(array('action'=>'photos', $data['Student']['nim']));?>"
	 style="height: 200px;"/>
</p>