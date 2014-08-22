<?php 
/* 
 * simpan di app/View/prodis/edit.ctp 
 */
?>
<h2>Sunting Prodi</h2>
<p>
<?php
echo $this->Html->link('Kembali', array('action'=>'index'));
?>
</p>
<?php
echo $this->Form->create('Prodi', array('action'=>'edit'));

echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('kode', array('label' => 'Kode Prodi:'));
echo $this->Form->input('nama', array('label' => 'Nama Prodi:'));

echo $this->Form->end('Simpan');
?>