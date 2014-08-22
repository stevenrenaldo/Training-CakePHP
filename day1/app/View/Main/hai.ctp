<header>
<?php
if (isset($namalengkap)) {
?>
<p>Selamat Datang, <strong><?php echo $namalengkap; ?></strong></p>
<?php
}
?>
</header>
<div style="padding: 20px 20px; display: block;">
<h5>Perkenalkan diri Anda</h5>
</div>
<?php
echo $this->Form->create('hai');
echo $this->Form->input('nama', array('label' => 'Nama Lengkap'));
echo $this->Form->input('prodi', array(
					'label' => 'Program Studi:',
					'options' => array('71' => 'Informatika',
									   '72' => 'Sistem Informasi',
									   '41' => 'Kedokteran'
									)
					)
				);
echo $this->Form->end('Simpan');
?>