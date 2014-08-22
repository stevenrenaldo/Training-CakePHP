<?php 
/* 
 * simpan di app/View/prodis/add.ctp 
 */
?>
<h2>Tambah Prodi</h2>
<p>
<?php
echo $this->Html->link('Kembali', array('action'=>'index'));
?>
</p>
<?php
echo $this->Form->create('Prodi', array('action'=>'add'));

echo $this->Form->input('kode', array('label' => 'Kode Prodi:'));
echo $this->Form->input('nama', array('label' => 'Nama Prodi:'));

echo $this->Form->end('Simpan');
?>